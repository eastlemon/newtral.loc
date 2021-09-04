<footer class="main-footer">
    &copy; <?= Yii::$app->settings->get('mainPage', 'startYear') ?> - <?= date('Y', time()) ?> <?= Yii::$app->settings->get('mainPage', 'copyrightText') ?>
    <div class="float-right d-none d-sm-inline-block"><b><?= Yii::t('app', 'Version') ?></b> 1.0.0</div>
</footer>