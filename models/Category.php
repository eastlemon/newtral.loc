<?php

namespace app\models;

use Yii;
use skeeks\yii2\slug\SlugBehavior;
use yii\db\ActiveRecord;
use app\models\UploadForm;

class Category extends ActiveRecord
{
    public $file;
    
    public static function tableName()
    {
        return 'category';
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['parent_id', 'is_popular'], 'integer'],
            [['name', 'slug'], 'string', 'max' => 255],
            [['picture'], 'required', 'on' => 'create'],
            [['file'], 'file', 'extensions' => 'jpg, jpeg, png, bmp, webp'],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['parent_id' => 'id']],
            [['slug'], 'unique'],
            [['in_menu'], 'integer'],
        ];
    }
    
    public function behaviors()
    {
        return [
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
            'picture' => Yii::t('app', 'Picture'),
            'parent_id' => Yii::t('app', 'Parent ID'),
            'is_popular' => Yii::t('app', 'Popular'),
            'in_menu' => Yii::t('app', 'In Menu'),
        ];
    }

    public function beforeValidate()
    {
        $this->picture = (new UploadForm($this))->upload() ?: $this->picture = $this->getOldAttribute('picture');
        return parent::beforeValidate();
    }

    public function afterFind()
    {
        parent::afterFind();
        $this->picture ? $this->picture = 'uploads/' . $this->picture : $this->picture = 'images/noImage100x100.png';
    }
    
    public function getParent()
    {
        return $this->hasOne(Category::className(), ['id' => 'parent_id']);
    }
    
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['parent_id' => 'id']);
    }

    public static function getRoots()
    {
        return self::find()->where(['parent_id' => null])->all();
    }

    public static function getPopularRoots()
    {
        return self::find()->where(['parent_id' => null, 'is_popular' => 1])->all();
    }

    public static function getMenuItems()
    {
        return self::find()->where(['in_menu' => 1])->all();
    }
}
