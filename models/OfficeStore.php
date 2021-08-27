<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "office_store".
 *
 * @property int $id
 * @property int $delivery
 * @property int $office_id
 * @property int $store_id
 *
 * @property Office $office
 * @property Store $store
 */
class OfficeStore extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'office_store';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['delivery', 'office_id', 'store_id'], 'required'],
            [['delivery', 'office_id', 'store_id'], 'integer'],
            [['office_id'], 'exist', 'skipOnError' => true, 'targetClass' => Office::className(), 'targetAttribute' => ['office_id' => 'id']],
            [['store_id'], 'exist', 'skipOnError' => true, 'targetClass' => Store::className(), 'targetAttribute' => ['store_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'delivery' => Yii::t('app', 'Delivery'),
            'office_id' => Yii::t('app', 'Office ID'),
            'store_id' => Yii::t('app', 'Store ID'),
        ];
    }

    /**
     * Gets query for [[Office]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOffice()
    {
        return $this->hasOne(Office::className(), ['id' => 'office_id']);
    }

    /**
     * Gets query for [[Store]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStore()
    {
        return $this->hasOne(Store::className(), ['id' => 'store_id']);
    }
}
