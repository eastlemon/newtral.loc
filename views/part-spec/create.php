<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PartSpec */

$this->title = Yii::t('app', 'Create Part Spec');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Part Specs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="part-spec-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
