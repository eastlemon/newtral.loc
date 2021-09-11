<?php
use yii\bootstrap4\Html;

$this->title = Yii::t('app', 'Front Page');
?>

<div id="mainCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <?php foreach ($slides as $slide): ?>
            <?php ++$_k; ?>
            <li data-target="#mainCarousel" data-slide-to="<?= $_k-1 ?>" class="<?= ($_k == 1) ? 'active' : ''?>"></li>
        <?php endforeach; ?>
    </ol>
    <div class="carousel-inner">
        <?php if ($slides): ?>
            <?php foreach ($slides as $slide): ?>
                <?php ++$k; ?>
                <div class="carousel-item<?= ($k == 1) ? ' active' : ''?> carousel-item-bg" style="background-image: url('<?= $slide->picture ?>');">
                    <div class="carousel-caption text-<?= $slide->position ?> text-dark">
                        <div class="container">
                            <?= $slide->header ?>
                            <?= $slide->content ?>
                            <p><a class="btn btn-lg btn-primary" href="<?= $slide->link ?>" role="button"><?= Yii::t('app', 'View details') ?></a></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="carousel-item active">
                <img class="first-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==">
                <div class="container">
                    <div class="carousel-caption text-center">
                        <h1><?= Yii::t('app', 'No slide yet') ?></h1>
                        <p><?= Yii::t('app', 'Content of a slide, maybe') ?></p>
                        <p><a class="btn btn-lg btn-primary" href="/admin/slide" role="button"><?= Yii::t('app', 'Control') ?></a></p>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <a class="carousel-control-prev" href="#mainCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#mainCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<?php if ($producers): ?>
    <?php $k = 0; ?>
    <div class="container mt-4">
        <h3>Запчасти по производителям</h3>
        <div class="card-deck-wrapper">
            <div class="card-deck py-2">
                <?php foreach ($producers as $producer): ?>
                    <div class="card p-2 shadow bg-white rounded">
                        <div class="producer-card text-hide" style="background-image: url('<?= $producer->picture ?>');"></div>
                        <a class="card-block stretched-link text-decoration-none" href="/producer/<?= $producer->slug ?>"></a>
                    </div>
                    <?php if (++$k == ceil(count($producers)/2)): ?></div><div class="card-deck py-2"><?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if ($categories): ?>
    <?php $k = 0; ?>
    <div class="container mt-4">
        <h3>Популярные категории</h3>
        <div class="card-deck-wrapper">
            <div class="card-deck py-2">
                <?php foreach ($categories as $category): ?>
                    <div class="card category-card p-2 shadow bg-white rounded" style="background-image: url('<?= $category->picture ?>');">
                        <h5 class="card-title text-uppercase text-muted mb-0"><?= $category->name ?></h5>
                        <a class="card-block stretched-link text-decoration-none" href="/category/<?= $category->slug ?>"></a>
                    </div>
                    <?php if (++$k == ceil(count($categories)/2)): ?></div><div class="card-deck py-2"><?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>

<div class="card" style="width: 18rem;">
    <img class="card-img-top" src="..." alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
</div>

<div class="counter">
    <div class="container">
        <div class="row" id="counter">
            <div class="col-12 col-lg-3">
                <div class="count-up">
                    <p class="counter-count">100</p>
                    <h3>Counter 1</h3>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="count-up">
                    <p class="counter-count">200</p>
                    <h3>Counter 2</h3>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="count-up">
                    <p class="counter-count">300</p>
                    <h3>Counter 3</h3>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="count-up">
                    <p class="counter-count">400</p>
                    <h3>Counter 4</h3>
                </div>
            </div>
        </div>
    </div>
</div>
