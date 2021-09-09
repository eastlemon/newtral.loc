<?php
    $this->title = Yii::t('app', 'Update');
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Producers'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class="producer-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
