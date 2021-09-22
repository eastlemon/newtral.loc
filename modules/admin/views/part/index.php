<?php
    use yii\grid\GridView;
    use yii\bootstrap4\Html;

    $this->title = Yii::t('app', 'Parts');
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'beforeRow' => function ($model, $index, $widget, $grid) {
            if ($widget == 0) return '<tr><td colspan="' . (count($model->attributes) + 2) . '">' . Html::a('<i class="fas fa-plus-square"></i>&nbsp;' . Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-link']) . '</td></tr>';
        },
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'contentOptions' => ['style' => 'width:1px;'],
            ],
            [
                'attribute' => 'picture',
                'format' => 'html',    
                'value' => function ($model) {
                    return Html::img($model->partFirstImage, ['width' => '70px']);
                },
                'contentOptions' => ['style' => 'width:1px;'],
            ],
            'name',
            'articul',
            [
                'attribute' => 'producer_id',
                'value' => 'producer.name',
            ],
            'created_at:date',
            'updated_at:date',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'contentOptions' => ['style' => 'width:1px; text-align:center; white-space: nowrap;'],
            ],
        ],
    ]) ?>
</div>
