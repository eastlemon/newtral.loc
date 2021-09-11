<?php
    $this->title = Yii::t('yii2mod.settings', 'Create Setting');
    $this->params['breadcrumbs'][] = ['label' => Yii::t('yii2mod.settings', 'Settings'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>