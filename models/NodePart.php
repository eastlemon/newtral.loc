<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "node_part".
 *
 * @property int $id
 * @property int $node_id
 * @property int $part_id
 *
 * @property Node $node
 * @property Part $part
 */
class NodePart extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'node_part';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['node_id', 'part_id'], 'required'],
            [['node_id', 'part_id'], 'integer'],
            [['node_id'], 'exist', 'skipOnError' => true, 'targetClass' => Node::className(), 'targetAttribute' => ['node_id' => 'id']],
            [['part_id'], 'exist', 'skipOnError' => true, 'targetClass' => Part::className(), 'targetAttribute' => ['part_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'node_id' => Yii::t('app', 'Node ID'),
            'part_id' => Yii::t('app', 'Part ID'),
        ];
    }

    /**
     * Gets query for [[Node]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNode()
    {
        return $this->hasOne(Node::className(), ['id' => 'node_id']);
    }

    /**
     * Gets query for [[Part]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPart()
    {
        return $this->hasOne(Part::className(), ['id' => 'part_id']);
    }
}
