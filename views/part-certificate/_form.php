<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PartCertificate */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="part-certificate-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'part_id')->textInput() ?>

    <?= $form->field($model, 'certificate_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
