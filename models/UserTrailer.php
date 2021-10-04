<?php

namespace app\models;

use Yii;

class UserTrailer extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'user_trailer';
    }

    public function rules()
    {
        return [
            [['user_id', 'trailer_id'], 'required'],
            [['user_id', 'trailer_id'], 'integer'],
            [['trailer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Trailer::className(), 'targetAttribute' => ['trailer_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'trailer_id' => Yii::t('app', 'Trailer ID'),
        ];
    }

    public function getTrailer()
    {
        return $this->hasOne(Trailer::className(), ['id' => 'trailer_id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
