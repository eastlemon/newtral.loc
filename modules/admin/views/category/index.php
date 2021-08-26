<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Categories');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Control'), 'url' => ['/admin']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Category'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'contentOptions' => ['style' => 'width:1px;'],
            ],

            //'id',
            'name',
            [
                'attribute' => 'picture',
                'format' => 'html',    
                'value' => function ($data) {
                    $data['picture'] ? $picture = '/uploads/' . $data['picture'] : $picture = '/images/noImage.png';
                    return Html::img($picture, ['width' => '70px']);
                },
            ],
            [
                'attribute' => 'parent_id',
                'value' => function ($data) {
                    return $data->parent->name ?: Yii::t('app', 'Root');
                },
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width:67px; text-align:center;'],
            ],
        ],
    ]); ?>


</div>
