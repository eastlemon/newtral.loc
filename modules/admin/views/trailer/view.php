<?php
    use yii\bootstrap4\Html;
    use yii\widgets\DetailView;

    $this->title = $model->id;
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Trailers'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
    
    \yii\web\YiiAsset::register($this);
?>

<div class="container-fluid">
    <p>
        <?= Html::a(Yii::t('app', 'Diagram'), ['diagram', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
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
            'name',
            [
                'attribute' => 'producer_id',
                'value' => $model->producer->name,
            ],
            [
                'attribute' => 'type_id',
                'value' => $model->type->name,
            ],
            [
                'attribute' => 'mode_id',
                'value' => $model->mode->name,
            ],
            [
                'attribute' => 'axis_id',
                'value' => $model->axis->name,
            ],
            [
                'attribute' => 'chassis_id',
                'value' => $model->chassis->name,
            ],
            [
                'attribute' => 'image',
                'format' => 'html',    
                'value' => function ($model) {
                    return Html::img('/' . $model->image, ['width' => '140px']);
                },
            ],
        ],
    ]) ?>
</div>