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
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <?= $form->field($cmodel, 'c1')->widget(Select2::classname(), [
                        'data' => $categories,
                        'options' => [
                            'placeholder' => Yii::t('app', 'Select...'),
                        ],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ])->label('1') ?>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <?= $form->field($cmodel, 'c2')->widget(Select2::classname(), [
                        'data' => $categories,
                        'options' => [
                            'placeholder' => Yii::t('app', 'Select...'),
                        ],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ])->label('2') ?>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <?= $form->field($cmodel, 'c3')->widget(Select2::classname(), [
                        'data' => $categories,
                        'options' => [
                            'placeholder' => Yii::t('app', 'Select...'),
                        ],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ])->label('3') ?>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <?= $form->field($cmodel, 'c4')->widget(Select2::classname(), [
                        'data' => $categories,
                        'options' => [
                            'placeholder' => Yii::t('app', 'Select...'),
                        ],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ])->label('4') ?>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <?= $form->field($cmodel, 'c5')->widget(Select2::classname(), [
                        'data' => $categories,
                        'options' => [
                            'placeholder' => Yii::t('app', 'Select...'),
                        ],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ])->label('5') ?>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <?= $form->field($cmodel, 'c6')->widget(Select2::classname(), [
                        'data' => $categories,
                        'options' => [
                            'placeholder' => Yii::t('app', 'Select...'),
                        ],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ])->label('6') ?>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <?= $form->field($cmodel, 'c7')->widget(Select2::classname(), [
                        'data' => $categories,
                        'options' => [
                            'placeholder' => Yii::t('app', 'Select...'),
                        ],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ])->label('7') ?>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>
<?php ActiveForm::end(); ?>