<?php

use yii\bootstrap4\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Certificates');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="certificate-index">

    <p><?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-success']) ?></p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'contentOptions' => ['style' => 'width:1px;'],
            ],

            //'id',
            'name:ntext',
            'file:ntext',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{download}&nbsp;{view}&nbsp;{update}&nbsp;{delete}',
                'buttons' => [
                    'download' => function ($url, $model) {
                        $options = [
                            'title' => Yii::t('app', 'Become this user'),
                            'aria-label' => Yii::t('app', 'Become this user'),
                            'data-pjax' => '0',
                            'data-confirm' => Yii::t('app', 'Are you sure?'),
                            'data-method' => 'POST',
                        ];

                        $url = ['download', 'id' => $model->id];
                        $icon = '<i class="fas fa-file-pdf"></i>';

                        return Html::a($icon, $url, $options);
                    },
                ],
                'contentOptions' => ['style' => 'width:95px; text-align:center;'],
            ],
        ],
    ]); ?>


</div>
