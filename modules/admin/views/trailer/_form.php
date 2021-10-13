<?php
    use yii\bootstrap4\Html;
    use yii\widgets\ActiveForm;
    use kartik\select2\Select2;
?>

<?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'file')->fileInput(['class' => 'form-control-file']) ?>
    <?= $form->field($model, 'producer_id')->widget(Select2::classname(), [
        'data' => $producers,
        'options' => [
            'placeholder' => Yii::t('app', 'Select...'),
        ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>
    <?= $form->field($model, 'type_id')->widget(Select2::classname(), [
        'data' => $types,
        'options' => [
            'placeholder' => Yii::t('app', 'Select...'),
        ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>
    <?= $form->field($model, 'mode_id')->widget(Select2::classname(), [
        'data' => $modes,
        'options' => [
            'placeholder' => Yii::t('app', 'Select...'),
        ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>
    <?= $form->field($model, 'axis_id')->widget(Select2::classname(), [
        'data' => $axes,
        'options' => [
            'placeholder' => Yii::t('app', 'Select...'),
        ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>
    <?= $form->field($model, 'chassis_id')->widget(Select2::classname(), [
        'data' => $chassis,
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