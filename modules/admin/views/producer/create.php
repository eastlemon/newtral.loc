<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Producer */

$this->title = Yii::t('app', 'Create Producer');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Producers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="producer-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
