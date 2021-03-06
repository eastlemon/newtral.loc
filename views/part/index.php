<?php
    use yii\bootstrap4\Html;
    use yii\widgets\DetailView;
    use yii\grid\GridView;
    use yii\widgets\ListView;
    use yii\helpers\Url;
    use app\widgets\PartGrid;

    $this->title = $model->name;
    $this->params['breadcrumbs'][] = ['label' => $model->producer->name, 'url' => ['/producer/' . $model->producer->slug]];
    $this->params['breadcrumbs'][] = $this->title;
    \yii\web\YiiAsset::register($this);
?>

<div class="container">
    <div class="product-view">
        <h3><?= Html::encode($this->title) ?></h3>
        <div class="row">
            <div class="col-sm">
                <div id="carouselProductControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php if ($model->partPictures): ?>
                            <?php foreach ($model->partPictures as $item): ?>
                                <div class="carousel-item <?= ($k == 0) ? "active" : "" ?>">
                                    <?= Html::img(Url::to('@web/uploads/') . $item->picture, ['class' => 'd-block w-100 h-100', 'alt' => $item->picture]) ?>
                                </div>
                                <?php $k++; ?>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="carousel-item active">
                                <?= Html::img(Url::to('@web/images/') . 'noImage.png', ['class' => 'd-block w-100 h-100', 'alt' => $item->picture]) ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselProductControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselProductControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-sm">
                <h4 class="text-primary">?????????????? <?= $model->articul ?></h4>
                <p>???????? ?????? ????????????</p>
                <h3 class="text-success"><?= \Yii::$app->formatter->asCurrency(end($model->offers)->price) ?></h3>
                <a href="#">?????????? ???????????????</a>
                <br>
                <br>
                <a href="#">???????????????? ?? ????????????</a>
                <br>
                <a href="#">???????????? ???????????? ?? ????????????</a>
                <br>
                <a href="#">?????? ???????????? ??????????????????????????</a>
            </div>
            <div class="col-sm">
                <h4>?????????????????????????? <?= $model->producer->name ?></h4>
                <div class="container-fluid p-0">
                    <div class="row mt-3">
                        <div class="col-6">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <button type="button" class="btn btn-outline-secondary btn-number" onclick="minus()">
                                        <span class="fa fa-minus"></span>
                                    </button>
                                </span>
                                <input id="count" type="text" class="form-control input-number" value="1">
                                <span class="input-group-append">
                                    <button type="button" class="btn btn-outline-secondary btn-number" onclick="plus()">
                                        <span class="fa fa-plus"></span>
                                    </button>
                                </span>
                            </div>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-outline-warning btn-block"><i class="far fa-bookmark"></i>&nbsp;?? ??????????????????</button>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                            <button type="button" class="btn btn-primary btn-block"><i class="fas fa-shopping-cart"></i>&nbsp;?? ??????????????</button>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-outline-dark btn-block"><i class="far fa-save"></i>&nbsp;PDF</button>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <p>?????????????????? ????????????????</p>
                            <p>
                                <button type="button" class="btn btn-outline-dark btn-circle"><i class="fab fa-vk"></i></button>
                                <button type="button" class="btn btn-outline-dark btn-circle"><i class="fab fa-facebook-f"></i></button>
                                <button type="button" class="btn btn-outline-dark btn-circle"><i class="fab fa-odnoklassniki"></i></button>
                                <button type="button" class="btn btn-outline-dark btn-circle"><i class="fab fa-telegram-plane"></i></button>
                                <!--<button type="button" class="btn btn-outline-dark btn-circle"><i class="fab fa-instagram"></i></button>-->
                                <!--<button type="button" class="btn btn-outline-dark btn-circle"><i class="fab fa-linkedin-in"></i></button>-->
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pt-4">
            <div class="col-12">
                <ul class="nav nav-tabs nav-justified" id="productTab">
                    <li class="nav-item">
                        <a class="nav-link active" id="availability-tab" data-toggle="tab" href="#availability" role="tab" aria-controls="availability" aria-selected="true">?????????????? ?? ??????????????&nbsp;<i class="far fa-check-square"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="characteristics-tab" data-toggle="tab" href="#characteristics" role="tab" aria-controls="characteristics" aria-selected="true">????????????????????????????&nbsp;<i class="fas fa-cog"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="??ertificates-tab" data-toggle="tab" href="#??ertificates" role="tab" aria-controls="??ertificates" aria-selected="true">??????????????????????&nbsp;<i class="far fa-file-alt"></i></a>
                    </li>
                </ul>
                <div class="tab-content" id="productTabContent">
                    <div class="tab-pane fade show active" id="availability" role="tabpanel" aria-labelledby="availability-tab">
                        <div class="container-fluid p-0">
                            <div class="row mt-3">
                                <div class="col-12"><h4 class="float-left text-secondary">?????????????? ???? ?????????? ??????????????</h4></div>
                                <div class="col-12"><?= PartGrid::widget(['dataProvider' => $stocksProvider]) ?></div>
                                <div class="col-12"><h4 class="float-left text-secondary">??????????????</h4></div>
                                <div class="col-12"><?= PartGrid::widget(['dataProvider' => $analoguesProvider]) ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="characteristics" role="tabpanel" aria-labelledby="characteristics-tab">
                        <div class="container-fluid p-0">
                            <div class="row mt-3">
                                <div class="col-12">
                                    <?= DetailView::widget([
                                        'model' => $model,
                                        'attributes' => [
                                            'name',
                                            'articul',
                                            'description',
                                        ],
                                    ]) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="??ertificates" role="tabpanel" aria-labelledby="??ertificates-tab">
                        <div class="container-fluid p-0">
                            <div class="row mt-3">
                                <div class="col-12">
                                    <?= GridView::widget([
                                        'dataProvider' => $certificatesProvider,
                                        'columns' => [
                                            'name',
                                            [
                                                'class' => 'yii\grid\ActionColumn',
                                                'template' => '{download}',
                                                'buttons' => [
                                                    'download' => function ($url, $model) {
                                                        return Html::a('<i class="fas fa-download"></i>', Url::toRoute(['certificate-download', 'id' => $model->id]), ['title' => Yii::t('app', 'Download'), 'data-pjax' => 0, 'target' => '_blank']);
                                                    },
                                                ],
                                                'contentOptions' => ['style' => 'width:1px;'],
                                            ],
                                        ],
                                    ]) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>