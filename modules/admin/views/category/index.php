<?php
    use yii\grid\GridView;
    use yii\bootstrap4\Html;

    $this->title = Yii::t('app', 'Categories');
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Control'), 'url' => ['/admin']];
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid">
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
                    return Html::img('/' . $model->picture, ['width' => '70px']);
                },
                'contentOptions' => ['style' => 'width:1px;'],
            ],
            'name',
            [
                'attribute' => 'parent_id',
                'value' => function ($model) {
                    return $model->parent->name ?: Yii::t('app', 'Root');
                },
                'label' => Yii::t('app', 'Category ID'),
            ],
            [
                'attribute' => 'is_popular',
                'value' => function ($model) {
                    return $model->is_popular ? 'Да' : 'Нет';
                },
                'contentOptions' => ['style' => 'width:1px;'],
                'filter' => [
                    0 => 'Нет',
                    1 => 'Да',
                ],
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}&nbsp;{update}&nbsp;{delete}',
                'contentOptions' => ['style' => 'width:80px; text-align:center;'],
            ],
        ],
    ]) ?>
</div>
