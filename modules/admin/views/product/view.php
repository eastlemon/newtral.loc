<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

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
            'articule',
            [
                'attribute' => 'description',
                'value' => function ($data) {
                    return $data->description ?: null;
                },
            ],
            [
                'attribute' => 'picture',
                'format' => 'html',    
                'value' => function ($data) {
                    if (!empty($pictures = $data->productpictures)) {
                        foreach ($pictures as $picture) {
                            $_return .= Html::img('/uploads/1c/img/' . $picture->picture, ['width' => '140px']);
                        }
                    } else $_return .= Html::img('/images/noImage100x100.png', ['width' => '140px']);
                    return $_return;
                },
            ],
            [
                'attribute' => 'producer_id',
                'label' => Yii::t('app', 'Producer'),
                'value' => function ($data) {
                    return Html::encode($data->producer->name);
                },
                'format' => 'raw',
            ],
        ],
    ]) ?>

</div>
