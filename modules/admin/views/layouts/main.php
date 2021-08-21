<?php

use app\assets\AdminAsset;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\widgets\Menu;
use yii2mod\notify\BootstrapNotify;

/* @var $this \yii\web\View */
/* @var $content string */

AdminAsset::register($this);
?>
<?php $this->beginPage(); ?>
    <!DOCTYPE html>
    <html lang="<?php echo Yii::$app->language; ?>">
    <head>
        <?php $this->registerMetaTag(['charset' => Yii::$app->charset]); ?>
        <?php $this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1']); ?>
        <?php echo Html::csrfMetaTags(); ?>
        <title><?php echo implode(' | ', array_filter([Html::encode($this->title), Yii::$app->name])); ?></title>
        <?php $this->head(); ?>
    </head>
    <body>
    <?php $this->beginBody(); ?>
    <?php echo BootstrapNotify::widget(); ?>
    <div class="wrap">
        <?php NavBar::begin([
            'brandLabel' => 'Admin Panel',
            'brandUrl' => '/admin',
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top',
            ],
        ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav'],
            'encodeLabels' => false,
            'items' => [
                [
                    'label' => '<i class="glyphicon glyphicon-file"></i> CMS',
                    'url' => ['/admin/cms/manage/index'],
                ],
                [
                    'label' => '<i class="glyphicon glyphicon-user"></i>',
                    'items' => [
                        [
                            'label' => '<i class="glyphicon glyphicon-th-list"></i> Users',
                            'url' => ['/admin/user/index'],
                        ],
                        [
                            'label' => '<i class="glyphicon glyphicon-user"></i> RBAC',
                            'active' => $this->context->module->id == 'rbac',
                            'items' => [
                                [
                                    'label' => 'route',
                                    'url' => ['/admin/rbac/route'],
                                ],
                                [
                                    'label' => 'permission',
                                    'url' => ['/admin/rbac/permission'],
                                ],
                                [
                                    'label' => 'role',
                                    'url' => ['/admin/rbac/role'],
                                ],
                                [
                                    'label' => 'assignment',
                                    'url' => ['/admin/rbac/assignment'],
                                ],
                            ],
                        ],
                    ],
                    //'active' => $this->context->module->id == 'user',
                ],
                [
                    'label' => '<i class="glyphicon glyphicon-wrench"></i>',
                    'url' => ['/admin/settings-storage'],
                    'active' => $this->context->module->id == 'settings-storage',
                ],
                [
                    'label' => '<i class="fas fa-industry"></i>',
                    'url' => ['/admin/producer'],
                    'active' => $this->context->id == 'producer',
                ],
                [
                    'label' => '<i class="fas fa-object-group"></i>',
                    'url' => ['/admin/category'],
                    'active' => $this->context->id == 'category',
                ],
                [
                    'label' => '<i class="fas fa-ring"></i>',
                    'url' => ['/admin/product'],
                    'active' => $this->context->id == 'product',
                ],
            ],
        ]);

        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                ['label' => '<i class="glyphicon glyphicon-globe"></i> Public Area', 'url' => ['/']],
                ['label' => '<i class="glyphicon glyphicon-off"></i> Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post'],
                ],
            ],
            'encodeLabels' => false,
        ]);
        NavBar::end();
        ?>
        <div class="container">
            <?php echo Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]); ?>
            <div class="row">
                <div class="col-lg-12">
                    <?php echo $content; ?>
                </div>
            </div>
        </div>
    </div>

    <?php $this->endBody(); ?>
    </body>
    </html>
<?php $this->endPage(); ?>
