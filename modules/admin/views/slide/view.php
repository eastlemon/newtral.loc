<?php
    use yii\bootstrap4\Html;
    use yii\widgets\DetailView;

    $this->title = $model->id;
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Slides'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
    \yii\web\YiiAsset::register($this);
?>

<div class="container">
    <div class="slide-view">
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
                [
                    'attribute' => 'header',
                    'format' => 'raw',
                ],
                [
                    'attribute' => 'content',
                    'format' => 'raw',
                ],
                [
                    'attribute' => 'position',
                    'value' => function ($model) {
                        return '<i class="fas fa-align-' . $model->position . '"></i>';
                    },
                    'format' => 'raw',
                ],
                [
                    'attribute' => 'picture',
                    'format' => 'html',    
                    'value' => function ($model) {
                        return Html::img('/' . $model->picture, ['width' => '140px']);
                    },
                ],
                'link:ntext',
            ],
        ]) ?>
    </div>
</div>
