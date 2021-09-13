<?php

namespace app\models;

use Yii;

class OldStore extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'old_store';
    }

    public function rules()
    {
        return [
            [['name', 'description', 'own', '1c_id', '1c_price_id', 'source_function', 'source', 'schedule_period', 'schedule_period_number', 'schedule_time', 'delivery_days_count', 'markup_on_vendor_price_percentage', 'import_aviability', 'delete_after_update', 'is_qwep', 'login', 'password', 'vendor_id', 'qwep_id', 'parse_days', 'parse_from_days', 'parse_delivery_date', 'branch_id', 'delivery_on_request', 'replace_delivery_to_available_if_available', 'delivery_replaces', 'stop_words'], 'required'],
            [['name', 'description', 'delivery_replaces', 'stop_words'], 'string'],
            [['own', 'schedule_period_number', 'delivery_days_count', 'import_aviability', 'delete_after_update', 'is_qwep', 'qwep_id', 'parse_days', 'parse_from_days', 'parse_delivery_date', 'branch_id', 'delivery_on_request', 'replace_delivery_to_available_if_available'], 'integer'],
            [['schedule_time'], 'safe'],
            [['markup_on_vendor_price_percentage'], 'number'],
            [['1c_id', '1c_price_id', 'source_function', 'schedule_period', 'login', 'password', 'vendor_id'], 'string', 'max' => 512],
            [['source'], 'string', 'max' => 1024],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'own' => 'Own',
            '1c_id' => '1c ID',
            '1c_price_id' => '1c Price ID',
            'source_function' => 'Source Function',
            'source' => 'Source',
            'schedule_period' => 'Schedule Period',
            'schedule_period_number' => 'Schedule Period Number',
            'schedule_time' => 'Schedule Time',
            'delivery_days_count' => 'Delivery Days Count',
            'markup_on_vendor_price_percentage' => 'Markup On Vendor Price Percentage',
            'import_aviability' => 'Import Aviability',
            'delete_after_update' => 'Delete After Update',
            'is_qwep' => 'Is Qwep',
            'login' => 'Login',
            'password' => 'Password',
            'vendor_id' => 'Vendor ID',
            'qwep_id' => 'Qwep ID',
            'parse_days' => 'Parse Days',
            'parse_from_days' => 'Parse From Days',
            'parse_delivery_date' => 'Parse Delivery Date',
            'branch_id' => 'Branch ID',
            'delivery_on_request' => 'Delivery On Request',
            'replace_delivery_to_available_if_available' => 'Replace Delivery To Available If Available',
            'delivery_replaces' => 'Delivery Replaces',
            'stop_words' => 'Stop Words',
        ];
    }
}
