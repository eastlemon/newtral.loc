<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NodePart */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="node-part-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'node_id')->textInput() ?>

    <?= $form->field($model, 'part_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
