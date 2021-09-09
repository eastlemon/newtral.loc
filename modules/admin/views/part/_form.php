<?php

use yii\bootstrap4\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use dosamigos\ckeditor\CKEditor;

?>

<div class="part-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'articul')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->widget(CKEditor::className(), ['preset' => 'basic']) ?>

    <?= $form->field($model, 'producer_id')->widget(Select2::classname(), [
        'data' => $data,
        'options' => [
            'placeholder' => Yii::t('app', 'Select...'),
        ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'picture')->fileInput(['class' => 'form-control-file']) ?>

    <div class="row">
        <div class="col-md-6"><?= $form->field($modelOffer, 'amount')->textInput() ?></div>
        <div class="col-md-6"><?= $form->field($modelOffer, 'price')->textInput() ?></div>
    </div>
    
    <?= $form->field($modelOffer, 'store_id')->widget(Select2::classname(), [
        'data' => $dataStores,
        'options' => [
            'placeholder' => Yii::t('app', 'Select...'),
        ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>
    
    <?= $form->field($model, 'certificate_ids')->widget(Select2::classname(), [
        'data' => $dataCertificates,
        'options' => [
            'placeholder' => Yii::t('app', 'Select...'),
            'multiple' => true,
            'value' => $selectedCertificates,
        ],
        'pluginOptions' => [
            'allowClear' => true,
            'tags' => true,
        ],
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
