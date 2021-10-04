<?php
    use yii\bootstrap4\Html;
    use yii\grid\GridView;

    $this->title = 'Parts';
    $this->params['breadcrumbs'][] = ['label' => 'Semitrailers', 'url' => ['semitrailers']];
    $this->params['breadcrumbs'][] = ['label' => 'Units', 'url' => ['units', 'id' => $unit_id]];
    $this->params['breadcrumbs'][] = ['label' => 'Nodes', 'url' => ['nodes', 'id' => $node_id, 'unit_id' => $unit_id]];
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
                    /*[
                        'attribute' => 'photo',
                        'format' => 'html',    
                        'value' => function ($model) {
                            return Html::img($model->photo, ['width' => '70px']);
                        },
                        'contentOptions' => ['style' => 'width:1px;'],
                    ],*/
                    [
                        'attribute' => 'name',
                        'value' => function ($model) use ($unit_id, $node_id, $pid) {
                            return Html::a($model->oldPart->name, ['old/part', 'id' => $model->part_id, 'unit_id' => $unit_id, 'node_id' => $node_id, 'part_id' => $pid]);
                        },
                        'format' => 'raw',
                    ],
                ],
            ]) ?>
        </div>
    </div>
</div>