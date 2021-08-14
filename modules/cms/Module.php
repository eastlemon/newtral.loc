<?php
namespace app\modules\cms;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\cms\controllers';

    public $defaultRoute = 'manage';

    public $editorOptions = [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ];

    public $enableMarkdown = false;

    public $markdownEditorOptions = [
        'showIcons' => ['code', 'table'],
    ];
}