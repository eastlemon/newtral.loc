<?php
    $this->title = Yii::t('app', 'Create');
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Trailers'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid">
    <?= $this->render('_form', [
        'model' => $model,
        'producers' => $producers,
        'types' => $types,
        'modes' => $modes,
        'axes' => $axes,
        'chassis' => $chassis,
    ]) ?>
</div>