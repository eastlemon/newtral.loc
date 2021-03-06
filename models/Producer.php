<?php

namespace app\models;

use Yii;
use skeeks\yii2\slug\SlugBehavior;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;
use app\models\UploadForm;

class Producer extends ActiveRecord
{
    public $file;
    
    public static function tableName()
    {
        return 'producer';
    }
    
    public function rules()
    {
        return [
            [['slug'], 'string'],
            [['in_menu'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['picture'], 'required', 'on' => 'create'],
            [['file'], 'file', 'extensions' => 'jpg, jpeg, png, bmp, webp'],
            [['slug'], 'unique'],
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
            'in_menu' => Yii::t('app', 'In Menu'),
        ];
    }
    
    public function getTrailers()
    {
        return $this->hasMany(Trailer::className(), ['producer_id' => 'id']);
    }
    
    public function getParts()
    {
        return $this->hasMany(Part::className(), ['producer_id' => 'id']);
    }
    
    public function getUnits()
    {
        return $this->hasMany(Unit::className(), ['producer_id' => 'id']);
    }

    public static function getMenuItems()
    {
        return self::find()->where(['in_menu' => 1])->all();
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
}
