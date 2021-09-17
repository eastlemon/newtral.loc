<?php

namespace app\models;

use Yii;

class NodePart extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'node_part';
    }

    public function rules()
    {
        return [
            [['node_id', 'part_id'], 'required'],
            [['node_id', 'part_id'], 'integer'],
            [['node_id'], 'exist', 'skipOnError' => true, 'targetClass' => Node::className(), 'targetAttribute' => ['node_id' => 'id']],
            [['part_id'], 'exist', 'skipOnError' => true, 'targetClass' => Part::className(), 'targetAttribute' => ['part_id' => 'id']],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'node_id' => Yii::t('app', 'Node ID'),
            'part_id' => Yii::t('app', 'Part ID'),
        ];
    }
    
    public function getNode()
    {
        return $this->hasOne(Node::className(), ['id' => 'node_id']);
    }
    
    public function getPart()
    {
        return $this->hasOne(Part::className(), ['id' => 'part_id']);
    }
}
