<?php

use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserModel */

$this->title = Yii::t('app', 'Create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
