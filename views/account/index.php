<?php
    use yii\bootstrap4\ActiveForm;
    use yii\bootstrap4\Html;
    use yii\widgets\DetailView;
    use yii\grid\GridView;

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
                        <div class="form-group mb-0">
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
                        'model' => $identity,
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
    <div class="row pt-3 pb-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <?= Yii::t('app', 'Favorites') ?>
                </div>
                <div class="card-body">
                    <?= GridView::widget([
                        'dataProvider' => $favoritesProvider,
                        'columns' => [
                            [
                                'class' => 'yii\grid\SerialColumn',
                                'contentOptions' => ['style' => 'width:1px;'],
                            ],
                            'name:ntext',
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'template' => '{delete}',
                                'contentOptions' => ['style' => 'width:1px; text-align:center; white-space: nowrap;'],
                            ],
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <?= Yii::t('app', 'Trailers') . '&nbsp;&nbsp;' . Html::a('<i class="fas fa-plus-square"></i>&nbsp;' . Yii::t('app', 'Append'), ['append-trailer']) ?>
                </div>
                <div class="card-body">
                    <?= GridView::widget([
                        'dataProvider' => $trailersProvider,
                        'columns' => [
                            [
                                'class' => 'yii\grid\SerialColumn',
                                'contentOptions' => ['style' => 'width:1px;'],
                            ],
                            'name:ntext',
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'template' => '{delete}',
                                'contentOptions' => ['style' => 'width:1px; text-align:center; white-space: nowrap;'],
                            ],
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>