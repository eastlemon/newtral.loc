<?php
    //use yii\bootstrap4\Html;

    $this->title = '?';
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
    <div class="row">
        <div class="col">
            <?php foreach($semitrailer_model as $sm): ?>
                <p><?= $sm->oldSemitrailerManufacturer->name ?></p>
            <?php endforeach; ?>
        </div>
    </div>
</div>