<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "old_node_to_unit_to_semitrailer".
 *
 * @property int $id
 * @property int $node_id
 * @property int $unit_id
 * @property int $unit_to_semitrailer_id
 * @property string $hash
 * @property string $path
 */
class OldNodeToUnit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'old_node_to_unit_to_semitrailer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['node_id', 'unit_id', 'unit_to_semitrailer_id', 'hash', 'path'], 'required'],
            [['node_id', 'unit_id', 'unit_to_semitrailer_id'], 'integer'],
            [['hash'], 'string', 'max' => 512],
            [['path'], 'string', 'max' => 255],
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
            'unit_id' => Yii::t('app', 'Unit ID'),
            'unit_to_semitrailer_id' => Yii::t('app', 'Unit To Semitrailer ID'),
            'hash' => Yii::t('app', 'Hash'),
            'path' => Yii::t('app', 'Path'),
        ];
    }
}
