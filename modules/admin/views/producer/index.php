<?php
    use yii\grid\GridView;
    use yii\bootstrap4\Html;

    $this->title = Yii::t('app', 'Producers');
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
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
                    return Html::img('/' . $model->picture, ['width' => '70px']);
                },
                'contentOptions' => ['style' => 'width:1px;'],
            ],
            'name',
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
                'template' => '{view} {update} {delete}',
                'contentOptions' => ['style' => 'width:1px; text-align:center; white-space: nowrap;'],
            ],
        ],
    ]) ?>
</div>