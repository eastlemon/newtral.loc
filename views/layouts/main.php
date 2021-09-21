<?php
use yii\bootstrap4\Html;
use yii\bootstrap4\Breadcrumbs;
use yii2mod\notify\BootstrapNotify;

\app\assets\AppAsset::register($this);
?>

<!--<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-6">
            <a href="#"><img src="https://dummyimage.com/160x120/000000/fff.png&text=Photo+1" class="img-thumbnail my-3"></a>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
            <a href="#"><img src="https://dummyimage.com/160x120/000000/fff.png&text=Photo+2" class="img-thumbnail my-3"></a>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
            <a href="#"><img src="https://dummyimage.com/160x120/000000/fff.png&text=Photo+3" class="img-thumbnail my-3"></a>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
            <a href="#"><img src="https://dummyimage.com/160x120/000000/fff.png&text=Photo+4" class="img-thumbnail my-3"></a>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
            <a href="#"><img src="https://dummyimage.com/160x120/000000/fff.png&text=Photo+5" class="img-thumbnail my-3"></a>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
            <a href="#"><img src="https://dummyimage.com/160x120/000000/fff.png&text=Photo+6" class="img-thumbnail my-3"></a>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
            <a href="#"><img src="https://dummyimage.com/160x120/000000/fff.png&text=Photo+7" class="img-thumbnail my-3"></a>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
            <a href="#"><img src="https://dummyimage.com/160x120/000000/fff.png&text=Photo+8" class="img-thumbnail my-3"></a>
        </div>
    </div>
</div>-->

<?php $this->beginPage(); ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
        <head>
            <?php $this->registerMetaTag(['charset' => Yii::$app->charset]); ?>
            <?php $this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1']); ?>
            <?= Html::csrfMetaTags() ?>
            <title><?= implode(' | ', array_filter([Html::encode($this->title), Yii::$app->name])) ?></title>
            <?php $this->head(); ?>
        </head>
        <body class="d-flex flex-column min-vh-100">
            <?php $this->beginBody(); ?>
                <?= Yii::$app->view->renderFile('@app/views/layouts/header.php') ?>
                <?= BootstrapNotify::widget() ?>
                <div class="container" style="padding-top: 15px;">
                    <?= Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ]) ?>
                </div>
                <?= $content ?>
                <?= Yii::$app->view->renderFile('@app/views/layouts/footer.php') ?>
            <?php $this->endBody(); ?>
        </body>
    </html>
<?php $this->endPage(); ?>