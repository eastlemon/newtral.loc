<?php

use yii\bootstrap4\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProducerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Producers');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="producer-index">

    <p><?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-success']) ?></p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'contentOptions' => ['style' => 'width:1px;'],
            ],

            'name',
            'slug',
            [
                'attribute' => 'in_menu',
                'value' => function ($model) {
                    return $model->in_menu ? 'Да' : 'Нет';
                },
                'contentOptions' => ['style' => 'width:1px;'],
                'filter' => [
                    0 => 'Нет',
                    1 => 'Да',
                ],
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width:67px; text-align:center;'],
            ],
        ],
    ]) ?>

</div>
