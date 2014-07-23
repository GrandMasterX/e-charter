<?php

class CacheBehavior extends CActiveRecordBehavior
{
    public $cacheKey;

    public function afterSave($event)
    {
        $this->deleteCache();
    }

    public function beforeDelete($event)
    {
        $this->deleteCache();
    }

    protected function deleteCache()
    {
        if(is_array($this->cacheKey)) {
            foreach($this->cacheKey as $key)
                Yii::app()->cache->delete($key);
        } else {
            Yii::app()->cache->delete($this->cacheKey);
        }
    }
}
