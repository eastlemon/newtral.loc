<?php
    use yii\bootstrap4\Html;
    use yii\grid\GridView;

    $this->title = $model->name;
    $this->params['breadcrumbs'][] = $this->title;
    \yii\web\YiiAsset::register($this);
?>

<div class="container">
    <?= GridView::widget([
        'dataProvider' => $categoryProvider,
        'columns' => [
            [
                'attribute' => 'name',
                'label' => Yii::t('app', 'Name'),
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a($model->name, ['/category/' . $model->slug]);
                }
            ],
        ],
    ]) ?>
</div>

