<?php
class AdminModule extends CWebModule
{
    public $layout='main';

    protected function init() {
        parent::init();

        Yii::app()->theme = 'admin';

        $this->setImport(array(
            'admin.models.*',
            'admin.components.*',
        ));

        Yii::app()->configure(array(
            'components'=>array(
                'errorHandler'=>array(
                    'errorAction'=>'admin/default/error',
                ),
            ),
        ));
    }

    public function beforeControllerAction($controller, $action) {
        if(parent::beforeControllerAction($controller, $action)) {
            return true;
        } else {
            return false;
        }

    }
}