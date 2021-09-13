<?php

namespace app\models;

use Yii;

class OldPart extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'old_part';
    }
    
    public function rules()
    {
        return [
            [['part_manufacturer_id', 'name', 'article', 'factory_article', 'note', 'photo', 'is_original', 'drawing', 'scheme_position', 'original', 'qwep_search_id', 'qwep_json', 'bawm_search_id', 'bawm_json', 'auto_search_id', 'auto_json', 'source', 'last_updated_date', 'tehintkom_search_id', 'korona_search_id', 'kontinent_search_id', 'armtek_search_id'], 'required'],
            [['part_manufacturer_id', 'is_original', 'original', 'tehintkom_search_id'], 'integer'],
            [['note', 'coords', 'qwep_search_id', 'qwep_json', 'bawm_search_id', 'bawm_json', 'auto_search_id', 'auto_json', 'omega_search_id', 'omega_json', 'korona_search_id', 'kontinent_search_id', 'armtek_search_id'], 'string'],
            [['last_updated_date'], 'safe'],
            [['name', 'article', 'factory_article', 'scheme_position', 'source'], 'string', 'max' => 512],
            [['photo', 'drawing'], 'string', 'max' => 1024],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'part_manufacturer_id' => 'Part Manufacturer ID',
            'name' => 'Name',
            'article' => 'Article',
            'factory_article' => 'Factory Article',
            'note' => 'Note',
            'photo' => 'Photo',
            'is_original' => 'Is Original',
            'drawing' => 'Drawing',
            'scheme_position' => 'Scheme Position',
            'coords' => 'Coords',
            'original' => 'Original',
            'qwep_search_id' => 'Qwep Search ID',
            'qwep_json' => 'Qwep Json',
            'bawm_search_id' => 'Bawm Search ID',
            'bawm_json' => 'Bawm Json',
            'auto_search_id' => 'Auto Search ID',
            'auto_json' => 'Auto Json',
            'source' => 'Source',
            'last_updated_date' => 'Last Updated Date',
            'omega_search_id' => 'Omega Search ID',
            'omega_json' => 'Omega Json',
            'tehintkom_search_id' => 'Tehintkom Search ID',
            'korona_search_id' => 'Korona Search ID',
            'kontinent_search_id' => 'Kontinent Search ID',
            'armtek_search_id' => 'Armtek Search ID',
        ];
    }
    
    public function getOldManufacturer()
    {
        return $this->hasOne(OldManufacturer::className(), ['id' => 'part_manufacturer_id']);
    }
}
