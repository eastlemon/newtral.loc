<?php
use yii\bootstrap4\Html;

$this->title = Yii::t('yii2mod.settings', 'Create Setting');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii2mod.settings', 'Settings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="setting-create">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>