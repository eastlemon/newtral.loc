<?php

namespace app\models;

use Yii;

class Trailer extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'trailer';
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    public function getUserTrailers()
    {
        return $this->hasMany(UserTrailer::className(), ['trailer_id' => 'id']);
    }
}
