<?php
use yii\bootstrap4\Html;

$this->title = Yii::t('yii2mod.cms', 'Create Page');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cms-model-create">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
