<?php
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

$this->title = Yii::t('app', 'Pages');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cms-model-index">
    <p>
        <?= Html::a(Yii::t('yii2mod.cms', 'Create Page'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('yii2mod.cms', 'View Comments'), ['/comment/manage/index'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(['timeout' => 5000]); ?>
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
                'status',
                'comment_available',
                [
                    'attribute' => 'created_at',
                    'format' => ['date', 'full'],
                ],

                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view}&nbsp;{update}&nbsp;{delete}',
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
                    'contentOptions' => ['style' => 'width:67px; text-align:center;'],
                ],
            ],
        ]) ?>
    <?php Pjax::end(); ?>
</div>
