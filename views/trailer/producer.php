<?php
    use yii\bootstrap4\Html;

    $this->title = $producer->name;
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1><?= $producer->name ?></h1>
            <?php foreach ($types as $type): ?>
                <?php foreach ($modes as $mode): ?>
                    <?php foreach ($axises as $axis): ?>
                        <?php foreach ($trailers as $trailer): ?>
                            <?php if ($trailer->axis_id == $axis->id && $trailer->mode_id == $mode->id && $trailer->type_id == $type->id): ?>
                                <p class="text-warning"><?= $axis->name ?>&nbsp;<?= $type->name ?></p>
                                <p class="text-success">&nbsp;<?= $mode->name ?></p>
                                <p>&nbsp;&nbsp;&nbsp;<?= Html::a($trailer->name, ['item', 'id' => $trailer->id]) ?></p>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>