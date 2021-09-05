<?php

use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Office */

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Offices'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="office-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
