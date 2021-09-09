<?php
    $this->title = Yii::t('app', 'Update');
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class="user-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
