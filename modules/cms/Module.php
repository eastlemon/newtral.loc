<?php

namespace app\modules\cms;

class Module extends \yii\base\Module
{
    public $defaultRoute = 'manage';

    public $layout = 'main';
    
    public $controllerNamespace = 'app\modules\cms\controllers';

    public $editorOptions = [
        'options' => [
            'rows' => 6,
        ],
        'preset' => 'basic',
    ];

    public $enableMarkdown = false;

    public $markdownEditorOptions = [
        'showIcons' => [
            'code',
            'table',
        ],
    ];
}