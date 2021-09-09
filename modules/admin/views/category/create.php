<?php
    $this->title = Yii::t('app', 'Create');
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categories'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class="category-create">
    <?= $this->render('_form', [
        'model' => $model,
        'data' => $data,
    ]) ?>
</div>
