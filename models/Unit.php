<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "unit".
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $articul
 * @property string|null $description
 * @property int $category_id
 * @property int $producer_id
 *
 * @property Category $category
 * @property Producer $producer
 * @property UnitNode[] $unitNodes
 */
class Unit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'unit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'slug', 'articul', 'category_id', 'producer_id'], 'required'],
            [['description'], 'string'],
            [['category_id', 'producer_id'], 'integer'],
            [['name', 'slug', 'articul'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
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
            'slug' => Yii::t('app', 'Slug'),
            'articul' => Yii::t('app', 'Articul'),
            'description' => Yii::t('app', 'Description'),
            'category_id' => Yii::t('app', 'Category ID'),
            'producer_id' => Yii::t('app', 'Producer ID'),
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
     * Gets query for [[Producer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducer()
    {
        return $this->hasOne(Producer::className(), ['id' => 'producer_id']);
    }

    /**
     * Gets query for [[UnitNodes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUnitNodes()
    {
        return $this->hasMany(UnitNode::className(), ['unit_id' => 'id']);
    }
}
