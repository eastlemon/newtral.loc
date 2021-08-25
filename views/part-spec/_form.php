<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PartSpec */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="part-spec-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'param')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'value')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'part_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
