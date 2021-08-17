<?php
use yii\widgets\ListView;
?>

<?= ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_m_p_item',
]) ?>