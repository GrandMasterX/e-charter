<?php

class WebUser extends CWebUser {
    private $model = null;

    public function getRole() {
        if($user = $this->getModel()){
            return $user->role;
        }
    }

    public function getModel()
    {
        if(!isset($this->id)) $this->model = new User;
        if($this->model === null)
            $this->model = User::model()->findByPk($this->id);
        return $this->model;
    }

    public function __get($name) {
        try {
            return parent::__get($name);
        } catch (CException $e) {
            $m = $this->getModel();
            if($m->__isset($name))
                return $m->{$name};
            else throw $e;
        }
    }

    public function __set($name, $value) {
        try {
            return parent::__set($name, $value);
        } catch (CException $e) {
            $m = $this->getModel();
            $m->{$name} = $value;
        }
    }

    public function __call($name, $parameters) {
        try {
            return parent::__call($name, $parameters);
        } catch (CException $e) {
            $m = $this->getModel();
            return call_user_func_array(array($m,$name), $parameters);
        }
    }

    public function getCabinetUrl()
    {
        if(Yii::app()->user->checkAccess(User::ROLE_ADMIN))
            return Yii::app()->createUrl('/admin');

        if(Yii::app()->user->checkAccess(User::ROLE_MANAGER))
            return Yii::app()->createUrl('/admin');

        if(Yii::app()->user->checkAccess(User::ROLE_CLIENT))
            return Yii::app()->createUrl('/privatoffice');
    }
}
