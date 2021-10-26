<?php
    use yii\grid\GridView;
    use yii\helpers\ArrayHelper;
    use yii\bootstrap4\Html;
    use yii2mod\settings\models\enumerables\SettingType;
    use yii2mod\settings\models\SettingModel;

    $this->title = Yii::t('yii2mod.settings', 'Settings');
    $this->params['breadcrumbs'][] = $this->title;
    $this->params['breadcrumbs'][] = ['label' => Yii::t('yii2mod.settings', 'Create'), 'url' => ['create']];
?>

<div class="container-fluid">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
            ],
            [
                'attribute' => 'type',
                'filter' => SettingType::listData(),
                'filterInputOptions' => ['prompt' => Yii::t('yii2mod.settings', 'Select Type'), 'class' => 'form-control'],
            ],
            [
                'attribute' => 'section',
                'filter' => ArrayHelper::map(SettingModel::find()->select('section')->distinct()->all(), 'section', 'section'),
                'filterInputOptions' => ['prompt' => Yii::t('yii2mod.settings', 'Select Section'), 'class' => 'form-control'],
            ],
            'key',
            'value:ntext',
            [
                'attribute' => 'description',
                'format' => 'raw',
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
                'contentOptions' => ['style' => 'width:1px; text-align:center; white-space: nowrap;'],
            ],
        ],
    ]) ?>
</div>