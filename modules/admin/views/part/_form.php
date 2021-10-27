<?php
    use yii\bootstrap4\Html;
    use yii\widgets\ActiveForm;
    use kartik\select2\Select2;
    use dosamigos\ckeditor\CKEditor;
?>

<?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6"><?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?></div>
        <div class="col-md-6">
            <?= $form->field($model, 'original_id')->widget(Select2::classname(), [
                'data' => $dataParts,
                'options' => [
                    'placeholder' => Yii::t('app', 'Select...'),
                ],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(Yii::t('app', 'Original Articul')) ?>
        </div>
    </div>
    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'articul')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'description')->widget(CKEditor::className(), [
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
    <?= $form->field($model, 'producer_id')->widget(Select2::classname(), [
        'data' => $data,
        'options' => [
            'placeholder' => Yii::t('app', 'Select...'),
        ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>
    <?= $form->field($model, 'file')->fileInput(['class' => 'form-control-file'])->label(Yii::t('app', 'Picture')) ?>
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