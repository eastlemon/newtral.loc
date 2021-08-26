<?php
namespace app\models;

class UploadForm extends \yii\base\Model
{
    public $uploadFile;

    public function rules()
    {
        return [
            [['uploadFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'pdf, png, jpg'],
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) {
            $name = $this->uploadFile->baseName . '.' . $this->uploadFile->extension;
            $this->uploadFile->saveAs('uploads/' . $name);
            return $name;
        } else {
            return false;
        }
    }
}
