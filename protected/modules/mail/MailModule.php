<?php

class MailModule extends CWebModule
{
    public $variables = array();

    public function init()
    {
        $this->setImport(array(
            'mail.models.*',
            'mail.components.*',
            'mail.extensions.yii-mail.*'
        ));

        $this->setDefaultVariables();
    }

    protected function setDefaultVariables()
    {
        $defaultVariables = array();
        if (isset(Yii::app()->params['siteName'])) {
            $defaultVariables['siteName'] = Yii::app()->params['siteName'];
            $defaultVariables['siteNameLink'] = CHtml::link(Yii::app()->params['siteName'], Yii::app()->createAbsoluteUrl('/site/index'));
        }
        if (isset(Yii::app()->params['adminEmail']))
            $defaultVariables['adminEmail'] = 'zakaz@echarter.com.ua';

        $this->variables = CMap::mergeArray($defaultVariables, $this->variables);
    }

    public function beforeControllerAction($controller, $action)
    {
        if (parent::beforeControllerAction($controller, $action)) {
            return true;
        } else {
            return false;
        }
    }

    protected function parseVariables($text, $variables)
    {
        $variables = CMap::mergeArray($this->variables, $variables);
        foreach ($variables as $id => $value) {
            $text = preg_replace("/%{$id}%/", $value, $text);
        }
        return $text;
    }

    public function parseModel($model, $variables = array())
    {
        return array(
            $this->parseVariables($model->subject, $variables),
            $this->parseVariables($model->template, $variables)
        );
    }

    public function send($email, $from, $template, $variables = array())
    {
        $model = Mail::model()->findByAttributes(array('name' => $template));
        if (empty($model)) {
            throw new CException(Yii::t('mail', "Шаблон с именем {$template} не найден."));
        }

        list($subject, $body) = $this->parseModel($model, $variables);
        $body = Yii::app()->controller->renderPartial('modules.mail.views.default.view', array('content' => $body), true);
        $message = new YiiMailMessage($subject, $body, 'text/html', 'utf-8');

        $emails = explode(',', $email);

        foreach($emails as $v) {
            $message->addTo(trim($v));
        }

        $message->from = $from;
        return Yii::app()->mail->send($message);
    }

    public function sendBcc($emails, $from, $template, $variables = array())
    {
        $model = Mail::model()->findByAttributes(array('name' => $template));
        if (empty($model))
            throw new CException(Yii::t('mail', "Шаблон с именем {$template} не найден."));

        list($subject, $body) = $this->parseModel($model, $variables);
        $body = Yii::app()->controller->renderPartial('modules.mail.views.default.view', array('content' => $body), true);
        $message = new YiiMailMessage($subject, $body, 'text/html', 'utf-8');

        $message->setTo($from);
        $message->setBcc($emails);
        $message->from = $from;
        return Yii::app()->mail->send($message);
    }
}
