<?php
    use yii\grid\GridView;
    use yii\bootstrap4\Html;

    $this->title = Yii::t('app', 'Certificates');
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid">
    <p><?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-success']) ?></p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'contentOptions' => ['style' => 'width:1px;'],
            ],
            'name:ntext',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{download}&nbsp;{view}&nbsp;{update}&nbsp;{delete}',
                'buttons' => [
                    'download' => function ($url, $model) {
                        $icon = '<i class="fas fa-download"></i>';
                        $url = ['download', 'id' => $model->id];
                        return Html::a($icon, $url);
                    },
                ],
                'contentOptions' => ['style' => 'width:100px; text-align:center;'],
            ],
        ],
    ]) ?>
</div>