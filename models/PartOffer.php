<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "part_offer".
 *
 * @property int $id
 * @property float $price
 * @property int $part_id
 *
 * @property Part $part
 */
class PartOffer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'part_offer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price', 'part_id'], 'required'],
            [['price'], 'number'],
            [['part_id'], 'integer'],
            [['part_id'], 'exist', 'skipOnError' => true, 'targetClass' => Part::className(), 'targetAttribute' => ['part_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'price' => Yii::t('app', 'Price'),
            'part_id' => Yii::t('app', 'Part ID'),
        ];
    }

    /**
     * Gets query for [[Part]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPart()
    {
        return $this->hasOne(Part::className(), ['id' => 'part_id']);
    }
}
