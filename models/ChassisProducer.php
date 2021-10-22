<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "chassis_producer".
 *
 * @property int $id
 * @property int $chassis_id
 * @property int $producer_id
 *
 * @property Chassis $chassis
 * @property Producer $producer
 */
class ChassisProducer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chassis_producer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['chassis_id', 'producer_id'], 'required'],
            [['chassis_id', 'producer_id'], 'integer'],
            [['chassis_id'], 'exist', 'skipOnError' => true, 'targetClass' => Chassis::className(), 'targetAttribute' => ['chassis_id' => 'id']],
            [['producer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Producer::className(), 'targetAttribute' => ['producer_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'chassis_id' => Yii::t('app', 'Chassis ID'),
            'producer_id' => Yii::t('app', 'Producer ID'),
        ];
    }

    /**
     * Gets query for [[Chassis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChassis()
    {
        return $this->hasOne(Chassis::className(), ['id' => 'chassis_id']);
    }

    /**
     * Gets query for [[Producer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducer()
    {
        return $this->hasOne(Producer::className(), ['id' => 'producer_id']);
    }
}
