<?php
class PrivatofficeModule extends CWebModule {

    protected function init() {
        parent::init();

        Yii::app()->theme = 'privatoffice';

        $this->setImport(array(
            'privatoffice.models.*',
            'privatoffice.components.*',
        ));

        Yii::app()->configure(array(
            'components'=>array(
                'errorHandler'=>array(
                    'errorAction'=>'/site/error',
                ),
            ),
        ));
    }

    public function beforeControllerAction($controller, $action)
    {
        if(parent::beforeControllerAction($controller, $action)) {
            return true;
        } else {
            return false;
        }
    }
}