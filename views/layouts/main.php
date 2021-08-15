<?php

use app\assets\AppAsset;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\widgets\Menu;
use yii2mod\notify\BootstrapNotify;

AppAsset::register($this);
?>
<?php $this->beginPage(); ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language; ?>">
        <head>
            <?php $this->registerMetaTag(['charset' => Yii::$app->charset]); ?>
            <?php $this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1']); ?>
            <?= Html::csrfMetaTags(); ?>
            <title><?= implode(' | ', array_filter([Html::encode($this->title), Yii::$app->name])); ?></title>
            <?php $this->head(); ?>
        </head>
        <body>
            <?php $this->beginBody(); ?>
                <?= Yii::$app->view->renderFile('@app/views/layouts/header.php'); ?>
                <?= BootstrapNotify::widget(); ?>
                <?= $content; ?>
                <?= Yii::$app->view->renderFile('@app/views/layouts/footer.php') ?>
            <?php $this->endBody(); ?>
        </body>
    </html>
<?php $this->endPage(); ?>