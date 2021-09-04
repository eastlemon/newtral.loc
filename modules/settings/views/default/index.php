<?php
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\bootstrap4\Html;
use yii2mod\settings\models\enumerables\SettingType;
use yii2mod\settings\models\SettingModel;

$this->title = Yii::t('yii2mod.settings', 'Settings');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="setting-index">
    <p><?= Html::a(Yii::t('yii2mod.settings', 'Create'), ['create'], ['class' => 'btn btn-success']) ?></p>
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
            'description:ntext',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}{delete}',
            ],
        ],
    ]) ?>
</div>