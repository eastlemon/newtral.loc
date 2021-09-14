<?php

namespace app\models;

use Yii;
use app\models\UploadForm;

class Slide extends \yii\db\ActiveRecord
{
    public $file;

    public static function tableName()
    {
        return 'slide';
    }
    
    public function rules()
    {
        return [
            [['header', 'content', 'position', 'link'], 'required'],
            [['header', 'content', 'position', 'link'], 'string'],
            [['picture'], 'required', 'on' => 'create'],
            [['file'], 'file', 'extensions' => 'jpg, jpeg, png, bmp, webp'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'header' => Yii::t('app', 'Header'),
            'content' => Yii::t('app', 'Content'),
            'position' => Yii::t('app', 'Position'),
            'picture' => Yii::t('app', 'Picture'),
            'link' => Yii::t('app', 'Link'),
            'file' => Yii::t('app', 'File'),
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
}