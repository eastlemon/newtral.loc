<?php
    $this->title = Yii::t('app', 'Create Slide');
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Slides'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class="slide-create">
    <?= $this->render('_form', [
        'model' => $model,
        'positions' => $positions,
    ]) ?>
</div>
