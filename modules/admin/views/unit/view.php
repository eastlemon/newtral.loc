<?php
    use yii\bootstrap4\Html;
    use yii\widgets\DetailView;

    $this->title = $model->name;
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Units'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
    \yii\web\YiiAsset::register($this);
?>

<div class="container">
    <div class="unit-view">
        <p>
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) ?>
        </p>
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'name',
                'slug',
                'articul',
                [
                    'attribute' => 'description',
                    'format' => 'raw',
                ],
                [
                    'attribute' => 'category_id',
                    'label' => Yii::t('app', 'Category'),
                    'format' => 'html',
                    'value' => function ($model) {
                        return Html::a($model->category->name, ['/admin/category/view', 'id' => $model->category->id]);
                    },
                ],
                [
                    'attribute' => 'producer_id',
                    'label' => Yii::t('app', 'Producer'),
                    'format' => 'html',
                    'value' => function ($model) {
                        return Html::a($model->producer->name, ['/admin/producer/view', 'id' => $model->producer->id]);
                    },
                ],
            ],
        ]) ?>
    </div>
</div>
