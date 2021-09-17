<?php
    use yii\bootstrap4\ActiveForm;
    use yii\bootstrap4\Html;
    use yii\widgets\DetailView;

    $this->title = Yii::t('app', 'Account');
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <?= Yii::t('app', 'Change Password') ?>
                </div>
                <div class="card-body">
                    <?php $form = ActiveForm::begin(['id' => 'change-password-form']); ?>
                        <?= $form->field($resetPasswordForm, 'password')->passwordInput() ?>
                        <?= $form->field($resetPasswordForm, 'confirmPassword')->passwordInput() ?>
                        <div class="form-group">
                            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
                            <?= Html::resetButton(Yii::t('app', 'Cancel'), ['class' => 'btn btn-link']) ?>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <?= Yii::t('app', 'Personal Information') ?>
                </div>
                <div class="card-body">
                    <?= DetailView::widget([
                        'model' => Yii::$app->user->identity,
                        'attributes' => [
                            'username',
                            'email',
                            'last_login:date',
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>