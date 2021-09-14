<?php
    use yii\bootstrap4\Html;
    use yii\widgets\DetailView;

    $this->title = $model->name;
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categories'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;

    \yii\web\YiiAsset::register($this);
?>

<div class="container-fluid">
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
            [
                'attribute' => 'picture',
                'format' => 'html',    
                'value' => function ($model) {
                    return Html::img('/' . $model->picture, ['width' => '140px']);
                },
            ],
            [
                'attribute' => 'parent_id',
                'label' => Yii::t('app', 'Parent'),
                'format' => 'html',
                'value' => function ($model) {
                    return $model->parent ? '<a href="/admin/category/view?id=' . $model->parent->id . '">' . $model->parent->name . '</a>' : Yii::t('app', 'Root');
                },
            ],
            [
                'attribute' => 'is_popular',
                'value' => function ($model) {
                    return $model->is_popular ? 'Да' : 'Нет';
                },
            ],
        ],
    ]) ?>
</div>