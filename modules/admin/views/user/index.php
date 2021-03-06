<?php
    use yii\grid\GridView;
    use yii\bootstrap4\Html;

    $this->title = Yii::t('app', 'Users');
    $this->params['breadcrumbs'][] = $this->title;
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Create'), 'url' => ['/admin/user/create']];
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
            'username',
            'email:email',
            'status',
            [
                'attribute' => 'created_at',
                'format' => 'date',
                'filter' => false,
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{switch} {update} {delete}',
                'buttons' => [
                    'switch' => function ($url, $model) {
                        $options = [
                            'title' => Yii::t('app', 'Become this user'),
                            'aria-label' => Yii::t('app', 'Become this user'),
                            'data-pjax' => '0',
                            'data-confirm' => Yii::t('app', 'Are you sure you want to switch to this user for the rest of this Session?'),
                            'data-method' => 'POST',
                        ];

                        $url = ['switch', 'id' => $model->id];
                        $icon = '<span class="glyphicon glyphicon-user"></span>';

                        return Html::a($icon, $url, $options);
                    },
                ],
                'contentOptions' => ['style' => 'width:1px; text-align:center; white-space: nowrap;'],
            ],
        ],
    ]) ?>
</div>
