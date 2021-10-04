<?php
    use yii\bootstrap4\ActiveForm;
    use yii\bootstrap4\Html;
    use yii\helpers\ArrayHelper;
    use yii2mod\comments\widgets\Comment;
    use dosamigos\ckeditor\CKEditor;

    $this->title = $cmsModel->meta_title;
    $this->registerMetaTag(['name' => 'keywords', 'content' => $cmsModel->meta_keywords]);
    $this->registerMetaTag(['name' => 'description', 'content' => $cmsModel->meta_description]);
    $this->params['breadcrumbs'][] = $cmsModel->title;
?>

<div class="container">
    <h1 class="page-title">
        <?= $cmsModel->title ?>
    </h1>
    <div class="row">
        <div class="col-6">
            <div class="page-content">
                <?= $cmsModel->getContent() ?>
            </div>
        </div>
        <div class="col-6">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                <?= $form->field($model, 'name')->textInput(['placeholder' => $model->getAttributeLabel('name')])->label(false) ?>
                <?= $form->field($model, 'email')->textInput(['placeholder' => $model->getAttributeLabel('email')])->label(false) ?>
                <?= $form->field($model, 'subject')->textInput(['placeholder' => $model->getAttributeLabel('subject')])->label(false) ?>
                <?= $form->field($model, 'body')->widget(CKEditor::className(), [
                    'preset' => 'custom',
                    'clientOptions' => [
                        'toolbarGroups' => [
                            ['name' => 'basicstyles', 'groups' => ['basicstyles', 'cleanup']],
                            ['name' => 'paragraph', 'groups' => ['list', 'indent', 'blocks', 'align', 'bidi']],
                        ],
                    ],
                ])->label(false) ?>
                <div class="form-group">
                    <?= Html::submitButton(Yii::t('contact', 'Submit'), ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<?= \kl83\ymaps\MapWidget::widget([
    'mapState' => [
        'center' => $coordinates,
        'zoom' => 17,
    ],
    'placemarks' => [
        [
            $coordinates,
            [], // properties
            [], // options
        ],
        [
            $coordinates,
        ],
    ],
]) ?>
<div class="container">
    <?php if ($cmsModel->comment_available): ?>
        <div class="row">
            <div class="col">
                <div class="page-comments">
                    <?= Comment::widget(ArrayHelper::merge([
                            'model' => $cmsModel,
                            'relatedTo' => 'cms page: ' . $cmsModel->url,
                        ],
                        $commentWidgetParams,
                    )) ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
