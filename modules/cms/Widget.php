<?php
namespace app\modules\cms;

use Yii;
use dosamigos\ckeditor\CKEditor;

class Widget extends CKEditor
{
    public function init()
    {
        parent::init();

        $request = Yii::$app->getRequest();

        if ($request->enableCsrfValidation) {
            $this->clientOptions['imageUploadParams'][$request->csrfParam] = $request->getCsrfToken();
            $this->clientOptions['imageManagerDeleteParams'][$request->csrfParam] = $request->getCsrfToken();
        }
    }
}
