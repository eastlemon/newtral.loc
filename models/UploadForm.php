<?php
namespace app\models;

class UploadForm extends \yii\base\Model
{
    public $uploadFile;

    public function rules()
    {
        return [
            [['uploadFile'], 'file', 'skipOnEmpty' => false],
        ];
    }
    
    public function upload()
    {
        if ($validate = $this->validate()) {
            $name = $this->uploadFile->baseName . '.' . $this->uploadFile->extension;
            $this->uploadFile->saveAs('uploads/' . $name);
            return $name;
        }
        return $validate;
    }
}
