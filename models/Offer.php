<?php

namespace app\models;

use Yii;

class Offer extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'offer';
    }

    public function rules()
    {
        return [
            [['amount', 'part_id', 'store_id'], 'integer'],
            [['price', 'part_id', 'store_id'], 'required', 'on' => 'create'],
            [['price'], 'number'],
            [['part_id'], 'exist', 'skipOnError' => true, 'targetClass' => Part::className(), 'targetAttribute' => ['part_id' => 'id']],
            [['store_id'], 'exist', 'skipOnError' => true, 'targetClass' => Store::className(), 'targetAttribute' => ['store_id' => 'id']],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'amount' => Yii::t('app', 'Amount'),
            'price' => Yii::t('app', 'Price'),
            'part_id' => Yii::t('app', 'Part ID'),
            'store_id' => Yii::t('app', 'Store ID'),
        ];
    }

    public function getPart()
    {
        return $this->hasOne(Part::className(), ['id' => 'part_id']);
    }

    public function getStore()
    {
        return $this->hasOne(Store::className(), ['id' => 'store_id']);
    }
}
