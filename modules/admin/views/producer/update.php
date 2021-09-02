<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Producer */

$this->title = Yii::t('app', 'Update Producer: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Producers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="producer-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
