<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Part */

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Parts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="part-update">

    <?= $this->render('_form', [
        'model' => $model,
        'modelOffer' => $modelOffer,
        'data' => $data,
        'dataStores' => $dataStores,
        'dataCertificates' => $dataCertificates,
        'selectedCertificates' => $selectedCertificates,
    ]) ?>

</div>
