<?php
use yii\helpers\Html;
use yii\helpers\Url;

$url = Url::to(['/test/part', 'id' => $model->id]);
?>

<?= Html::a($model->name, $url, ['class' => 'btn btn-link', 'title' => $model->name]) ?>