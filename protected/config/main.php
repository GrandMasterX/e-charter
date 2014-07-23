<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
Yii::setPathOfAlias('modules', dirname(__FILE__).'/../modules');
Yii::setPathOfAlias('bootstrap', dirname(__FILE__) . '/../extensions/bootstrap');

Yii::setPathOfAlias('behaviors', dirname(__FILE__).'/../components/behaviors');
Yii::setPathOfAlias('widgets', dirname(__FILE__).'/../components/widgets');
return array(
    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name'=>'echarter',

    // preloading 'log' component
    'preload'=>array(
        'log',
        'bootstrap'
    ),

    // autoloading model and component classes
    'defaultController' => 'site/index',
    'import'=>array(
        'application.models.*',
        'application.components.*',
        'application.extensions.*',
        'application.vendors',
        'application.modules.admin',
        'application.modules.mail',
        'modules.admin.models.*',
        'modules.mail.models.*',
        'application.extensions.bootstrap.*',
    ),
    'theme'=>'bootstrap',
    'modules' => array(
        'admin',
        'mail',
        'gii'=>array(
            'generatorPaths'=>array(
                'bootstrap.gii',
            ),
        ),
    ),

    // application components
    'components'=>array(
        'user'=>array(
            'class' => 'WebUser',
            'allowAutoLogin'=>true,
        ),
        // uncomment the following to use a MySQL database
        'db'=>require(dirname(__FILE__).DIRECTORY_SEPARATOR.'db.php'),
        'errorHandler'=>array(
            'errorAction'=>'site/error',
        ),
        'mail' => array(
            'class' => 'mail.extensions.yii-mail.YiiMail',
            'transportType' => 'smtp',
            'transportOptions'=>array(
                'host'=>'smtp.yandex.ru',
                //'encryption'=>'SSL',
                'username'=>'zakaz@echarter.com.ua',
                'password'=>'Xthdjytw88',
                'port'=>587,
            ),
            'logging' => true,
            'dryRun' => false
        ),
        'session' => array(
            'cookieMode' => 'allow',
            'autoStart' => true,
        ),
        'bootstrap' => array(
            'class' => 'bootstrap.components.Bootstrap',
        ),
        'errorHandler'=>array(
            // use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
        'authManager'=>array(
            'class'=>'PhpAuthManager',
            'defaultRoles' => array('guest'),
        ),
        'urlManager'=>array(
            'class'=>'application.components.UrlManager',
            'urlFormat'=>'path',
            'showScriptName'=>false,
            'rules'=>array(
                'admin'=> 'admin/default/index',
                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                '<language:(ru|ua|en|uk|de|fr|pl|cn)>/<action:(about|contacts|redemption|needtoknow)>/*' => 'site/<action>',
                '<language:(ru|ua|en|uk|de|fr|pl|cn)>/' => 'site/index',
                '<language:(ru|ua|en|uk|de|fr|pl|cn)>/<country>/<city>' => 'site/city',


                '<language:(ru|ua|en|uk|de|fr|pl|cn)>/<controller:\w+>/<id:\d+>'=>'<controller>/view',
                '<language:(ru|ua|en|uk|de|fr|pl|cn)>/<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                '<language:(ru|ua|en|uk|de|fr|pl|cn)>/<controller:\w+>/<action:\w+>/*'=>'<controller>/<action>',
                '<language:(ru|ua|en|uk|de|fr|pl|cn)>/<country>/' => 'site/country',
                /*
                '<country>/<city>' => 'site/city',
                '<country>' => 'site/country',
                '<action>/*' => 'site/<action>',*/
            ),
        ),
        'log'=>array(
            'class'=>'CLogRouter',
            'routes'=>array(
                array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'error, warning',
                ),
                // uncomment the following to show log messages on web pages
                /*
                array(
                    'class'=>'CWebLogRoute',
                ),
                */
            ),
        ),
        'cache' => array(
            //'class' => 'CApcCache',
            'class' => 'CFileCache',
        ),
    ),
    'params' => array(
        'emails' => array('admin'=>'','support'=>''),
        'loginDuration' => 3600 * 24 * 30,
        'address' => array(),
        'defaultPageSize' => 50,
        'sizeOptions' => array(10, 25, 50, 100, 200, 500, 1000, 3000),
        'phone' => '+66 (0)8-8282-0173',
        'defaultLanguage' => 'ru',
        'sourceLanguage'=>'en',
        'language'=>'ru',
        'languages'=>array('ru'=>'Russian','ua'=>'Ukraine','uk'=>'United Kingdom','de'=>'Deutsch','fr'=>'French','pl'=>'Poland','cn'=>'China'),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    //'params'=>require(dirname(__FILE__).'/params.php'),
);