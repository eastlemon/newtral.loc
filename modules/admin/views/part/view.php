<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Part */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Parts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="part-view">

    <p>
        <?= Html::a(Yii::t('app', 'See'), ['/part/' . $model->slug], ['class' => 'btn btn-success', 'target'=>'_blank']) ?>
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
            'description:ntext',
            [
                'attribute' => 'producer_id',
                'label' => Yii::t('app', 'Producer'),
                'format' => 'html',
                'value' => function ($model) {
                    return Html::a($model->producer->name, ['/admin/producer/view', 'id' => $model->producer->id]);
                },
            ],
            [
                'attribute' => 'pictures',
                'format' => 'html',
                'value' => function ($model) {
                    if (!empty($pictures = $model->partPictures)) {
                        foreach ($pictures as $picture) {
                            $_return .= Html::img('/uploads/' . $picture->picture, ['width' => '140px']);
                        }
                    } else $_return .= Html::img('/images/noImage100x100.png', ['width' => '140px']);
                    return $_return;
                },
            ],
            [
                'attribute' => 'offers',
                'format' => 'html',
                'value' => function ($model) {
                    if (!empty($offers = $model->offers)) {
                        foreach ($offers as $offer) {
                            $_return .= '<p>' . $offer->price . '</p>';
                        }
                    } else $_return .= '<p>' . Yii::t('app', 'No Offers') . '</p>';
                    return $_return;
                },
            ],
            [
                'attribute' => 'certificates',
                'format' => 'html',
                'value' => function ($model) {
                    if (!empty($certificates = $model->certificates)) {
                        foreach ($certificates as $certificate) {
                            $_return .= '<p>' . $certificate->name . '</p>';
                        }
                    } else $_return .= '<p>' . Yii::t('app', 'No Certificates') . '</p>';
                    return $_return;
                },
            ],
        ],
    ]) ?>

</div>
