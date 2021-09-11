<?php
    use yii\bootstrap4\Html;
    use yii\widgets\ActiveForm;
    use kartik\select2\Select2;
    use dosamigos\ckeditor\CKEditor;
?>

<?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'header')->widget(CKEditor::className(), [
        'preset' => 'custom',
        'clientOptions' => [
            'toolbarGroups' => [
                ['name' => 'document', 'groups' => ['mode', 'document', 'doctools' ]],
                ['name' => 'clipboard', 'groups' => ['clipboard', 'undo' ]],
                ['name' => 'editing', 'groups' => ['find', 'selection', 'spellchecker' ]],
                '/',
                ['name' => 'basicstyles', 'groups' => ['basicstyles', 'cleanup' ]],
                ['name' => 'paragraph', 'groups' => ['list', 'indent', 'blocks', 'align', 'bidi' ]],
                ['name' => 'links'],
                ['name' => 'insert'],
                '/',
                ['name' => 'styles'],
                ['name' => 'colors'],
                ['name' => 'tools'],
                ['name' => 'others']
            ],
        ],
    ]) ?>
    <?= $form->field($model, 'content')->widget(CKEditor::className(), [
        'preset' => 'custom',
        'clientOptions' => [
            'toolbarGroups' => [
                ['name' => 'document', 'groups' => ['mode', 'document', 'doctools' ]],
                ['name' => 'clipboard', 'groups' => ['clipboard', 'undo' ]],
                ['name' => 'editing', 'groups' => ['find', 'selection', 'spellchecker' ]],
                '/',
                ['name' => 'basicstyles', 'groups' => ['basicstyles', 'cleanup' ]],
                ['name' => 'paragraph', 'groups' => ['list', 'indent', 'blocks', 'align', 'bidi' ]],
                ['name' => 'links'],
                ['name' => 'insert'],
                '/',
                ['name' => 'styles'],
                ['name' => 'colors'],
                ['name' => 'tools'],
                ['name' => 'others']
            ],
        ],
    ]) ?>
    <?= $form->field($model, 'position')->widget(Select2::classname(), [
        'data' => $positions,
        'options' => [
            'placeholder' => Yii::t('app', 'Select...'),
        ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>
    <?= $form->field($model, 'picture')->fileInput(['class' => 'form-control-file']) ?>
    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>
<?php ActiveForm::end(); ?>