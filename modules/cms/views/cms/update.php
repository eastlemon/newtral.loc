<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model yii2mod\cms\models\CmsModel */

$this->title = Yii::t('yii2mod.cms', 'Update Page: {0}', $model->title);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('yii2mod.cms', 'Update');
?>
<div class="cms-model-update">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render('_form', [
        'model' => $model,
    ]); ?>

</div>