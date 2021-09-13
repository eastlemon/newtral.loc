<?php

namespace app\models;

use Yii;
use yii\behaviors\SluggableBehavior;
use yii\db\ActiveRecord;

class Node extends ActiveRecord
{
    public static function tableName()
    {
        return 'node';
    }
    
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
    
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
    
    /*public function getNodeParts()
    {
        return $this->hasMany(NodePart::className(), ['node_id' => 'id']);
    }*/
    
    public function getUnitNodes()
    {
        return $this->hasMany(UnitNode::className(), ['node_id' => 'id']);
    }

    public function getParts()
    {
        return $this->hasMany(Part::className(), ['id' => 'part_id'])->viaTable('node_part', ['node_id' => 'id']);
    }
}
