<?php
    use yii\bootstrap4\Html;
    use yii\helpers\StringHelper;

    $this->title = Yii::t('app', 'Main Page');
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
        <h3><?= Yii::t('app', 'Spare parts by manufacturer') ?></h3>
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
        <h3><?= Yii::t('app', 'Popular Categories') ?></h3>
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

<?php if ($profitParts): ?>
    <div class="container mt-4">
        <h3><?= Yii::t('app', 'Profitable offer') ?></h3>
        <div class="row">
            <?php foreach ($profitParts as $part): ?>
                <div class="col-3 d-flex">
                    <div class="card w-100">
                        <img class="card-img-top" src="/images/noImage100x100.png" alt="<?= $part->slug ?>">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?= StringHelper::truncate($part->name, 40, '...') ?></h5>
                            <p class="card-text"><?//= StringHelper::truncate($part->description, 20, '...') ?></p>
                            <div class="btn-group mt-auto" role="group">
                                <button type="button" class="btn btn-success"><i class="fas fa-eye"></i>&nbsp;<?= Yii::t('app', 'See') ?></button>
                                <button type="button" class="btn btn-primary"><i class="fas fa-shopping-cart"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>

<div class="container mt-4">
    <div class="row text-justify">
        <div class="col-12">
            <?= $mainPage['block5Header'] ?>
            <?= $mainPage['block5Content'] ?>
        </div>
    </div>
</div>

<div class="container mt-4 mb-4">
    <div class="row" id="counter">
        <div class="col">
            <div class="text-center shadow p-2 bg-white rounded">
                <p class="counter-count">2500</p>
                <h3>Запчастей</h3>
                <p>для тралов в ассортименте</p>
            </div>
        </div>
        <div class="col">
            <div class="text-center shadow p-2 bg-white rounded">
                <p class="counter-count">1632</p>
                <h3>Позиций</h3>
                <p>в наличии на наших складах</p>
            </div>
        </div>
        <div class="col">
            <div class="text-center shadow p-2 bg-white rounded">
                <p class="counter-count">1500</p>
                <h3>Заявок</h3>
                <p>успешно завершено за год</p>
            </div>
        </div>
        <div class="col">
            <div class="text-center shadow p-2 bg-white rounded">
                <p class="counter-count">15</p>
                <h3>Минут</h3>
                <p>средняя скорость подбора</p>
            </div>
        </div>
    </div>
</div>

<div class="jumbotron jumbotron-fluid pt-4">
    <div class="container mt-4">
        <h3 class="text-center mb-4">Ощутимые преимущества для клиентов</h3>
        <div class="row">
            <div class="col d-flex">
                <div class="text-center shadow p-2 bg-white rounded">
                    <h5 class="h-25">Точность подбора 98%</h5>
                    <div class="pb-4"><i class="fas fa-4x fa-check-double"></i></div>
                    <p>Подобранные нами запчасти гарантированно подойдут на Ваш прицеп</p>
                </div>
            </div>
            <div class="col d-flex">
                <div class="text-center shadow p-2 bg-white rounded">
                    <h5 class="h-25">Экстренная доставка даже на крайний север</h5>
                    <div class="pb-4"><i class="fas fa-4x fa-truck-loading"></i></div>
                    <p><a href="#">Грамотная логистика</a> по всей России, лично проехали все самые сложные северные маршруты</p>
                </div>
            </div>
            <div class="col d-flex">
                <div class="text-center shadow p-2 bg-white rounded">
                    <h5 class="h-25">Сервис с заботой о клиенте 24/7</h5>
                    <div class="pb-4"><i class="fa fa-4x fa-people-carry"></i></div>
                    <p>Решаем все вопросы, управляем заказом 24/7/365. Доступ к каталогу Вашего полуприцепа и закрытым ценам</p>
                </div>
			</div>
            <div class="col d-flex">
                <div class="text-center shadow p-2 bg-white rounded">
                    <h5 class="h-25">Единый поставщик для всей вашей техники</h5>
                    <div class="pb-4"><i class="fas fa-4x fa-parachute-box"></i></div>
                    <p>Закроем потребности в запчастях для всей вашей колесной техники, комплектуем склады и всегда готовы экстренно отправить необходимые запчасти</p>
                </div>
			</div>
            <div class="col d-flex">
                <div class="text-center shadow p-2 bg-white rounded">
                    <h5 class="h-25">Собственное производство и склады по России</h5>
                    <div class="pb-4"><i class="fas fa-4x fa-map-marked-alt"></i></div>
                    <p>Оперативно комплектуем клиентов и решаем нестандартные и индивидуальные задачи</p>
                </div>
			</div>
        </div>
    </div>
</div>

<div class="container mt-4 mb-4">
    <h3 class="text-center">Почему нам доверяют</h3>
    <div class="row mb-2">
        <div class="col d-flex mh-100">
            <div class="shadow p-4 bg-white rounded">
                <h5>Глобалспецтранс это собственное производство и система складов</h4>
                <p>Экстренно комплектуем клиентов по всей России и выполняем индивидуальные производственные заказы любой сложности</p>
            </div>
        </div>
        <div class="col d-flex mh-100">
            <div class="shadow p-4 bg-white rounded">
                <h5>Мы из Челябинска – родины отечественных полуприцепов</h4>
                <p>Большинство полуприцепов в России произведено именно здесь, благодаря этому ведущие производители запчастей располагают свои склады на территории УРФО и мы имеем к ним прямой доступ. Мы являемся официальным представителем уральского завода ООО ПКФ «Политранс», знаем до мелочей специфику местного рынка и гораздо быстрее решаем задачи по подбору запчастей</p>
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col d-flex mh-100">
            <div class="shadow p-4 bg-white rounded">
                <h5>Гарантируем результат</h4>
                <p>Неважно насколько мало информации будет для поиска, мы предложим вам оптимальный вариант уже в день обращения. Данный результат достигается благодаря отточенному за 12 лет специальному алгоритму подбора, который исключает финансовые риски со стороны клиента</p>
            </div>
        </div>
        <div class="col d-flex mh-100">
            <div class="shadow p-4 bg-white rounded">
                <h5>Глобалспецтранс – там, где другие сдаются мы работаем на совесть</h4>
                <p>Со многими нашими клиентами мы начали долгосрочное партнерство именно с самых проблемных запросов. Решаем любые нестандартные задачи от поиска очень редких запчастей до поставок в самые труднодоступные территории</p>
            </div>
        </div>
    </div>
</div>

<div class="jumbotron jumbotron-fluid pt-4">
    <div class="container mt-4">
        <h3 class="text-center mb-6">Отточенный до совершенства алгоритм работы</h3>
        <div class="row">
            <div class="col d-flex">
                <div class="shadow p-4 bg-white rounded">
                    <h1 class="text-warning font-weight-bold">01</h1>
                    <p>Заявка на подбор <i class="far fa-clock"></i> ~ 15 минут</p>
                    <div class="height-250"><b>Вы оставляете заявку, и Ваша поломка теперь наша головоломка!</b> Ищем по любым зацепкам, даже запчасти, которые не завозились в РФ. Уточним все детали и произведём мгновенный поиск по всем складам. Предложим не только дорогой оригинал, но и альтернативы - аналоги приемлемого качества и цены.</div>
                    <p><i class="fas fa-2x fa-chevron-right"></i> Выгодное предложение по запчастям с 100% гарантией совместимости + <a href="#">доступ к закрытым сервисам и ценам на сайте</a></p>
                </div>
            </div>
            <div class="col d-flex">
                <div class="shadow p-4 bg-white rounded">
                    <h1 class="text-warning font-weight-bold">02</h1>
                    <p>Оплата заказа и отгрузка <i class="far fa-clock"></i> ~ 1 день</p>
                    <div class="height-250">Оплата заказа осуществляется всеми <a href="#">доступными способами</a>. После оплаты товар тщательно проверяется и бережно упаковывается.</div>
                    <p><i class="fas fa-2x fa-chevron-right"></i> Ваш заказ оплачен, проверен упакован и готов к отгрузке с нашего склада.<br><b>Также предоставляем фотоотчет по отгрузке</b>. <b>Доставляем бесплатно до ТК</b></p>
                </div>
            </div>
            <div class="col d-flex">
                <div class="shadow p-4 bg-white rounded">
                    <h1 class="text-warning font-weight-bold">03</h1>
                    <p>Доставка товара <i class="far fa-clock"></i> ~ от 1 дня</p>
                    <div class="height-250">Отправляем заказ согласованным с Вами транспортом, наши логисты всегда предложат самые быстрые варианты по доставке, а менеджер проконтролирует доставку 24/7. В нашей практике очень много случаев, когда заказ приходил уже на следующий день после оплаты.</div>
                    <p><i class="fas fa-2x fa-chevron-right"></i> Вы получаете все запчасти и документы к ним в срок. Кроме того, для постоянных клиентов мы комплектуем наши склады заказанными ранее запчастями.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-4 mb-4">
    <div class="row">
        <div class="col p-0 border border-primary rounded">
            <table class="our-advantages">
                <tr>
                    <td><i class="far fa-thumbs-down"></i><p>5 ключевых проблем с которыми сталкиваются 95% клиентов</p></td>
                    <td><i class="far fa-thumbs-up"></i><p>Наши решения</p></td>
                </tr>
                <tr>
                    <td><hr>Покупка трала обернулась проблемой с его обслуживанием - запчасти быстро приходят в негодность их сложно найти или они неоправданно дороги</td>
                    <td><hr>Перед покупкой трала позвоните нам и спросите, есть ли на ту или иную подвеску и оси запчасти. Этим вы убережете себя от будущих проблем связанных с желанием завода удешевить производство за счет установки дешевых (редких) деталей</td>
                </tr>
                <tr>
                    <td><hr>Приходится работать с множеством поставщиков по различной технике и даже так не всегда удается найти нужную запчасть в наличии</td>
                    <td><hr><b>У нас вы всегда найдете всё для полуприцепа в наличии</b>, кроме того поставляем запчасти и на другую колесную технику. Расширим номенклатуру под любого заказчика и всегда доставим вовремя</td>
                </tr>
                <tr>
                    <td><hr>Постоянный дефицит по запчастям и их высокая цена в труднодоступных для доставки районах</td>
                    <td><hr><b>Работа с северными направлениями – наш профиль.</b> Найдем транспорт даже там где его нет, привезем туда где на карте только координаты</td>
                </tr>
                <tr>
                    <td><hr>Отсутствие нужной запчасти у поставщика в случае возникновения экстренного ремонта и невозможность поставщика доставить запчасть в срок</td>
                    <td><hr>Комплектуем наши склады под нужды постоянных клиентов и оперативно доставляем запчасти по оптимальной цене когда они так необходимы</td>
                </tr>
                <tr>
                    <td><hr>Купленная деталь не подошла, и компания понесла убытки</td>
                    <td><hr>Побдерем совместимую с вашей техникой запчасть, используя свои методики поиска.</td>
                </tr>
            </table>
        </div>
    </div>
</div>

<?php if ($news): ?>
    <?php $k = 0; ?>
    <div class="container mt-4">
        <h3>Новости</h3>
        <div class="card-deck-wrapper">
            <div class="card-deck py-2">
                <?php foreach ($news as $post): ?>
                    <div class="card p-2 shadow bg-white rounded">
                        <div class="news-card text-hide" style="background-image: url('<?= $post->picture ?>');"></div>
                        <a class="card-block stretched-link text-decoration-none" href="/news/<?= $post->slug ?>"></a>
                    </div>
                    <?php if (++$k == ceil(count($news)/2)): ?></div><div class="card-deck py-2"><?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>