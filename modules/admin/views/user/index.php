<?php
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii2mod\user\models\enums\UserStatus;

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <p><?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-success']); ?></p>
    
    <?php Pjax::begin(['timeout' => 10000]); ?>
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
                    'contentOptions' => ['style' => 'width:67px; text-align:center;'],
                ],
            ],
        ]) ?>
    <?php Pjax::end(); ?>

</div>
