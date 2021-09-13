<?php
    use yii\bootstrap4\Html;
    use app\widgets\PartGrid;

    $this->title = $model->name;
    $this->params['breadcrumbs'][] = $this->title;
    \yii\web\YiiAsset::register($this);
?>

<div class="container">
    <div class="search-view">
        <?= PartGrid::widget(['dataProvider' => $dataProvider]) ?>
    </div>
</div>