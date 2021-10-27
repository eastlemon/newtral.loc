<?php
    use yii\grid\GridView;
    use yii\bootstrap4\Html;
    use yii\helpers\Url;

    $this->title = Yii::t('app', 'Pages');
    $this->params['breadcrumbs'][] = $this->title;
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Create'), 'url' => ['/admin/cms/manage/create']];
?>

<div class="container-fluid">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'contentOptions' => ['style' => 'width:1px;'],
            ],
            'url',
            'title',
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    return $model->status ? 'Вкл.' : 'Выкл.';
                }
            ],
            [
                'attribute' => 'comment_available',
                'value' => function ($model) {
                    return $model->comment_available ? 'Вкл.' : 'Выкл.';
                }
            ],
            'created_at:date',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a(
                            '<span class="glyphicon glyphicon-eye-open"></span>',
                            Url::to($model->url, true),
                            [
                                'title' => Yii::t('yii2mod.cms', 'View'),
                                'data-pjax' => 0,
                                'target' => '_blank',
                            ]
                        );
                    },
                ],
                'contentOptions' => ['style' => 'width:1px; text-align:center; white-space: nowrap;'],
            ],
        ],
    ]) ?>
</div>
