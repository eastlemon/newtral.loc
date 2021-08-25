<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Products');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Product'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'articule',
            [
                'attribute' => 'description',
                'value' => function ($data) {
                    return $data->description ?: null;
                },
            ],
            [
                'attribute' => 'picture',
                'format' => 'html',    
                'value' => function ($data) {
                    if (!empty($pictures = $data->productpictures)) {
                        foreach ($pictures as $picture) {
                            $_return .= Html::img('/uploads/1c/img/' . $picture->picture, ['width' => '70px']);
                        }
                    } else $_return .= Html::img('/images/noImage100x100.png', ['width' => '70px']);
                    return $_return;
                },
            ],
            [
                'attribute' => 'producer_id',
                'value' => 'producer.name',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
