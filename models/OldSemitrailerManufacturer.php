<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "old_semitrailer_manufacturer".
 *
 * @property int $id
 * @property string $name
 * @property string $logo
 */
class OldSemitrailerManufacturer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'old_semitrailer_manufacturer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'logo'], 'required'],
            [['name'], 'string', 'max' => 512],
            [['logo'], 'string', 'max' => 1024],
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
            'logo' => 'Logo',
        ];
    }
}
