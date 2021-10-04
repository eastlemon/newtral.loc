<?php
    use yii\bootstrap4\Html;
    use yii\grid\GridView;

    $this->title = '?';
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
    <div class="row">
        <div class="col">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    [
                        'class' => 'yii\grid\SerialColumn',
                        'contentOptions' => ['style' => 'width:1px;'],
                    ],
                    [
                        'attribute' => 'name',
                        /*'value' => function ($model) {
                            return Html::a($model->name, ['old/units', 'id' => $model->id]);
                        },*/
                        'format' => 'raw',
                    ],
                    /*[
                        'attribute' => 'type',
                        'value' => function ($model) {
                            return $model->oldSemitrailerType->name;
                        },
                        'format' => 'raw',
                    ],*/
                    [
                        'attribute' => 'type',
                        'value' => function ($model) {
                            foreach ($model->oldSemitrailerModels as $item) $to_returm .= $item->name;
                            return $to_returm;
                        },
                        'format' => 'raw',
                    ],
                ],
            ]) ?>
        </div>
    </div>
</div>