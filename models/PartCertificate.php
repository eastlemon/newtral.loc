<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "part_certificate".
 *
 * @property int $id
 * @property int $part_id
 * @property int $certificate_id
 *
 * @property Certificate $certificate
 * @property Part $part
 */
class PartCertificate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'part_certificate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['part_id', 'certificate_id'], 'required'],
            [['part_id', 'certificate_id'], 'integer'],
            [['certificate_id'], 'exist', 'skipOnError' => true, 'targetClass' => Certificate::className(), 'targetAttribute' => ['certificate_id' => 'id']],
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
            'part_id' => Yii::t('app', 'Part ID'),
            'certificate_id' => Yii::t('app', 'Certificate ID'),
        ];
    }

    /**
     * Gets query for [[Certificate]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCertificate()
    {
        return $this->hasOne(Certificate::className(), ['id' => 'certificate_id']);
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
