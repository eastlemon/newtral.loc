<?php
    use yii\bootstrap4\Html;
    use yii\helpers\StringHelper;

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

<?php if ($profitParts): ?>
    <div class="container mt-4">
        <h3>Выгодные предложения</h3>
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
    <h2 style="margin-left: 0px; padding-bottom: 10px;">Глобалспецтранс – экспресс-поставка запчастей в любую точку России с полной гарантией совместимости</h2>
    <div style="text-align:justify; font-size: 16px;">
        <p>У нас вы можете купить абсолютно всё в одном месте (от гайки до прицепа) и получить заказ в кратчайшие сроки.</p>
        <p>В ассортименте запчасти как для отечественных полуприцепов – ТСП (Политранс), ТСМ (Тверьстроймаш), SPECPRICEP (Спецприцеп), HARTUNG (ЧКПЗ), ЧМЗАП (УРАЛАВТОПРИЦЕП) , УЗСТ, СПЕЦМАШ, НОВТРАК, ТОНАР, GRUNWALD и прочих</p>
        <p>Так и для зарубежных - Kassbohrer (Кессборер), Schwarzmüller (Шварцмюллер), Nooteboom (Нотебум), Goldhofer (Голдхофер), Broshuis (Брошус), Faymonville (Файмонвиль), Fruehauf (Фрюхауф), Meusburger (Мейсбургер), Doll (Доль) и т.д</p>
        <p>В наличие оси в сборе, подвески и запасные части к ним на самые известные марки BPW, SAF, Gigant, ЧМЗАП, L1, так и редкие ADR, SAE-SMB, Fuwa, BMT.</p>
        <p>В наличии на складе запасные части на пневмоподвески, на оси, на рессорные подвески. Также всегда в наличии шкворни, опорные устройства, колесные диски, седельно-сцепные устройства рем.комплекты к ним. Кроме того, мы продаем запчасти на тягачи и спецтехнику.</p>
        <p>Мы регулярно выполняем заявки, на запчасти, которые вообще не завозились в Россию.</p>
    </div>
</div>

<div class="counter">
    <div class="container mt-4 mb-4">
        <div class="row" id="counter">
            <div class="col-12 col-lg-3 shadow bg-white rounded">
                <div class="count-up">
                    <p class="counter-count">2500</p>
                    <h3>Запчастей</h3>
                    <p>для тралов в ассортименте</p>
                </div>
            </div>
            <div class="col-12 col-lg-3 shadow bg-white rounded">
                <div class="count-up">
                    <p class="counter-count">1632</p>
                    <h3>Позиций</h3>
                    <p>в наличии на наших складах</p>
                </div>
            </div>
            <div class="col-12 col-lg-3 shadow bg-white rounded">
                <div class="count-up">
                    <p class="counter-count">1500</p>
                    <h3>Заявок</h3>
                    <p>успешно завершено за год</p>
                </div>
            </div>
            <div class="col-12 col-lg-3 shadow bg-white rounded">
                <div class="count-up">
                    <p class="counter-count">15</p>
                    <h3>Минут</h3>
                    <p>средняя скорость подбора</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="jumbotron jumbotron-fluid">
    <div class="container mt-4">
        <h3>Ощутимые преимущества для клиентов</h3>
        <div class="row">
            <div class="col shadow bg-white rounded">
                <h4>Точность подбора 98%</h4>
                <span><i class="fas fa-check-double"></i></span>
                <p>Подобранные нами запчасти гарантированно подойдут на Ваш прицеп</p>
            </div>
            <div class="col shadow bg-white rounded">
                <h4>Экстренная доставка даже на крайний север</h4>	
                <span><i class="fas fa-truck-loading"></i></span>
                <p><a href="#">Грамотная логистика</a> по всей России, лично проехали все самые сложные северные маршруты</p>
            </div>
            <div class="col shadow bg-white rounded">
                <h4>Сервис с заботой о клиенте 24/7</h4>	
                <span><i class="fas fa-people-carry"></i></span>
                <p>Решаем все вопросы, управляем заказом 24/7/365. Доступ к каталогу Вашего полуприцепа и закрытым ценам</p>
			</div>
            <div class="col shadow bg-white rounded">
                <h4>Единый поставщик для всей вашей техники</h4>	
                <span><i class="fas fa-parachute-box"></i></span>
                <p>Закроем потребности в запчастях для всей вашей колесной техники, комплектуем склады и всегда готовы экстренно отправить необходимые запчасти</p>
			</div>
            <div class="col shadow bg-white rounded">
                <h4>Собственное производство и склады по России</h4>	
                <span><i class="fas fa-map-marked-alt"></i></span>
                <p>Оперативно комплектуем клиентов и решаем нестандартные и индивидуальные задачи</p>
			</div>
        </div>
    </div>
</div>

<div class="container mt-4 mb-4">
    <h3>Почему нам доверяют</h3>
    <div class="row">
        <div class="col shadow bg-white rounded">
            <h4>Глобалспецтранс это собственное производство и система складов</h4>
            <p>Экстренно комплектуем клиентов по всей России и выполняем индивидуальные производственные заказы любой сложности</p>
        </div>
        <div class="col shadow bg-white rounded">
            <h4>Мы из Челябинска – родины отечественных полуприцепов</h4>
            <p>Большинство полуприцепов в России произведено именно здесь, благодаря этому ведущие производители запчастей располагают свои склады на территории УРФО и мы имеем к ним прямой доступ. Мы являемся официальным представителем уральского завода ООО ПКФ «Политранс», знаем до мелочей специфику местного рынка и гораздо быстрее решаем задачи по подбору запчастей</p>
        </div>
    </div>
    <div class="row">
        <div class="col shadow bg-white rounded">
            <h4>Гарантируем результат</h4>
            <p>Неважно насколько мало информации будет для поиска, мы предложим вам оптимальный вариант уже в день обращения. Данный результат достигается благодаря отточенному за 12 лет специальному алгоритму подбора, который исключает финансовые риски со стороны клиента</p>
        </div>
        <div class="col shadow bg-white rounded">
            <h4>Глобалспецтранс – там, где другие сдаются мы работаем на совесть</h4>
            <p>Со многими нашими клиентами мы начали долгосрочное партнерство именно с самых проблемных запросов. Решаем любые нестандартные задачи от поиска очень редких запчастей до поставок в самые труднодоступные территории</p>
        </div>
    </div>
</div>

<div class="jumbotron jumbotron-fluid">
    <div class="container mt-4">
        <div class="row"><div class="col"><h3>Отточенный до совершенства алгоритм работы</h3></div></div>
        <div class="row">
            <div class="col shadow bg-white rounded">
                <h4>01</h4>
            </div>
            <div class="col shadow bg-white rounded">
                <h4>02</h4>
            </div>
            <div class="col shadow bg-white rounded">
                <h4>03</h4>
			</div>
        </div>
    </div>
</div>

<div class="container mt-4 mb-4">
    <div class="row">
        <div class="col p-0">
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
                    <td><hr><strong>У нас вы всегда найдете всё для полуприцепа в наличии</strong>, кроме того поставляем запчасти и на другую колесную технику. Расширим номенклатуру под любого заказчика и всегда доставим вовремя</td>
                </tr>
                <tr>
                    <td><hr>Постоянный дефицит по запчастям и их высокая цена в труднодоступных для доставки районах</td>
                    <td><hr><strong>Работа с северными направлениями – наш профиль.</strong> Найдем транспорт даже там где его нет, привезем туда где на карте только координаты</td>
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