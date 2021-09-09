<?php
    $this->title = Yii::t('app', 'Create');
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Producers'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class="producer-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
