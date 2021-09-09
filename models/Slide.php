<?php
namespace app\models;

use Yii;
use yii\web\UploadedFile;
use app\models\UploadForm;

class Slide extends \yii\db\ActiveRecord
{
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
            [['picture'], 'file', 'extensions' => 'png, jpg, webp'],
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
        ];
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