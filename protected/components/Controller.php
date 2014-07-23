<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
    public $layout = '//layouts/main';
	public $pageTitle;
	public $title;
    const NOT_AJAX_REDIRECT = '/';

    public function __construct($id,$module=null){
        parent::__construct($id,$module);
        // If there is a post-request, redirect the application to the provided url of the selected language
        if(isset($_POST['language'])) {
            $lang = $_POST['language'];
            $MultilangReturnUrl = $_POST[$lang];
            $this->redirect($MultilangReturnUrl);
        }
        // Set the application language if provided by GET, session or cookie
        if(isset($_GET['language'])) {
            Yii::app()->params->language = $_GET['language'];
            Yii::app()->user->setState('language', $_GET['language']);
            $cookie = new CHttpCookie('language', $_GET['language']);
            $cookie->expire = time() + (60*60*24*365); // (1 year)
            Yii::app()->request->cookies['language'] = $cookie;
        }
        else if (Yii::app()->user->hasState('language'))
            Yii::app()->params->language = Yii::app()->user->getState('language');
        else if(isset(Yii::app()->request->cookies['language']))
            Yii::app()->params->language = Yii::app()->request->cookies['language']->value;
    }

    public function createMultilanguageReturnUrl($lang='en'){
        if (count($_GET)>0){
            $arr = $_GET;
            $arr['language']= $lang;
        } else {
            $arr = array('language'=>$lang);
        }
        return $this->createUrl('', $arr);
    }

	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

    public function init()
    {
        parent::init();

        if(Yii::app()->getRequest()->getIsAjaxRequest()) {
			Yii::app()->clientscript->scriptMap['jquery.js'] = false;  
			Yii::app()->clientscript->scriptMap['jquery.min.js'] = false;
			
			$this->layout = '//layouts/ajax';
		}
		$this->pageTitle = 'Aminka';
    }
	
	protected function performAjaxValidation($model, $form)
	{
        if(isset($_POST['ajax']) && $_POST['ajax']===$form)
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
	}

    public function renderAjaxError($error = null) {
        $this->renderAjax(false, !empty($error) ? $error : Yii::t('app', 'Проверьте правильность введеных данных'));
        return true;
    }

    public function renderAjax($result, $error = false, $message = false, $redirect = false)
    {
        if (!Yii::app()->getRequest()->getIsAjaxRequest())
            $this->redirect(self::NOT_AJAX_REDIRECT);

        if(is_array($redirect)) {
            $route = isset($redirect[0]) ? $redirect[0] : '';
            $redirect = $this->createUrl($route, array_splice($redirect, 1));
        }
        if (is_array($error)) {
            $tmp = '<ul>';
            foreach ($error as $err) {
                if (is_array($err))
                    foreach ($err as $er)
                        $tmp .= '<li>'.htmlspecialchars($er).'</li>';
                else
                    $tmp .= '<li>'.htmlspecialchars($err).'</li>';
            }

            $tmp .= '</ul>';
            $error = $tmp;
        }

        $data = array(
            'error' => $error,
            'result' => $result,
            'message' => $message,
            'redirect' => $redirect
        );

        echo CJavaScript::jsonEncode($data);
        Yii::app()->end();

        return true;
    }

    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error',array('data' =>$error));
        }
    }
}