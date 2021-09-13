<?php

namespace app\models;

use Yii;

class OldManufacturer extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'old_manufacturer';
    }
    
    public function rules()
    {
        return [
            [['name', 'on_main_page', 'from_qwep', 'from_bawm', 'from_auto', 'logo', 'from_omega', 'from_tehintkom', 'from_korona', 'from_kontinent', 'from_armtek'], 'required'],
            [['on_main_page', 'from_qwep', 'from_bawm', 'from_auto', 'from_omega', 'from_tehintkom', 'from_korona', 'from_kontinent', 'from_armtek'], 'integer'],
            [['name', 'logo'], 'string', 'max' => 512],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'on_main_page' => 'On Main Page',
            'from_qwep' => 'From Qwep',
            'from_bawm' => 'From Bawm',
            'from_auto' => 'From Auto',
            'logo' => 'Logo',
            'from_omega' => 'From Omega',
            'from_tehintkom' => 'From Tehintkom',
            'from_korona' => 'From Korona',
            'from_kontinent' => 'From Kontinent',
            'from_armtek' => 'From Armtek',
        ];
    }
}
