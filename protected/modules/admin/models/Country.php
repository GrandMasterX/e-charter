<?php

/**
 * This is the model class for table "badword".
 *
 * The followings are the available columns in table 'badword':
 * @property string $id
 * @property string $word
 */
class Country extends CActiveRecord
{

    //const CACHE_KEY = 'Badword.CACHE_KEY';

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'country';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('word', 'required'),
            array('word', 'length', 'max'=>60),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, word', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    public function behaviors()
    {
        return array(
            'CacheBehavior' => array(
                'class' => 'behaviors.CacheBehavior',
                //'cacheKey' => self::CACHE_KEY
            ),
        );
    }

    public static function getWords()
    {
        //$words = Yii::app()->cache->get(self::CACHE_KEY);

        if($words === false) {
            $words = CHtml::listData(Yii::app()->db->createCommand()->select('id, word')->from('badword')->queryAll(), 'id', 'word');
            //Yii::app()->cache->set(self::CACHE_KEY, $words, 24*3600);
        }

        return $words;
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'word' => 'Стоп слово',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('id',$this->id,true);
        $criteria->compare('word',$this->word,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Badword the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}
