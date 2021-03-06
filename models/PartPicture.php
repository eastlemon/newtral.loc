<?php

namespace app\models;

use Yii;
use app\models\UploadForm;

class PartPicture extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'part_picture';
    }
    
    public function rules()
    {
        return [
            [['part_id'], 'integer'],
            [['part_id'], 'required'],
            [['part_id'], 'exist', 'skipOnError' => true, 'targetClass' => Part::className(), 'targetAttribute' => ['part_id' => 'id']],
            [['picture'], 'required', 'on' => 'create'],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'picture' => Yii::t('app', 'Picture'),
            'part_id' => Yii::t('app', 'Part ID'),
        ];
    }
    
    public function getPart()
    {
        return $this->hasOne(Part::className(), ['id' => 'part_id']);
    }

    public function beforeValidate()
    {
        $this->picture = (new UploadForm($this->part))->upload() ?: $this->picture = $this->getOldAttribute('picture');
        return parent::beforeValidate();
    }
}