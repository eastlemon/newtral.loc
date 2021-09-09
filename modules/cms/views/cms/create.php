<?php
    $this->title = Yii::t('yii2mod.cms', 'Create Page');
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pages'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class="cms-model-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
