<?php
use yii\widgets\ListView;
?>

<?= ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_m_item',
]) ?>