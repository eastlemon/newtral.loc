<?php
    use yii\bootstrap4\Html;
    use yii\widgets\ActiveForm;
    use dosamigos\ckeditor\CKEditor;
?>

<?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'block5Header')->widget(CKEditor::className(), [
        'preset' => 'custom',
        'clientOptions' => [
            'toolbarGroups' => [
                ['name' => 'clipboard', 'groups' => ['clipboard', 'undo']],
                ['name' => 'editing', 'groups' => ['find', 'selection']],
                '/',
                ['name' => 'basicstyles', 'groups' => ['basicstyles', 'cleanup']],
                ['name' => 'paragraph', 'groups' => ['list', 'indent', 'blocks', 'align', 'bidi']],
                '/',
                ['name' => 'styles'],
                ['name' => 'colors'],
                ['name' => 'tools'],
                ['name' => 'others']
            ],
        ],
    ]) ?>
    <?= $form->field($model, 'block5Content')->widget(CKEditor::className(), [
        'preset' => 'custom',
        'clientOptions' => [
            'toolbarGroups' => [
                ['name' => 'clipboard', 'groups' => ['clipboard', 'undo']],
                ['name' => 'editing', 'groups' => ['find', 'selection']],
                '/',
                ['name' => 'basicstyles', 'groups' => ['basicstyles', 'cleanup']],
                ['name' => 'paragraph', 'groups' => ['list', 'indent', 'blocks', 'align', 'bidi']],
                '/',
                ['name' => 'styles'],
                ['name' => 'colors'],
                ['name' => 'tools'],
                ['name' => 'others']
            ],
        ],
    ]) ?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>
<?php ActiveForm::end(); ?>