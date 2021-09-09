<?php
    $this->title = Yii::t('app', 'Create');
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Parts'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class="part-create">
    <?= $this->render('_form', [
        'model' => $model,
        'modelOffer' => $modelOffer,
        'data' => $data,
        'dataStores' => $dataStores,
        'dataCertificates' => $dataCertificates,
    ]) ?>
</div>
