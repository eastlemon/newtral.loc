<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Part Specs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="part-spec-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Part Spec'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'param:ntext',
            'value:ntext',
            'part_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
