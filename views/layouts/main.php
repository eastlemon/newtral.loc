<?php
use yii\bootstrap4\Html;
use yii\bootstrap4\Breadcrumbs;
use yii2mod\notify\BootstrapNotify;

\app\assets\AppAsset::register($this);
?>

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
                <div class="container">
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