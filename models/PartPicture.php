<?php

namespace app\models;

use Yii;

class PartPicture extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'part_picture';
    }
    
    public function rules()
    {
        return [
            [['picture', 'part_id'], 'required'],
            [['picture'], 'string'],
            [['part_id'], 'integer'],
            [['part_id'], 'exist', 'skipOnError' => true, 'targetClass' => Part::className(), 'targetAttribute' => ['part_id' => 'id']],
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
}