<?php
    $this->title = Yii::t('app', 'Create');
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Units'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class="unit-create">
    <?= $this->render('_form', [
        'model' => $model,
        'dataCategory' => $dataCategory,
        'dataProducer' => $dataProducer,
    ]) ?>
</div>
