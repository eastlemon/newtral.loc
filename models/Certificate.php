<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;
use app\models\UploadForm;

class Certificate extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'certificate';
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'file'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'file' => Yii::t('app', 'File'),
        ];
    }

    public function getPartCertificates()
    {
        return $this->hasMany(PartCertificate::className(), ['certificate_id' => 'id']);
    }

    public function getParts()
    {
        return $this->hasMany(Part::className(), ['id' => 'part_id'])->viaTable('part_certificate', ['certificate_id' => 'id']);
    }

    public function beforeSave($insert)
    {
        $this->file = (new UploadForm(UploadedFile::getInstance($this, 'file')))->upload() ?: $this->file = $this->getOldAttribute('file');
        return parent::beforeSave($insert);
    }
}
