<?php

namespace app\models;

use Yii;

class OldUnitToSemitrailer extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'old_unit_to_semitrailer';
    }

    public function rules()
    {
        return [
            [['semitrailer_id', 'unit_id', 'hash', 'priority', 'parent', 'path'], 'required'],
            [['semitrailer_id', 'unit_id', 'priority', 'parent'], 'integer'],
            [['hash'], 'string', 'max' => 512],
            [['path'], 'string', 'max' => 255],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'semitrailer_id' => Yii::t('app', 'Semitrailer ID'),
            'unit_id' => Yii::t('app', 'Unit ID'),
            'hash' => Yii::t('app', 'Hash'),
            'priority' => Yii::t('app', 'Priority'),
            'parent' => Yii::t('app', 'Parent'),
            'path' => Yii::t('app', 'Path'),
        ];
    }
}
