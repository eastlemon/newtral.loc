<?php
    use yii\bootstrap4\Html;
    use yii\widgets\ActiveForm;
    use yii2mod\user\models\enums\UserStatus;
?>

<div class="container">
    <div class="user-form">
        <?php $form = ActiveForm::begin(['id' => 'create-user-form']); ?>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'username')->textInput(['maxlength' => 255]) ?>

                <?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>

                <?= $form->field($model, 'status')->dropDownList(UserStatus::listData()) ?>

                <?= $form->field($model, 'plainPassword')->passwordInput(['autocomplete' => 'off']) ?>
            </div>
        </div>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
