<?php
    use yii\bootstrap4\Html;
    use yii\grid\GridView;

    $this->title = Yii::t('app', 'Nodes');
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
    <div class="node-index">
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
                    'attribute' => 'category_id',
                    'value' => 'category.name',
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
