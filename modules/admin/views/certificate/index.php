<?php
    use yii\grid\GridView;
    use yii\bootstrap4\Html;

    $this->title = Yii::t('app', 'Certificates');
    $this->params['breadcrumbs'][] = $this->title;
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Create'), 'url' => ['/admin/certificate/create']];
?>

<div class="container-fluid">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'contentOptions' => ['style' => 'width:1px;'],
            ],
            'name:ntext',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{download} {view} {update} {delete}',
                'buttons' => [
                    'download' => function ($url, $model) {
                        $icon = '<i class="fas fa-download"></i>';
                        $url = ['download', 'id' => $model->id];
                        return Html::a($icon, $url);
                    },
                ],
                'contentOptions' => ['style' => 'width:1px; text-align:center; white-space: nowrap;'],
            ],
        ],
    ]) ?>
</div>