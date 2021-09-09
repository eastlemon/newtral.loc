<?php

use yii\bootstrap4\Html;
use yii\widgets\ActiveForm;
use yii2mod\settings\models\enumerables\SettingStatus;
use yii2mod\settings\models\enumerables\SettingType;

?>

<div class="setting-form">
    <?= $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'section')->textInput(['maxlength' => 255]) ?>
        <?= $form->field($model, 'key')->textInput(['maxlength' => 255]) ?>
        <?= $form->field($model, 'value')->textarea(['rows' => 5]) ?>
        <?= $form->field($model, 'description')->textarea(['rows' => 5]) ?>
        <?= $form->field($model, 'status')->dropDownList(SettingStatus::listData()) ?>
        <?= $form->field($model, 'type')->dropDownList(SettingType::listData()) ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('yii2mod.settings', 'Create') : Yii::t('yii2mod.settings', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('yii2mod.settings', 'Go Back'), ['index'], ['class' => 'btn btn-default']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>
