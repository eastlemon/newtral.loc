<?php
    $this->title = Yii::t('app', 'Create');
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Offices'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class="office-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
