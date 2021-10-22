<?php
    use yii\bootstrap4\Html;

    $this->title = $trailer->name;
    $this->params['breadcrumbs'][] = ['label' => $trailer->producer->name, 'url' => ['producer', 'slug' => $trailer->producer->slug]];
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
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
                    <?php for ($i = 6; $i <= 7; $i++): ?>
                        <?php if ($item = $trailer->trailerCategories[$i-1]): ?>
                            <div class="trailer-content-item">
                                <a href="#">
                                    <div class="trailer-content-item-number _number<?= $i ?>"><?= $i ?></div>
                                    <div class="trailer-content-item-image" style="background-image: url('/<?= $item->category->picture ?>');"></div>
                                    <div class="trailer-content-item-text"><?= $item->category->name ?></div>
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="trailer-content pt-4 pb-4">
            <?php for ($i = 1; $i <= 5; $i++): ?>
                <?php if ($item = $trailer->trailerCategories[$i-1]): ?>
                    <div class="col trailer-content-item">
                        <a href="#">
                            <div class="trailer-content-item-number _number<?= $i ?>"><?= $i ?></div>
                            <div class="trailer-content-item-image" style="background-image: url('/<?= $item->category->picture ?>');"></div>
                            <div class="trailer-content-item-text"><?= $item->category->name ?></div>
                        </a>
                    </div>
                <?php endif; ?>
            <?php endfor; ?>
        </div>
    </div>
</div>