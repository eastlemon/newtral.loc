<?php

namespace app\models;

use Yii;

class OldNodePart extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'old_node_part';
    }
    
    public function rules()
    {
        return [
            [['part_id', 'node_id', 'node_to_unit_to_semitrailer_id', 'hash', 'path'], 'required'],
            [['part_id', 'node_id', 'node_to_unit_to_semitrailer_id'], 'integer'],
            [['hash'], 'string', 'max' => 512],
            [['path'], 'string', 'max' => 255],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'part_id' => 'Part ID',
            'node_id' => 'Node ID',
            'node_to_unit_to_semitrailer_id' => 'Node To Unit To Semitrailer ID',
            'hash' => 'Hash',
            'path' => 'Path',
        ];
    }
    
    public function getOldNode()
    {
        return $this->hasOne(OldNode::className(), ['id' => 'node_id']);
    }
    
    public function getOldPart()
    {
        return $this->hasOne(OldPart::className(), ['id' => 'part_id']);
    }
}
