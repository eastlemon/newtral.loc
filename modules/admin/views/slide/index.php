<?php
use yii\bootstrap4\Html;
use yii\grid\GridView;

$this->title = Yii::t('app', 'Slides');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="slide-index">

    <p>
        <?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'contentOptions' => ['style' => 'width:1px;'],
            ],

            [
                'attribute' => 'header',
                'format' => 'raw',
            ],
            [
                'attribute' => 'content',
                'format' => 'raw',
            ],
            [
                'attribute' => 'position',
                'value' => function ($model) {
                    return '<i class="fas fa-align-' . $model->position . '"></i>';
                },
                'format' => 'raw',
                'contentOptions' => ['style' => 'width:1px; text-align:center;'],
            ],
            'link:ntext',
            [
                'attribute' => 'picture',
                'format' => 'html',    
                'value' => function ($model) {
                    $model['picture'] ? $picture = '/uploads/' . $model['picture'] : $picture = '/images/noImage.png';
                    return Html::img($picture, ['width' => '140px']);
                },
                'contentOptions' => ['style' => 'width:1px; text-align:center;'],
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width:87px; text-align:center;'],
            ],
        ],
    ]) ?>

</div>
