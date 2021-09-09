<?php

namespace app\models;

use Yii;
use yii\behaviors\SluggableBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "node".
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $articul
 * @property string|null $description
 * @property int $category_id
 *
 * @property Category $category
 * @property NodePart[] $nodeParts
 * @property UnitNode[] $unitNodes
 */
class Node extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'node';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'articul', 'category_id'], 'required'],
            [['description'], 'string'],
            [['category_id'], 'integer'],
            [['name', 'slug', 'articul'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['slug'], 'unique'],
        ];
    }
    
    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'name',
                'slugAttribute' => 'slug',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'slug',
                ],
                'ensureUnique' => true,
            ]
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
     * Gets query for [[NodeParts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNodeParts()
    {
        return $this->hasMany(NodePart::className(), ['node_id' => 'id']);
    }

    /**
     * Gets query for [[UnitNodes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUnitNodes()
    {
        return $this->hasMany(UnitNode::className(), ['node_id' => 'id']);
    }
}
