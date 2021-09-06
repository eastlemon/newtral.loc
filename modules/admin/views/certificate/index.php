<?php
use yii\bootstrap4\Html;
use yii\grid\GridView;

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
            'name:ntext',
            'file:ntext',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{download}&nbsp;{view}&nbsp;{update}&nbsp;{delete}',
                'buttons' => [
                    'download' => function ($url, $model) {
                        $icon = '<i class="fas fa-download"></i>';
                        $url = ['download', 'id' => $model->id];
                        return Html::a($icon, $url);
                    },
                ],
                'contentOptions' => ['style' => 'width:100px; text-align:center;'],
            ],
        ],
    ]) ?>
</div>