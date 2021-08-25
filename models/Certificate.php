<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "certificate".
 *
 * @property int $id
 * @property string $name
 * @property string $file
 *
 * @property PartCertificate[] $partCertificates
 */
class Certificate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'certificate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'file'], 'required'],
            [['name', 'file'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'file' => Yii::t('app', 'File'),
        ];
    }

    /**
     * Gets query for [[PartCertificates]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPartCertificates()
    {
        return $this->hasMany(PartCertificate::className(), ['certificate_id' => 'id']);
    }
}
