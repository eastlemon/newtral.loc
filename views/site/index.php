<?php
use yii\helpers\Html;
$this->title = Yii::t('app', 'Front Page');
?>

<?php $this->registerJsFile(
    '@web/js/main-modal.js',
    ['depends' => [\yii\web\JqueryAsset::class]]
); ?>
