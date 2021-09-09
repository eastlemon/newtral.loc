<?php
    $this->title = Yii::t('app', 'Create');
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Certificates'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class="certificate-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
