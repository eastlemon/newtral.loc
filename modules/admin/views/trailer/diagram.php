<?php
    use yii\bootstrap4\Html;
    use yii\widgets\DetailView;

    $this->title = Yii::t('app', 'Diagram');
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Trailers'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
    $this->params['breadcrumbs'][] = $this->title;
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Save'), 'url' => '#', 'id' => 'save'];
    
    \app\assets\DiagramAsset::register($this);
?>

<input type="hidden" id="trailer-id" value="<?= $model->id ?>">

<div class="container">
    <div class="row">
        <div class="col">
            <div class="trailer-scheme">
                <div class="trailer-image" id="trailer-image">
                    <?= Html::img('@web/' . $model->image) ?>
                    <?php if ($markup = json_decode($model->markup)): ?>
                        <?php foreach ($markup as $markup_row): ?>
                            <?php if ($markup_row->point): ?>
                                <div data-number="<?= $markup_row->number ?>" id="trailer-image-dot_number<?= $markup_row->number ?>" class="trailer-image-dot _number<?= $markup_row->number ?>" style="left: <?= $markup_row->point->left ?>px; top: <?= $markup_row->point->top ?>px;" data-number="<?= $markup_row->number ?>"><?= $markup_row->number ?></div>
                            <?php endif; ?>
                            <?php if ($markup_row->bendingPoint): ?>
                                <div id="trailer-image-bendingPoint_number<?= $markup_row->number ?>" class="trailer-image-bendingPoint _number<?= $markup_row->number ?>" style="top: <?= $markup_row->bendingPoint->top ?>px; left: <?= $markup_row->bendingPoint->left ?>px;" data-number="<?= $markup_row->number ?>"></div>
                            <?php endif; ?>
                            <?php if ($markup_row->horizontal): ?>
                                <div id="trailer-image-line_number<?= $markup_row->number ?>" class="trailer-image-line _number<?= $markup_row->number ?>" style="top: <?= $markup_row->horizontal->top ?>px; left: <?= $markup_row->horizontal->left ?>px; width: <?= $markup_row->horizontal->width ?>px;" data-number="<?= $markup_row->number ?>"></div>
                            <?php endif; ?>
                            <?php if ($markup_row->vertical): ?>
                                <div id="trailer-image-line_vertical_number<?= $markup_row->number ?>" class="trailer-image-line _vertical _number<?= $markup_row->number ?>" style="top: <?= $markup_row->vertical->top ?>px; left: <?= $markup_row->vertical->left ?>px; height: <?= $markup_row->vertical->height ?>px;" data-number="<?= $markup_row->number ?>"></div>
                            <?php endif; ?>
                            <?php if ($markup_row->verticalBending): ?>
                                <div id="trailer-image-line_vertical_bending_number<?= $markup_row->number ?>" class="trailer-image-line _vertical _bending _number<?= $markup_row->number ?>" style="top: <?= $markup_row->verticalBending->top ?>px; left: <?= $markup_row->verticalBending->left ?>px; height: <?= $markup_row->verticalBending->height ?>px;" data-number="<?= $markup_row->number ?>"></div>
                            <?php endif; ?>
                            <?php if ($markup_row->horizontalBending): ?>
                                <div id="trailer-image-line_bending_number<?= $markup_row->number ?>" class="trailer-image-line _bending _number<?= $markup_row->number ?>" style="top: <?= $markup_row->horizontalBending->top ?>px; left: <?= $markup_row->horizontalBending->left ?>px; width: <?= $markup_row->horizontalBending->width ?>px;" data-number="<?= $markup_row->number ?>"></div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div class="trailer-content trailer-rigth-panel">
                    <div class="trailer-content-item _withLines" id="trailer-content-item7" data-number="7">
                        <a href="#">
                            <div class="trailer-content-item-number _number7">7</div>
                            <div class="trailer-content-item-image" style="background-image: url('/uploads/noImage.png.200x82.png');"></div>
                            <div class="trailer-content-item-text">Седельно-Сцепные Устройства</div>
                        </a>
                    </div>
                    <div class="trailer-content-item _withLines" id="trailer-content-item6" data-number="6">
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
            <div class="col trailer-content-item _withLines" id="trailer-content-item1" data-number="1">
                <a href="#">
                    <div class="trailer-content-item-number _number1">1</div>
                    <div class="trailer-content-item-image" style="background-image: url('/uploads/noImage.png.200x82.png');"></div>
                    <div class="trailer-content-item-text">Трапы</div>
                </a>
            </div>
            <div class="col trailer-content-item _withLines" id="trailer-content-item2" data-number="2">
                <a href="#">
                    <div class="trailer-content-item-number _number2">2</div>
                    <div class="trailer-content-item-image" style="background-image: url('/uploads/noImage.png.200x82.png');"></div>
                    <div class="trailer-content-item-text">Оси</div>
                </a>
            </div>
            <div class="col trailer-content-item _withLines" id="trailer-content-item3" data-number="3">
                <a href="#">
                    <div class="trailer-content-item-number _number3">3</div>
                    <div class="trailer-content-item-image" style="background-image: url('/uploads/noImage.png.200x82.png');"></div>
                    <div class="trailer-content-item-text">Подвеска</div>
                </a>
            </div>
            <div class="col trailer-content-item _withLines" id="trailer-content-item4" data-number="4">
                <a href="#">
                    <div class="trailer-content-item-number _number4">4</div>
                    <div class="trailer-content-item-image" style="background-image: url('/uploads/noImage.png.200x82.png');"></div>
                    <div class="trailer-content-item-text">Шины с диском</div>
                </a>
            </div>
            <div class="col trailer-content-item _withLines" id="trailer-content-item5" data-number="5">
                <a href="#">
                    <div class="trailer-content-item-number _number5">5</div>
                    <div class="trailer-content-item-image" style="background-image: url('/uploads/noImage.png.200x82.png');"></div>
                    <div class="trailer-content-item-text">Шкворень</div>
                </a>
            </div>
        </div>
    </div>
</div>