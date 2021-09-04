<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use vova07\imperavi\Widget;

/* @var $this yii\web\View */
/* @var $model app\models\Store */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="store-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->widget(Widget::className(), [
        'settings' => [
            'minHeight' => 200,
            'plugins' => [
                'fullscreen',
            ],
        ],
    ]) ?>
    
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

</div>
