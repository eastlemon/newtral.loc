<?php

namespace app\models;

use Yii;

class OldOffer extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'old_offer';
    }

    public function rules()
    {
        return [
            [['part_id', 'store_id', 'count', 'price', 'manufacturer_price', 'min_count', 'bunch', 'hidden', 'qwep_id', 'qwep_search_id', 'bawm_search_id', 'auto_search_id', 'delivery_text', 'sup_logo', 'omega_search_id', 'tehintkom_search_id', 'korona_search_id', 'kontinent_search_id', 'armtek_search_id'], 'required'],
            [['part_id', 'store_id', 'count', 'min_count', 'bunch', 'hidden', 'bawm_search_id', 'auto_search_id', 'omega_search_id', 'tehintkom_search_id', 'korona_search_id', 'kontinent_search_id', 'armtek_search_id'], 'integer'],
            [['price', 'manufacturer_price'], 'number'],
            [['sup_logo'], 'string'],
            [['qwep_id', 'qwep_search_id'], 'string', 'max' => 512],
            [['delivery_text'], 'string', 'max' => 255],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'part_id' => 'Part ID',
            'store_id' => 'Store ID',
            'count' => 'Count',
            'price' => 'Price',
            'manufacturer_price' => 'Manufacturer Price',
            'min_count' => 'Min Count',
            'bunch' => 'Bunch',
            'hidden' => 'Hidden',
            'qwep_id' => 'Qwep ID',
            'qwep_search_id' => 'Qwep Search ID',
            'bawm_search_id' => 'Bawm Search ID',
            'auto_search_id' => 'Auto Search ID',
            'delivery_text' => 'Delivery Text',
            'sup_logo' => 'Sup Logo',
            'omega_search_id' => 'Omega Search ID',
            'tehintkom_search_id' => 'Tehintkom Search ID',
            'korona_search_id' => 'Korona Search ID',
            'kontinent_search_id' => 'Kontinent Search ID',
            'armtek_search_id' => 'Armtek Search ID',
        ];
    }
    
    public function getOldStore()
    {
        return $this->hasOne(OldStore::className(), ['id' => 'store_id']);
    }
}
