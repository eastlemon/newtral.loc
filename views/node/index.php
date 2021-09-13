<?php
    use yii\bootstrap4\Html;
    use yii\grid\GridView;

    $this->title = $model->name;
    $this->params['breadcrumbs'][] = $this->title;
    \yii\web\YiiAsset::register($this);
?>

<div class="container">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'attribute' => 'name',
                'label' => Yii::t('app', 'Name'),
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a($model->name, ['/part/' . $model->slug]);
                }
            ],
        ],
    ]) ?>
</div>
