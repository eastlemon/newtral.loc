<?php
    $this->title = Yii::t('app', 'Create');
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class="user-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
