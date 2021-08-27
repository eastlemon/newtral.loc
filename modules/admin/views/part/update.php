<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Part */

$this->title = Yii::t('app', 'Update Part: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Parts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="part-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelOffer' => $modelOffer,
        'data' => $data,
        'dataSrores' => $dataSrores,
    ]) ?>

</div>
