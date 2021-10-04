<?php
    use yii\helpers\ArrayHelper;
    use yii2mod\comments\widgets\Comment;

    $this->title = $model->meta_title;
    $this->registerMetaTag(['name' => 'keywords', 'content' => $model->meta_keywords]);
    $this->registerMetaTag(['name' => 'description', 'content' => $model->meta_description]);
    $this->params['breadcrumbs'][] = $model->title;
?>

<div class="container">
    <div class="page-wrapper">
        <h1 class="page-title">
            <?= $model->title ?>
        </h1>
        <div class="page-content">
            <?= $model->getContent() ?>
        </div>
        <?php if ($model->comment_available): ?>
            <div class="page-comments">
                <?= Comment::widget(ArrayHelper::merge([
                        'model' => $model,
                        'relatedTo' => 'cms page: ' . $model->url,
                    ],
                    $commentWidgetParams
                )) ?>
            </div>
        <?php endif; ?>
    </div>
</div>
