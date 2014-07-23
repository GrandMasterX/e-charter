<?php

/**
 * This is the model class for table "mail".
 *
 * The followings are the available columns in table 'mail':
 * @property string $id
 * @property string $name
 * @property string $subject
 * @property string $template
 */
class Mail extends CActiveRecord
{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'mail';
    }

    public function rules()
    {
        return array(
            array('name, subject, template', 'required'),
            array('name, subject', 'length', 'max' => 255),

            array('id, name, subject, template', 'safe', 'on' => 'search'),
        );
    }

    public function relations()
    {
        return array(
        );
    }
	
	/*public function behaviors()
	{
		return array(
            'LoggerBehavior' => array(
                'class' => 'behaviors.LoggerBehavior',
                'name' => 'Шаблон письма',
                'genus' => 'Logger::GENUS_MAN',
                'linkExpression' => function($model) {
                        return CHtml::link($model->name, array('/admin/mail/view', 'id' => $model->id));
                },
                'titleExpression' => function($model) {
                        return $model->name;
                },
            ),
		);
	}*/

    public function attributeLabels()
    {
        return array(
            'id' => '#',
            'name' => 'Название',
            'subject' => 'Тема',
            'template' => 'Шаблон',
        );
    }

    public function search()
    {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('subject', $this->subject, true);
        $criteria->compare('template', $this->template, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
}