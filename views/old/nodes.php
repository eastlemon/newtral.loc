<?php
    use yii\bootstrap4\Html;
    use yii\grid\GridView;

    $this->title = 'Nodes';
    $this->params['breadcrumbs'][] = ['label' => 'Semitrailers', 'url' => ['semitrailers']];
    $this->params['breadcrumbs'][] = ['label' => 'Units', 'url' => ['units', 'id' => $unit_id]];
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
                        'value' => function ($model) use ($unit_id, $nid) {
                            return Html::a($model->name, ['old/parts', 'id' => $model->id, 'unit_id' => $unit_id, 'node_id' => $nid]);
                        },
                        'format' => 'raw',
                    ],
                ],
            ]) ?>
        </div>
    </div>
</div>