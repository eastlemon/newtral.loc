<?php
use yii\helpers\Html;
use yii\helpers\Url;

$url = Url::to(['/test/parts-by-manufacturer', 'id' => $model->id]);
?>

<?= Html::a($model->name, $url, ['class' => 'btn btn-link', 'title' => $model->name]) ?>