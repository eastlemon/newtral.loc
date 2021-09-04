<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'name' => 'Запчасти на трал',
    'language' => 'ru-RU',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'w9ulx0SeOPM2_xj3jKmsesXHyksJIhsS',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\UserModel',
            'enableAutoLogin' => true,
            'on afterLogin' => function ($event) {
                $event->identity->updateLastLogin();
            },
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'producer/<slug:[\w-]+>' => 'producer/index',
                'category/<slug:[\w-]+>' => 'category/index',
                'part/<name:\w+>' => 'part/index',
                'product/<name:\w+>' => 'product/index',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                '<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
                ['class' => 'app\modules\cms\components\PageUrlRule'],
                
                //'<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                //'<controller:(product|category)>/<id:\d+>' => '<controller>/view',
                //'<controller:(test)>/<product:\d{4}>' => 'test/product',
            ],
        ],
        'settings' => [
            'class' => 'yii2mod\settings\components\Settings',
        ],
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                ],
                'app'=> [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                ],
                'yii2mod.comments' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@yii2mod/comments/messages',
                ],
                'yii2mod.rbac' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@yii2mod/rbac/messages',
                ],
                'yii2mod.settings' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@yii2mod/settings/messages',
                ],
                'yii2mod.user' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@yii2mod/user/messages',
                ],
            ],
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'formatter' => [
            'thousandSeparator' => '&nbsp;',
            'currencyCode' => '₽',
        ],
        'authClientCollection' => [
            'class' => 'yii\authclient\Collection',
            'clients' => [
                'vk' => [
                    'class' => 'yii\authclient\clients\VKontakte',
                    'clientId' => '',
                    'clientSecret' => '',
                ],
            ],
        ],
    ],
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
            'modules' => [
                'cms' => [
                    'class' => 'app\modules\cms\Module',
                    'controllerMap' => [
                        'manage' => [
                            'class' => 'app\modules\cms\controllers\ManageController',
                            'layout' => '@app/modules/admin/views/layouts/main',
                        ],
                    ],
                ],
                'rbac' => [
                    'class' => 'yii2mod\rbac\Module',
                    'controllerMap' => [
                        'route' => [
                            'class' => 'yii2mod\rbac\controllers\RouteController',
                            'modelClass' => [
                                'class' => 'yii2mod\rbac\models\RouteModel',
                                'excludeModules' => ['debug', 'gii'],
                            ],
                        ],
                    ],
                ],
                'settings-storage' => [
                    'class' => 'yii2mod\settings\Module',
                ],
            ],
        ],
        'comment' => [
            'class' => 'yii2mod\comments\Module',
            'controllerMap' => [
                'manage' => [
                    'class' => 'yii2mod\comments\controllers\ManageController',
                    'layout' => '@app/modules/admin/views/layouts/main',
                ],
            ],
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
