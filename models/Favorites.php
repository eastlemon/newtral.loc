<?php

namespace app\models;

use Yii;

class Favorites extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'favorites';
    }
    
    public function rules()
    {
        return [
            [['created_at', 'user_id', 'part_id'], 'required'],
            [['user_id', 'part_id'], 'integer'],
            [['created_at'], 'string', 'max' => 255],
            [['part_id'], 'exist', 'skipOnError' => true, 'targetClass' => Part::className(), 'targetAttribute' => ['part_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'user_id' => Yii::t('app', 'User ID'),
            'part_id' => Yii::t('app', 'Part ID'),
        ];
    }

    public function getPart()
    {
        return $this->hasOne(Part::className(), ['id' => 'part_id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
