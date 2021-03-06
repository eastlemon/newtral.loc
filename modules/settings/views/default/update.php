<?php
    use yii\bootstrap4\Html;

    $this->title = Yii::t('yii2mod.settings', 'Update Setting: {0} -> {1}', [$model->section, $model->key]);
    $this->params['breadcrumbs'][] = ['label' => Yii::t('yii2mod.settings', 'Settings'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = Yii::t('yii2mod.settings', 'Update Setting');
?>

<div class="container-fluid">
    <h3><?= Html::encode($this->title) ?></h3>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>