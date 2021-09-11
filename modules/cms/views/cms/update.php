<?php
    use yii\bootstrap4\Html;

    $this->title = Yii::t('yii2mod.cms', 'Update Page: {0}', $model->title);
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pages'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = Yii::t('yii2mod.cms', 'Update');
?>

<div class="container-fluid">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>