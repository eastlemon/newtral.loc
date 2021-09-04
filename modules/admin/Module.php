<?php
namespace app\modules\admin;

use yii2mod\rbac\filters\AccessControl;

class Module extends \yii\base\Module
{
    public $defaultRoute = 'cms';
    public $layout = 'main';
    public $controllerNamespace = 'app\modules\admin\controllers';

    public function behaviors(): array
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],
        ];
    }
}
