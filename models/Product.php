<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $articule
 * @property string|null $description
 * @property int $producer_id
 *
 * @property Producer $producer
 * @property Productpicture[] $productpictures
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['producer_id'], 'required'],
            [['producer_id'], 'integer'],
            [['name', 'articule'], 'string', 'max' => 255],
            [['producer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Producer::className(), 'targetAttribute' => ['producer_id' => 'id']],
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
            'articule' => Yii::t('app', 'Articule'),
            'description' => Yii::t('app', 'Description'),
            'producer_id' => Yii::t('app', 'Producer ID'),
        ];
    }

    /**
     * Gets query for [[Producer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducer()
    {
        return $this->hasOne(Producer::className(), ['id' => 'producer_id']);
    }

    /**
     * Gets query for [[Productpictures]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductpictures()
    {
        return $this->hasMany(Productpicture::className(), ['product_id' => 'id']);
    }
}
