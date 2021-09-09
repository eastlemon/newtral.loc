<?php
    $this->title = Yii::t('yii2mod.settings', 'Create Setting');
    $this->params['breadcrumbs'][] = ['label' => Yii::t('yii2mod.settings', 'Settings'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class="setting-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
