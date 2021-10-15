<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "trailer_category".
 *
 * @property int $id
 * @property int $num
 * @property int $trailer_id
 * @property int $category_id
 *
 * @property Category $category
 * @property Trailer $trailer
 */
class TrailerCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'trailer_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['num', 'trailer_id', 'category_id'], 'required'],
            [['num', 'trailer_id', 'category_id'], 'integer'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['trailer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Trailer::className(), 'targetAttribute' => ['trailer_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'num' => Yii::t('app', 'Num'),
            'trailer_id' => Yii::t('app', 'Trailer ID'),
            'category_id' => Yii::t('app', 'Category ID'),
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * Gets query for [[Trailer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrailer()
    {
        return $this->hasOne(Trailer::className(), ['id' => 'trailer_id']);
    }
}
