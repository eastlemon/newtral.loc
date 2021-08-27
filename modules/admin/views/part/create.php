<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Part */

$this->title = Yii::t('app', 'Create Part');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Parts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="part-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelOffer' => $modelOffer,
        'data' => $data,
        'dataSrores' => $dataSrores,
    ]) ?>

</div>
