<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UnitNode */

$this->title = Yii::t('app', 'Create Unit Node');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Unit Nodes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unit-node-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
