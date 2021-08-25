<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "part_spec".
 *
 * @property int $id
 * @property string $param
 * @property string $value
 * @property int $part_id
 *
 * @property Part $part
 */
class PartSpec extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'part_spec';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['param', 'value', 'part_id'], 'required'],
            [['param', 'value'], 'string'],
            [['part_id'], 'integer'],
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
            'param' => Yii::t('app', 'Param'),
            'value' => Yii::t('app', 'Value'),
            'part_id' => Yii::t('app', 'Part ID'),
        ];
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
