<?php
    use yii\grid\GridView;
    use yii\bootstrap4\Html;

    $this->title = Yii::t('app', 'Categories');
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Control'), 'url' => ['/admin']];
    $this->params['breadcrumbs'][] = $this->title;
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Create'), 'url' => ['/admin/category/create']];
?>

<div class="container-fluid">
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
