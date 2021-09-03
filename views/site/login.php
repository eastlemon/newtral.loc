<?php
use yii\helpers\Url;
use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = Yii::t('yii2mod.user', 'Login');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="static-page">
    <div class="row">
        <div class="col-sm-6">
            <div class="mb-5">
                <h2>New Customer</h2>
                <p><strong>Register Account</strong></p>
                <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
                <a href="<?= Html::encode(Url::to(['/site/signup'])) ?>" class="btn btn-primary">Continue</a>
            </div>
            <div class="mb-5">
                <h2>Social Login</h2>
                <?= yii\authclient\widgets\AuthChoice::widget([
                    'baseAuthUrl' => ['network/auth']
                ]) ?>
            </div>
        </div>
        <div class="col-sm-6">
            <h2>Returning Customer</h2>
            <p><strong>I am a returning customer</strong></p>
            <p><?= Yii::t('yii2mod.user', 'Please fill out the following fields to login:') ?></p>
            <?php $form = ActiveForm::begin(['id' => 'login-form']) ?>
                <?= $form->field($model, 'email')->textInput() ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
                <div style="color:#999;margin:1em 0"><?= Html::a(Yii::t('yii2mod.user', 'Forgot your password?'), ['site/request-password-reset']) ?></div>
                <?= Html::submitButton(Yii::t('yii2mod.user', 'Login'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>