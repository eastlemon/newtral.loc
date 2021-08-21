<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "productpicture".
 *
 * @property int $id
 * @property string|null $picture
 * @property int $product_id
 *
 * @property Product $product
 */
class Productpicture extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'productpicture';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['picture'], 'string'],
            [['product_id'], 'required'],
            [['product_id'], 'integer'],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'picture' => Yii::t('app', 'Picture'),
            'product_id' => Yii::t('app', 'Product ID'),
        ];
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
