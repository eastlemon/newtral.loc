<?php

namespace app\models;

use yii\web\UploadedFile;

class UploadForm extends \yii\base\Model
{
    public $model;

    public function __construct($_m, $config = []) {
        $this->model = $_m;
        parent::__construct();
    }
    
    public function upload()
    {
        $file = UploadedFile::getInstance($this->model, 'file');
        $name = \Yii::$app->security->generateRandomString(9) . '.' . $file->extension;
        return ($file && $file->saveAs('uploads/' . $name)) ? $name : false;
    }
}
