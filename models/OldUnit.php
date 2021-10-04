<?php

namespace app\models;

use Yii;

class OldUnit extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'old_unit';
    }
    
    public function rules()
    {
        return [
            [['name', 'article', 'factory_article', 'node_manufacturer_id', 'node_type_id', 'scheme', 'description'], 'required'],
            [['node_manufacturer_id', 'node_type_id'], 'integer'],
            [['description'], 'string'],
            [['name', 'article', 'factory_article'], 'string', 'max' => 512],
            [['scheme'], 'string', 'max' => 1024],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'article' => 'Article',
            'factory_article' => 'Factory Article',
            'node_manufacturer_id' => 'Node Manufacturer ID',
            'node_type_id' => 'Node Type ID',
            'scheme' => 'Scheme',
            'description' => 'Description',
        ];
    }
    
    public function getOldCategory()
    {
        return $this->hasOne(OldCategory::className(), ['id' => 'node_type_id']);
    }
    
    public function getOldManufacturer()
    {
        return $this->hasOne(OldManufacturer::className(), ['id' => 'node_manufacturer_id']);
    }
    
    public function getNodes()
    {
        return $this->hasMany(OldNode::class, ['id' => 'node_id'])->viaTable('old_node_to_unit_to_semitrailer', ['unit_id' => 'id']);
    }
}
