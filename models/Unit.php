<?php

namespace app\models;

use Yii;
use skeeks\yii2\slug\SlugBehavior;
use yii\db\ActiveRecord;

class Unit extends ActiveRecord
{
    public static function tableName()
    {
        return 'unit';
    }
    
    public function rules()
    {
        return [
            [['name', 'articul', 'category_id', 'producer_id'], 'required'],
            [['description'], 'string'],
            [['category_id', 'producer_id'], 'integer'],
            [['name', 'slug', 'articul'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['producer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Producer::className(), 'targetAttribute' => ['producer_id' => 'id']],
            [['slug'], 'unique'],
        ];
    }
    
    public function behaviors()
    {
        return [
            /*[
                'class' => SluggableBehavior::className(),
                'attribute' => 'name',
                'slugAttribute' => 'slug',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'slug',
                ],
                'maxLength' => 64,
                'minLength' => 3,
                'ensureUnique' => true,
            ]*/
            'slug' => [
                'class' => SlugBehavior::className(),
                'slugAttribute' => 'slug',
                'attribute' => 'name',
                'maxLength' => 64,
                'minLength' => 3,
                'ensureUnique' => true,
                'slugifyOptions' => [
                    'lowercase' => true,
                    'separator' => '-',
                    'trim' => true,
                ]
            ],
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
            'producer_id' => Yii::t('app', 'Producer ID'),
        ];
    }
    
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function getProducer()
    {
        return $this->hasOne(Producer::className(), ['id' => 'producer_id']);
    }
    
    public function getUnitNodes()
    {
        return $this->hasMany(UnitNode::className(), ['unit_id' => 'id']);
    }
}
