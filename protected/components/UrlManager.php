<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 22.07.14
 * Time: 11:07
 */

class UrlManager extends CUrlManager {
    public function createUrl($route,$params=array(),$ampersand='&')
    {
        if (!isset($params['language'])) {
            if (Yii::app()->user->hasState('language'))
                Yii::app()->params->language = Yii::app()->user->getState('language');
            else if(isset(Yii::app()->request->cookies['language']))
                Yii::app()->params->language = Yii::app()->request->cookies['language']->value;
            $params['language']=Yii::app()->params->language;
        }
        return parent::createUrl($route, $params, $ampersand);
    }
} 