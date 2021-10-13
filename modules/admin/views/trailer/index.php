<?php
    use yii\grid\GridView;
    use yii\bootstrap4\Html;

    $this->title = Yii::t('app', 'Trailers');
    $this->params['breadcrumbs'][] = $this->title;
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Create'), 'url' => ['/admin/trailer/create']];
?>

<div class="container-fluid">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'contentOptions' => ['style' => 'width:1px;'],
            ],
            'name',
            'producer.name',
            [
                'attribute' => 'image',
                'format' => 'html',    
                'value' => function ($model) {
                    return Html::img('/' . $model->image, ['width' => '70px']);
                },
                'contentOptions' => ['style' => 'width:1px;'],
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{diagram} {view} {update} {delete}',
                'buttons' => [
                    'diagram' => function ($url, $model) {
                        $icon = '<i class="fas fa-project-diagram"></i>';
                        $url = ['diagram', 'id' => $model->id];
                        return Html::a($icon, $url);
                    },
                ],
                'contentOptions' => ['style' => 'width:1px; text-align:center; white-space: nowrap;'],
            ],
        ],
    ]) ?>
</div>