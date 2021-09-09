<?php

use yii\bootstrap4\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use dosamigos\ckeditor\CKEditor;
?>

<div class="container">
    <div class="node-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'articul')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'description')->widget(CKEditor::className(), ['preset' => 'basic']) ?>

        <?= $form->field($model, 'category_id')->widget(Select2::classname(), [
            'data' => $data,
            'options' => [
                'placeholder' => Yii::t('app', 'Select...'),
            ],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]) ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
