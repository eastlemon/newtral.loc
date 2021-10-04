<?php
    use yii\bootstrap4\Html;
    use yii\grid\GridView;

    $this->title = 'Semitrailers';
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
                        'attribute' => 'photo',
                        'format' => 'html',    
                        'value' => function ($model) {
                            return Html::img($model->photo, ['width' => '70px']);
                        },
                        'contentOptions' => ['style' => 'width:1px;'],
                    ],
                    [
                        'attribute' => 'name',
                        'value' => function ($model) {
                            return Html::a($model->name, ['old/units', 'id' => $model->id]);
                        },
                        'format' => 'raw',
                    ],
                ],
            ]) ?>
        </div>
    </div>
</div>