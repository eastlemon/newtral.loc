<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UnitNode */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="unit-node-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'unit_id')->textInput() ?>

    <?= $form->field($model, 'node_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
