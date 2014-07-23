<?php

class SiteController extends Controller {
    public function actions() {
        return array(
            'oauth' => array(
                // the list of additional properties of this action is below
                'class'=>'ext.hoauth.HOAuthAction',
                // Yii alias for your user's model, or simply class name, when it already on yii's import path
                // default value of this property is: User
                'model' => 'User',
                // map model attributes to attributes of user's social profile
                // model attribute => profile attribute
                // the list of avaible attributes is below
                'attributes' => array(
                    'email' => 'email',
                    'fname' => 'firstName',
                    'lname' => 'lastName',
                    'gender' => 'genderShort',
                    'birthday' => 'birthDate',
                    // you can also specify additional values,
                    // that will be applied to your model (eg. account activation status)
                    'acc_status' => 1,
                ),
            ),
        );
    }

    public function actionIndex() {
        $this->render('index');
    }

    public function actionAbout() {
        $this->render('about');
    }

    public function actionContacts() {
        $this->render('contacts');
    }

    public function actionRedemption() {
        $this->render('redemption');
    }

    public function actionNeedToKnow() {
        $arr = array(
            'de'=>'shprekhen ze doich',
            'en'=>'yoyoyo'
        );

        $data = (isset($_GET['language'])) ? $arr[$_GET['language']] : 'no data here' ;
        $this->render('needToKnow',array('data'=>$data));
    }

    public function actionCountry($country) {
        var_dump($country);die;
    }

    public function actionCity($country,$city) {
        var_dump($city);die;
    }
}