<?php

use yii\bootstrap4\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Categories');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Control'), 'url' => ['/admin']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <p><?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-success']) ?></p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'contentOptions' => ['style' => 'width:1px;'],
            ],

            [
                'attribute' => 'picture',
                'format' => 'html',    
                'value' => function ($model) {
                    $model['picture'] ? $picture = '/uploads/' . $model['picture'] : $picture = '/images/noImage.png';
                    return Html::img($picture, ['width' => '70px']);
                },
                'contentOptions' => ['style' => 'width:1px;'],
            ],
            'name',
            'slug',
            [
                'attribute' => 'parent_id',
                'value' => function ($model) {
                    return $model->parent->name ?: Yii::t('app', 'Root');
                },
                'label' => Yii::t('app', 'Category ID'),
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}&nbsp;{update}&nbsp;{delete}',
                'contentOptions' => ['style' => 'width:80px; text-align:center;'],
            ],
        ],
    ]); ?>


</div>
