<?php

namespace app\models;

use Yii;
use app\models\UploadForm;

class Certificate extends \yii\db\ActiveRecord
{
    public $file;

    public static function tableName()
    {
        return 'certificate';
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'document'], 'string', 'max' => 255],
            [['document'], 'required', 'on' => 'create'],
            [['file'], 'file', 'extensions' => 'pdf, doc, docx'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'document' => Yii::t('app', 'Document'),
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

    public function beforeValidate()
    {
        $this->document = (new UploadForm($this))->upload() ?: $this->document = $this->getOldAttribute('document');
        return parent::beforeValidate();
    }
}
