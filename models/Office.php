<?php

namespace app\models;

use Yii;

class Office extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'office';
    }
    
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
        ];
    }
    
    public function getOfficeStores()
    {
        return $this->hasMany(OfficeStore::className(), ['office_id' => 'id']);
    }
}
