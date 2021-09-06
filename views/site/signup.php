<?php
use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = Yii::t('yii2mod.user', 'Signup');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
    <div class="site-signup">
        <h1><?php echo Html::encode($this->title) ?></h1>

        <p><?php echo Yii::t('yii2mod.user', 'Please fill out the following fields to signup:'); ?></p>

        <div class="row">
            <div class="col-lg-5">
                <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                <?= $form->field($model, 'username') ?>
                <?= $form->field($model, 'email') ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <div class="form-group">
                    <?php echo Html::submitButton(Yii::t('yii2mod.user', 'Signup'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>