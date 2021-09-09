<?php
    $this->title = Yii::t('app', 'Update');
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Offices'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
    <div class="office-update">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>
