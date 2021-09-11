<?php
    use yii\bootstrap4\Html;
    use yii\widgets\ActiveForm;
    use kartik\select2\Select2;
    use dosamigos\ckeditor\CKEditor;
?>

<?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'address')->widget(CKEditor::className(), ['preset' => 'basic']) ?>
    <?= $form->field($model, 'delivery')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'office')->widget(Select2::classname(), [
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