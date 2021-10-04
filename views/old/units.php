<?php
    use yii\bootstrap4\Html;
    use yii\grid\GridView;

    $this->title = 'Units';
    $this->params['breadcrumbs'][] = ['label' => 'Semitrailers', 'url' => ['semitrailers']];
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
                        'value' => function ($model) use ($uid) {
                            return Html::a($model->name, ['old/nodes', 'id' => $model->id, 'unit_id' => $uid]);
                        },
                        'format' => 'raw',
                    ],
                ],
            ]) ?>
        </div>
    </div>
</div>