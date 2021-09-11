<?php
    use yii\bootstrap4\Html;
    use yii\widgets\ActiveForm;
    use kartik\select2\Select2;
?>

<?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'picture')->fileInput(['class' => 'form-control-file']) ?>
    <?= $form->field($model, 'parent_id')->widget(Select2::classname(), [
        'data' => $data,
        'options' => [
            'placeholder' => Yii::t('app', 'Select...'),
        ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>
    <?= $form->field($model, 'is_popular')->radioList([1 => 'Да', 0 => 'Нет']) ?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>
<?php ActiveForm::end(); ?>