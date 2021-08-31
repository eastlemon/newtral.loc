<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "store".
 *
 * @property int $id
 * @property string $name
 * @property string|null $address
 *
 * @property Offer[] $offers
 * @property OfficeStore[] $officeStores
 */
class Store extends \yii\db\ActiveRecord
{
    public $office, $delivery;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'store';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'office', 'delivery'], 'required'],
            [['address'], 'string'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'address' => Yii::t('app', 'Address'),
        ];
    }

    /**
     * Gets query for [[Offers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOffers()
    {
        return $this->hasMany(Offer::className(), ['store_id' => 'id']);
    }

    /**
     * Gets query for [[OfficeStores]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOfficeStores()
    {
        return $this->hasMany(OfficeStore::className(), ['store_id' => 'id']);
    }

    public function getOffice()
    {
        return $this->hasMany(Office::className(), ['id' => 'office_id'])->viaTable('office_store', ['store_id' => 'id']);
    }
}
