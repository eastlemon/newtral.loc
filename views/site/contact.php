<?php
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\bootstrap4\Html;
use yii\helpers\ArrayHelper;
use yii2mod\comments\widgets\Comment;

$this->title = $cmsModel->meta_title;
$this->registerMetaTag(['name' => 'keywords', 'content' => $cmsModel->meta_keywords]);
$this->registerMetaTag(['name' => 'description', 'content' => $cmsModel->meta_description]);
$this->params['breadcrumbs'][] = $cmsModel->title;
?>

<div class="container">
    <div class="site-contact">
        <h1 class="page-title">
            <?= $cmsModel->title ?>
        </h1>
        <div class="page-content">
            <?= $cmsModel->getContent() ?>
        </div>
        <p><?= Yii::t('app', 'If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.') ?></p>
        <div class="row">
            <div class="col-lg-5">
                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                <?= $form->field($model, 'name') ?>
                <?= $form->field($model, 'email') ?>
                <?= $form->field($model, 'subject') ?>
                <?= $form->field($model, 'body')->widget(Widget::className(), [
                    'settings' => [
                        'minHeight' => 200,
                        'plugins' => [
                            'fullscreen',
                        ],
                    ],
                ]) ?>
                <?= $form->field($model, 'verifyCode')->widget(Captcha::class, [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>
                <div class="form-group">
                    <?php echo Html::submitButton(Yii::t('contact', 'Submit'), ['class' => 'btn btn-primary', 'name' => 'contact-button']); ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
        <?php if ($cmsModel->comment_available): ?>
            <div class="page-comments">
                <?= Comment::widget(ArrayHelper::merge([
                        'model' => $cmsModel,
                        'relatedTo' => 'cms page: ' . $cmsModel->url,
                    ],
                    $commentWidgetParams
                )) ?>
            </div>
        <?php endif; ?>
    </div>
</div>