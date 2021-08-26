<?php
use app\assets\AdminAsset;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\widgets\Menu;
use yii2mod\notify\BootstrapNotify;

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
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-lg-2">
                    <?php NavBar::begin([
                        'brandLabel' => Yii::t('app', 'Control'),
                        'brandUrl' => '/admin',
                        'options' => [
                            'class' => 'navbar-inverse navbar-fixed-side',
                        ],
                    ]); ?>
                    <?= Nav::widget([
                        'options' => ['class' => 'navbar-nav'],
                        'encodeLabels' => false,
                        'items' => [
                            [
                                'label' => '<i class="fas fa-industry"></i>&nbsp;&nbsp;' . Yii::t('app', 'Producers'),
                                'url' => ['/admin/producer'],
                                'active' => $this->context->id == 'producer',
                            ],
                            [
                                'label' => '<i class="fas fa-object-group"></i>&nbsp;&nbsp;' . Yii::t('app', 'Categories'),
                                'url' => ['/admin/category'],
                                'active' => $this->context->id == 'category',
                            ],
                            [
                                'label' => '<i class="fas fa-certificate"></i>&nbsp;&nbsp;' . Yii::t('app', 'Certificates'),
                                'url' => ['/admin/certificate'],
                                'active' => $this->context->id == 'certificate',
                            ],
                            [
                                'label' => '<i class="fas fa-ring"></i>&nbsp;&nbsp;' . Yii::t('app', 'Parts'),
                                'url' => ['/admin/part'],
                                'active' => $this->context->id == 'part',
                            ],
                            [
                                'label' => '<i class="fas fa-ring"></i>&nbsp;&nbsp;' . Yii::t('app', 'Nodes'),
                                'url' => ['/admin/node'],
                                'active' => $this->context->id == 'node',
                            ],
                            [
                                'label' => '<i class="fas fa-ring"></i>&nbsp;&nbsp;' . Yii::t('app', 'Units'),
                                'url' => ['/admin/unit'],
                                'active' => $this->context->id == 'unit',
                            ],
                        ],
                    ]) ?>
                    <?php NavBar::end(); ?>
                </div>
                <div class="col-sm-9 col-lg-10">
                    <?php NavBar::begin([
                        'innerContainerOptions' => ['class' => 'container-fluid'],
                    ]);
                    echo Nav::widget([
                        'options' => ['class' => 'navbar-nav'],
                        'encodeLabels' => false,
                        'items' => [
                            [
                                'label' => '<i class="glyphicon glyphicon-file"></i>&nbsp;' . Yii::t('app', 'Pages'),
                                'url' => ['/admin/cms/manage/index'],
                            ],
                            [
                                'label' => '<i class="glyphicon glyphicon-user"></i>',
                                'items' => [
                                    [
                                        'label' => '<i class="glyphicon glyphicon-th-list"></i>&nbsp;' . Yii::t('app', 'Users'),
                                        'url' => ['/admin/user/index'],
                                    ],
                                    [
                                        'label' => '<i class="glyphicon glyphicon-user"></i>&nbsp;' . Yii::t('app', 'RBAC'),
                                        'active' => $this->context->module->id == 'rbac',
                                        'items' => [
                                            [
                                                'label' => Yii::t('app', 'Route'),
                                                'url' => ['/admin/rbac/route'],
                                            ],
                                            [
                                                'label' => Yii::t('app', 'Permission'),
                                                'url' => ['/admin/rbac/permission'],
                                            ],
                                            [
                                                'label' => Yii::t('app', 'Role'),
                                                'url' => ['/admin/rbac/role'],
                                            ],
                                            [
                                                'label' => Yii::t('app', 'Assignment'),
                                                'url' => ['/admin/rbac/assignment'],
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                            [
                                'label' => '<i class="glyphicon glyphicon-wrench"></i>',
                                'url' => ['/admin/settings-storage'],
                                'active' => $this->context->module->id == 'settings-storage',
                            ],
                        ],
                    ]);

                    echo Nav::widget([
                        'options' => ['class' => 'navbar-nav navbar-right'],
                        'items' => [
                            ['label' => '<i class="glyphicon glyphicon-globe"></i>&nbsp;' . Yii::t('app', 'Go to the site'), 'url' => ['/']],
                            ['label' => '<i class="glyphicon glyphicon-off"></i>&nbsp;' . Yii::t('app', 'Logout') . '&nbsp;(' . Yii::$app->user->identity->username . ')',
                                'url' => ['/site/logout'],
                                'linkOptions' => ['data-method' => 'post'],
                            ],
                        ],
                        'encodeLabels' => false,
                    ]);
                    NavBar::end();
                    ?>
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
        </div>
    </div>
    <?php $this->endBody(); ?>
    </body>
    </html>
<?php $this->endPage(); ?>
