<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "part_analogue".
 *
 * @property int $id
 * @property int $part_id
 * @property int $part_id_analogue
 *
 * @property Part $part
 * @property Part $partIdAnalogue
 */
class PartAnalogue extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'part_analogue';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['part_id', 'part_id_analogue'], 'required'],
            [['part_id', 'part_id_analogue'], 'integer'],
            [['part_id'], 'exist', 'skipOnError' => true, 'targetClass' => Part::className(), 'targetAttribute' => ['part_id' => 'id']],
            [['part_id_analogue'], 'exist', 'skipOnError' => true, 'targetClass' => Part::className(), 'targetAttribute' => ['part_id_analogue' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'part_id' => Yii::t('app', 'Part ID'),
            'part_id_analogue' => Yii::t('app', 'Part Id Analogue'),
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

    /**
     * Gets query for [[PartIdAnalogue]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPartIdAnalogue()
    {
        return $this->hasOne(Part::className(), ['id' => 'part_id_analogue']);
    }
}
