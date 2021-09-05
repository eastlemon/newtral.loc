<?php
use yii\bootstrap4\Html;
use app\widgets\PartGrid;

$this->title = Yii::t('app', 'Search results');
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="container">
    <div class="search-view">
        <?= PartGrid::widget(['dataProvider' => $searchProvider]) ?>
    </div>
</div>