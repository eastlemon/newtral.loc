<?php
    use yii\grid\GridView;
    use yii\bootstrap4\Html;

    $this->title = Yii::t('app', 'Slides');
    $this->params['breadcrumbs'][] = $this->title;
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Create'), 'url' => ['/admin/slide/create']];
?>

<div class="container-fluid">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'contentOptions' => ['style' => 'width:1px;'],
            ],
            [
                'attribute' => 'header',
                'value' => function ($model) {
                    return strip_tags($model->header);
                }
            ],
            [
                'attribute' => 'content',
                'value' => function ($model) {
                    return strip_tags($model->content);
                }
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
                    return Html::img('/' . $model->picture, ['width' => '70px']);
                },
                'contentOptions' => ['style' => 'width:1px;'],
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'contentOptions' => ['style' => 'width:1px; text-align:center; white-space: nowrap;'],
            ],
        ],
    ]) ?>
</div>