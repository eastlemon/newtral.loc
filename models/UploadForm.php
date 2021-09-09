<?php

namespace app\models;

class UploadForm extends \yii\base\Model
{
    public $file;

    public function __construct($_file, $config = []) {
        $this->file = $_file;
        parent::__construct();
    }

    public function rules()
    {
        return [
            [['file'], 'file', 'skipOnEmpty' => false],
        ];
    }
    
    public function upload()
    {
        $name = \Yii::$app->security->generateRandomString(9) . '.' . $this->file->extension;
        if ($this->file) {
            $this->file->saveAs('uploads/' . $name);
            return $name;
        } else return false;
    }
}
