<?php
    $this->title = Yii::t('app', 'Create');
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Slides'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid">
    <?= $this->render('_form', [
        'model' => $model,
        'positions' => $positions,
    ]) ?>
</div>