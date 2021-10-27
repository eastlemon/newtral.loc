<?php

namespace app\models;

use Yii;

class Store extends \yii\db\ActiveRecord
{
    public $office, $delivery;

    public static function tableName()
    {
        return 'store';
    }

    public function rules()
    {
        return [
            [['name', 'office', 'delivery'], 'required'],
            [['address'], 'string'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'address' => Yii::t('app', 'Address'),
            'delivery' => Yii::t('app', 'Delivery'),
            'office' => Yii::t('app', 'Office'),
        ];
    }

    public function getOffers()
    {
        return $this->hasMany(Offer::className(), ['store_id' => 'id']);
    }

    public function getOfficeStores()
    {
        return $this->hasMany(OfficeStore::className(), ['store_id' => 'id']);
    }

    public function getOffices()
    {
        return $this->hasMany(Office::className(), ['id' => 'office_id'])->via('officeStores');
    }
}
