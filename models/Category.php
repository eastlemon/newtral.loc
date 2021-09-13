<?php

namespace app\models;

use Yii;
use yii\behaviors\SluggableBehavior;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;
use app\models\UploadForm;

class Category extends ActiveRecord
{
    public static function tableName()
    {
        return 'category';
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['parent_id', 'is_popular'], 'integer'],
            [['name', 'slug', 'picture'], 'string', 'max' => 255],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['parent_id' => 'id']],
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
            'picture' => Yii::t('app', 'Picture'),
            'parent_id' => Yii::t('app', 'Parent ID'),
            'is_popular' => Yii::t('app', 'Popular'),
        ];
    }
    
    public function getParent()
    {
        return $this->hasOne(Category::className(), ['id' => 'parent_id']);
    }
    
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['parent_id' => 'id']);
    }
    
    public function getNodes()
    {
        return $this->hasMany(Node::className(), ['category_id' => 'id']);
    }
    
    public function getUnits()
    {
        return $this->hasMany(Unit::className(), ['category_id' => 'id']);
    }

    public static function getRoots()
    {
        return self::find()->where(['parent_id' => null])->all();
    }

    public static function getPopularRoots()
    {
        return self::find()->where(['parent_id' => null, 'is_popular' => 1])->all();
    }

    public function beforeSave($insert)
    {
        $this->picture = (new UploadForm(UploadedFile::getInstance($this, 'picture')))->upload() ?: $this->picture = $this->getOldAttribute('picture');
        return parent::beforeSave($insert);
    }

    public function afterFind()
    {
        parent::afterFind();
        $this->picture ? $this->picture = 'uploads/' . $this->picture : $this->picture = 'images/noImage100x100.png';
    }
}
