<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "old_semitrailer_model".
 *
 * @property int $id
 * @property string $name
 * @property string $image
 * @property int $semitrailer_manufacturer_id
 * @property int $semitrailer_type_id
 * @property int $semitrailer_mode_id
 * @property int $semitrailer_axis_id
 */
class OldSemitrailerModel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'old_semitrailer_model';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'image', 'semitrailer_manufacturer_id', 'semitrailer_type_id', 'semitrailer_mode_id', 'semitrailer_axis_id'], 'required'],
            [['semitrailer_manufacturer_id', 'semitrailer_type_id', 'semitrailer_mode_id', 'semitrailer_axis_id'], 'integer'],
            [['name'], 'string', 'max' => 512],
            [['image'], 'string', 'max' => 1024],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'image' => 'Image',
            'semitrailer_manufacturer_id' => 'Semitrailer Manufacturer ID',
            'semitrailer_type_id' => 'Semitrailer Type ID',
            'semitrailer_mode_id' => 'Semitrailer Mode ID',
            'semitrailer_axis_id' => 'Semitrailer Axis ID',
        ];
    }

    public function getOldSemitrailerManufacturer()
    {
        return $this->hasOne(OldSemitrailerManufacturer::className(), ['id' => 'semitrailer_manufacturer_id']);
    }

    public function getOldSemitrailerType()
    {
        return $this->hasOne(OldSemitrailerType::className(), ['id' => 'semitrailer_type_id']);
    }

    public function getOldSemitrailerMode()
    {
        return $this->hasMany(OldSemitrailerMode::className(), ['id' => 'semitrailer_mode_id']);
    }

    public function getOldSemitrailerAxis()
    {
        return $this->hasMany(OldSemitrailerAxis::className(), ['id' => 'semitrailer_axis_id']);
    }
}
