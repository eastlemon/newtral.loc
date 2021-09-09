<?php
    $this->title = Yii::t('app', 'Update');
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Parts'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class="part-update">
    <?= $this->render('_form', [
        'model' => $model,
        'modelOffer' => $modelOffer,
        'data' => $data,
        'dataStores' => $dataStores,
        'dataCertificates' => $dataCertificates,
        'selectedCertificates' => $selectedCertificates,
    ]) ?>
</div>
