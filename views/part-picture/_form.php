<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PartPicture */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="part-picture-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'picture')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'part_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
