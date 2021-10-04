<?php

namespace app\models;

use Yii;

class OldSemitrailer extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'old_semitrailer';
    }

    public function rules()
    {
        return [
            [['name', 'model_id', 'photo', 'chassis_type_id', 'chassis_manufacturer_id', 'markup'], 'required'],
            [['model_id', 'chassis_type_id', 'chassis_manufacturer_id'], 'integer'],
            [['markup'], 'string'],
            [['name'], 'string', 'max' => 512],
            [['photo'], 'string', 'max' => 1024],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'model_id' => Yii::t('app', 'Model ID'),
            'photo' => Yii::t('app', 'Photo'),
            'chassis_type_id' => Yii::t('app', 'Chassis Type ID'),
            'chassis_manufacturer_id' => Yii::t('app', 'Chassis Manufacturer ID'),
            'markup' => Yii::t('app', 'Markup'),
        ];
    }

    public function getUnits()
    {
        return $this->hasMany(OldUnit::class, ['id' => 'unit_id'])->viaTable('old_unit_to_semitrailer', ['semitrailer_id' => 'id']);
    }
}
