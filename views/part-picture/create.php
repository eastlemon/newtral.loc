<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PartPicture */

$this->title = Yii::t('app', 'Create Part Picture');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Part Pictures'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="part-picture-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
