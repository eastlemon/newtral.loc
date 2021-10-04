<?php

namespace app\models;

use Yii;

class OldNode extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'old_node';
    }

    public function rules()
    {
        return [
            [['name', 'article', 'factory_article', 'drawing', 'photo', 'coordinates', 'description', 'node_type_id'], 'required'],
            [['drawing_height', 'drawing_width', 'node_type_id'], 'integer'],
            [['coordinates', 'description'], 'string'],
            [['name', 'article', 'factory_article'], 'string', 'max' => 512],
            [['drawing', 'photo'], 'string', 'max' => 1024],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'article' => 'Article',
            'factory_article' => 'Factory Article',
            'drawing' => 'Drawing',
            'drawing_height' => 'Drawing Height',
            'drawing_width' => 'Drawing Width',
            'photo' => 'Photo',
            'coordinates' => 'Coordinates',
            'description' => 'Description',
            'node_type_id' => 'Node Type ID',
        ];
    }
    
    public function getOldCategory()
    {
        return $this->hasOne(OldCategory::className(), ['id' => 'node_type_id']);
    }
    
    public function getNodeParts()
    {
        return $this->hasMany(OldNodePart::className(), ['node_id' => 'id']);
    }
}
