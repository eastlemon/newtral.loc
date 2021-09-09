<?php
    use yii\bootstrap4\Html;
    use yii\grid\GridView;

    $this->title = Yii::t('app', 'Slides');
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
    <div class="slide-index">
        <p><?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-success']) ?></p>
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
                        return Html::img('/' . $model->picture, ['width' => '70px']);
                    },
                    'contentOptions' => ['style' => 'width:1px;'],
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view}&nbsp;{update}&nbsp;{delete}',
                    'contentOptions' => ['style' => 'width:80px; text-align:center;'],
                ],
            ],
        ]) ?>
    </div>
</div>
