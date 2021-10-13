<?php
    use yii\bootstrap4\Html;

    $this->title = $producer->name;
    //$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Parts'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;

    //\yii\web\YiiAsset::register($this);
?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1><?= $producer->name ?></h1>
            <?php foreach($producer->trailers as $trailer): ?>
                <h2><?= $trailer->name ?></h2>
                <h2><?= $trailer->chassis->name ?></h2>
                <p><?= $trailer->type->name ?></p>
                <p><?= $trailer->mode->name ?></p>
                <p><?= $trailer->axis->name ?></p>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="trailer-scheme">
                <div class="trailer-image">
                    <?= Html::img('@web/' . $trailer->image, ['class' => 'img-fluid']) ?>
                    <?php if ($markup = json_decode($trailer->markup)): ?>
                        <?php foreach ($markup as $markup_row): ?>
                            <?php if ($markup_row->point): ?>
                                <div class="trailer-image-dot _number<?= $markup_row->number ?>" style="left: <?= $markup_row->point->left ?>px; top: <?= $markup_row->point->top ?>px;" data-number="<?= $markup_row->number ?>"><?= $markup_row->number ?></div>
                            <?php endif; ?>
                            <?php if ($markup_row->horizontal): ?>
                                <div class="trailer-image-line _number<?= $markup_row->number ?>" style="top: <?= $markup_row->horizontal->top ?>px; left: <?= $markup_row->horizontal->left ?>px; width: <?= $markup_row->horizontal->width ?>px;" data-number="<?= $markup_row->number ?>"></div>
                            <?php endif; ?>
                            <?php if ($markup_row->vertical): ?>
                                <div class="trailer-image-line _vertical _number<?= $markup_row->number ?>" style="top: <?= $markup_row->vertical->top ?>px; left: <?= $markup_row->vertical->left ?>px; height: <?= $markup_row->vertical->height ?>px;" data-number="<?= $markup_row->number ?>"></div>
                            <?php endif; ?>
                            <?php if ($markup_row->verticalBending): ?>
                                <div class="trailer-image-line _vertical _bending _number<?= $markup_row->number ?>" style="top: <?= $markup_row->verticalBending->top ?>px; left: <?= $markup_row->verticalBending->left ?>px; height: <?= $markup_row->verticalBending->height ?>px;" data-number="<?= $markup_row->number ?>"></div>
                            <?php endif; ?>
                            <?php if ($markup_row->horizontalBending): ?>
                                <div class="trailer-image-line _bending _number<?= $markup_row->number ?>" style="top: <?= $markup_row->horizontalBending->top ?>px; left: <?= $markup_row->horizontalBending->left ?>px; width: <?= $markup_row->horizontalBending->width ?>px;" data-number="<?= $markup_row->number ?>"></div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div class="trailer-content trailer-rigth-panel">
                    <div class="trailer-content-item">
                        <a href="#">
                            <div class="trailer-content-item-number _number7">7</div>
                            <div class="trailer-content-item-image" style="background-image: url('/uploads/noImage.png.200x82.png');"></div>
                            <div class="trailer-content-item-text">Седельно-Сцепные Устройства</div>
                        </a>
                    </div>
                    <div class="trailer-content-item">
                        <a href="#">
                            <div class="trailer-content-item-number _number6">6</div>
                            <div class="trailer-content-item-image" style="background-image: url('/uploads/noImage.png.200x82.png');"></div>
                            <div class="trailer-content-item-text">Опорное устройство</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="trailer-content pt-4 pb-4">
            <div class="col trailer-content-item">
                <a href="#">
                    <div class="trailer-content-item-number _number1">1</div>
                    <div class="trailer-content-item-image" style="background-image: url('/uploads/noImage.png.200x82.png');"></div>
                    <div class="trailer-content-item-text">Трапы</div>
                </a>
            </div>
            <div class="col trailer-content-item">
                <a href="#">
                    <div class="trailer-content-item-number _number2">2</div>
                    <div class="trailer-content-item-image" style="background-image: url('/uploads/noImage.png.200x82.png');"></div>
                    <div class="trailer-content-item-text">Оси</div>
                </a>
            </div>
            <div class="col trailer-content-item">
                <a href="#">
                    <div class="trailer-content-item-number _number3">3</div>
                    <div class="trailer-content-item-image" style="background-image: url('/uploads/noImage.png.200x82.png');"></div>
                    <div class="trailer-content-item-text">Подвеска</div>
                </a>
            </div>
            <div class="col trailer-content-item">
                <a href="#">
                    <div class="trailer-content-item-number _number4">4</div>
                    <div class="trailer-content-item-image" style="background-image: url('/uploads/noImage.png.200x82.png');"></div>
                    <div class="trailer-content-item-text">Шины с диском</div>
                </a>
            </div>
            <div class="col trailer-content-item">
                <a href="#">
                    <div class="trailer-content-item-number _number5">5</div>
                    <div class="trailer-content-item-image" style="background-image: url('/uploads/noImage.png.200x82.png');"></div>
                    <div class="trailer-content-item-text">Шкворень</div>
                </a>
            </div>
        </div>
    </div>
</div>