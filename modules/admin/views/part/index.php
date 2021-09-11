<?php
    use yii\grid\GridView;
    use yii\bootstrap4\Html;

    $this->title = Yii::t('app', 'Parts');
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
            'name',
            'slug',
            'articul',
            [
                'attribute' => 'description',
                'format' => 'raw',
            ],
            [
                'attribute' => 'producer_id',
                'value' => 'producer.name',
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}&nbsp;{update}&nbsp;{delete}',
                'contentOptions' => ['style' => 'width:80px; text-align:center;'],
            ],
        ],
    ]) ?>
</div>
