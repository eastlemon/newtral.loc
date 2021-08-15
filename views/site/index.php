<?php
/* @var $this yii\web\View */
$this->title = 'TRALRF';
?>
<div class="container">
    <div id="header-nav">
        <div class="content-mainMenu mainMenu">
            <div class="mainMenu-item dropdown">
                <b>Каталог запчастей&nbsp;<i class="fa fa-arrow-down"></i></b>
                <div class="dropdown-content" id="dropdown-content">
                    <div class="leftMenu-block-title back-yellow"><div style="width: 100%; padding-right: 5px;" id="parts-by-models-btn">Запчасти по моделям полуприцепов</div></div>
                    <div class="leftMenu-block-title"><div style="width: 100%; padding-right: 5px;" id="parts-by-manufacturers-btn">Запчасти по производителям</div></div>
                    <div class="leftMenu-block-title"><div style="width: 100%; padding-right: 5px;" id="parts-by-groups-btn">Запчасти по группам</div></div>
                </div>
            </div>
            <div class="mainMenu-item">
                <a href="/about">О компании</a>
            </div>
            <div class="mainMenu-item">
                <a href="/news">Новости</a>
            </div>
            <div class="mainMenu-item">
                <a href="/delivery">Доставка</a>
            </div>
            <div class="mainMenu-item">
                <a href="/contacts">Контакты</a>
            </div>
        </div>
        <div id="parts-by-models-modal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close" style="float:right;">&times;</span>
                    <div style="color:white; float:left;">Запчасти по моделям полуприцепов</div>
                </div>
                <div class="modal-body">
                    <div class="content-mainPageInfo-content-semitrailerUnits semitrailerUnits">
                        <div class="semitrailerUnits-imageAndContentGroup">
                            <div class="semitrailerUnits-image">
                                <img class="semitrailerUnits-image__main-image" src="/images/semitrailer_modal.png">
                                <div class="semitrailerUnits-image-dot _number3" style="left: 260.5px; top: 212px;" data-number="3">3</div>
                                <div class="semitrailerUnits-image-line _number3" style="top: 224px; left: 272.5px; width: 0px;" data-number="3"></div>
                                <div class="semitrailerUnits-image-line _vertical _number3" style="top: 262px; left: 466px; height: 56px;" data-number="3"></div>
                                <div class="semitrailerUnits-image-line _vertical _bending _number3" style="top: 224px; left: 272.5px; height: 38px;" data-number="3"></div>
                                <div class="semitrailerUnits-image-line _bending _number3" style="top: 262px; left: 272.5px; width: 194.5px;" data-number="3"></div>
                                <div class="semitrailerUnits-image-dot _number2" style="left: 191.5px; top: 211px;" data-number="2">2</div>
                                <div class="semitrailerUnits-image-line _number2" style="top: 223px; left: 199.5px; width: 4px;" data-number="2"></div>
                                <div class="semitrailerUnits-image-line _vertical _number2" style="top: 262px; left: 233.5px; height: 56px;" data-number="2"></div>
                                <div class="semitrailerUnits-image-line _vertical _bending _number2" style="top: 223px; left: 199.5px; height: 39px;" data-number="2"></div>
                                <div class="semitrailerUnits-image-line _bending _number2" style="top: 262px; left: 199.5px; width: 35px;" data-number="2"></div>
                                <div class="semitrailerUnits-image-dot _number1" style="left: 153.5px; top: 139px;" data-number="1">1</div>
                                <div class="semitrailerUnits-image-line _number1" style="top: 151px; left: 2px; width: 151.5px;" data-number="1"></div>
                                <div class="semitrailerUnits-image-line _vertical _number1" style="top: 151px; left: 1px; height: 167px;" data-number="1"></div>
                                <div class="semitrailerUnits-image-line _vertical _bending _number1" style="top: 291px; left: 0px; height: 0px;" data-number="1"></div>
                                <div class="semitrailerUnits-image-line _bending _number1" style="top: 291px; left: 0px; width: 0px;" data-number="1"></div>
                                <div class="semitrailerUnits-image-dot _number4" style="left: 317.5px; top: 221px;" data-number="4">4</div>
                                <div class="semitrailerUnits-image-line _number4" style="top: 233px; left: 341.5px; width: 146px;" data-number="4"></div>
                                <div class="semitrailerUnits-image-line _vertical _number4" style="top: 279px; left: 698.5px; height: 39px;" data-number="4"></div>
                                <div class="semitrailerUnits-image-line _vertical _bending _number4" style="top: 233px; left: 487.5px; height: 46px;" data-number="4"></div>
                                <div class="semitrailerUnits-image-line _bending _number4" style="top: 279px; left: 487.5px; width: 212px;" data-number="4"></div>
                                <div class="semitrailerUnits-image-dot _number5" style="left: 579.5px; top: 226px;" data-number="5">5</div>
                                <div class="semitrailerUnits-image-line _number5" style="top: 238px; left: 603.5px; width: 152px;" data-number="5"></div>
                                <div class="semitrailerUnits-image-line _vertical _number5" style="top: 281px; left: 931px; height: 37px;" data-number="5"></div>
                                <div class="semitrailerUnits-image-line _vertical _bending _number5" style="top: 238px; left: 755.5px; height: 43px;" data-number="5"></div>
                                <div class="semitrailerUnits-image-line _bending _number5" style="top: 281px; left: 755.5px; width: 176.5px;" data-number="5"></div>
                                <div class="semitrailerUnits-image-dot _number6" style="left: 693.5px; top: 166px;" data-number="6">6</div>
                                <div class="semitrailerUnits-image-line _number6" style="top: 166px; left: 705.5px; width: 214.5px;" data-number="6"></div>
                                <div class="semitrailerUnits-image-line _vertical _number6" style="top: 166px; left: 704.5px; height: 0px;" data-number="6"></div>
                                <div class="semitrailerUnits-image-line _vertical _bending _number6" style="top: 291px; left: 0px; height: 0px;" data-number="6"></div>
                                <div class="semitrailerUnits-image-line _bending _number6" style="top: 291px; left: 0px; width: 0px;" data-number="6"></div>
                                <div class="semitrailerUnits-image-dot _number7" style="left: 670.5px; top: 164px;" data-number="7">7</div>
                                <div class="semitrailerUnits-image-line _number7" style="top: 2px; left: 682.5px; width: 237.5px;" data-number="7"></div>
                                <div class="semitrailerUnits-image-line _vertical _number7" style="top: 2px; left: 681.5px; height: 162px;" data-number="7"></div>
                                <div class="semitrailerUnits-image-line _vertical _bending _number7" style="top: 291px; left: 0px; height: 0px;" data-number="7"></div>
                                <div class="semitrailerUnits-image-line _bending _number7" style="top: 291px; left: 0px; width: 0px;" data-number="7"></div>
                            </div>
                            <div class="semitrailerUnits-content semitrailerUnits-content_rightPanel">
                                <div class="semitrailerUnits-content-item semitrailerUnits-content-item-wide">
                                    <a href="/semitrailer-unit/f00f6bd868c8a11fdce48da5fa9b4073"><div class="semitrailerUnits-content-item-number _number7">7</div><div class="semitrailerUnits-content-item-image" style="background-image: url('/images/unit/6abeeaa7323f3fad0cf88fd80cee5767.jpg.200x82.jpg');"></div><div class="semitrailerUnits-content-item-text">Седельно-Сцепные Устройства и ремкомплекты седел</div></a>
                                </div>
                                <div class="semitrailerUnits-content-item semitrailerUnits-content-item-wide">
                                    <a href="/semitrailer-unit/416dd32c7e603b34000ac748fb46330c"><div class="semitrailerUnits-content-item-number _number6">6</div><div class="semitrailerUnits-content-item-image" style="background-image: url('/images/unit/0cc4fd9f853710cf5cb96bbe67f311bf.jpg.200x82.jpg');"></div><div class="semitrailerUnits-content-item-text">Опорные устройства</div></a>
                                </div>
                            </div>
                        </div>
                        <div class="semitrailerUnits-content">
                            <div class="semitrailerUnits-content-item">
                                <a href="/semitrailer-unit/4386f1982b1df9cc8a4345ff10489990"><div class="semitrailerUnits-content-item-number _number1">1</div><div class="semitrailerUnits-content-item-image" style="background-image: url('/images/unit/cde317ddd1f5594fd8bf14dcb0729d09.jpg.200x82.jpg');"></div><div class="semitrailerUnits-content-item-text">Трапы (аппарели)</div></a>
                            </div>
                            <div class="semitrailerUnits-content-item">
                                <a href="/semitrailer-unit/81f98d063ef82e2bf78168a1c363788a"><div class="semitrailerUnits-content-item-number _number2">2</div><div class="semitrailerUnits-content-item-image" style="background-image: url('/images/unit/2ca2e4957e20c61089ec3db4324fa087.jpg.200x82.jpg');"></div><div class="semitrailerUnits-content-item-text">Оси</div></a>
                            </div>
                            <div class="semitrailerUnits-content-item">
                                <a href="/semitrailer-unit/d165f66e7b449b14ceb16e1055e25266"><div class="semitrailerUnits-content-item-number _number3">3</div><div class="semitrailerUnits-content-item-image" style="background-image: url('/images/unit/643e96f7dc66319fd9634000e96e9ab5.jpg.200x82.jpg');"></div><div class="semitrailerUnits-content-item-text">Элементы подвески</div></a>
                            </div>
                            <div class="semitrailerUnits-content-item">
                                <a href="/semitrailer-unit/973709d084f119518876384ff6e1d374"><div class="semitrailerUnits-content-item-number _number4">4</div><div class="semitrailerUnits-content-item-image" style="background-image: url('/images/unit/41e98fbfdcf6c412d710fa2cf193b0d6.jpg.200x82.jpg');"></div><div class="semitrailerUnits-content-item-text">Шины и Диски</div></a>
                            </div>
                            <div class="semitrailerUnits-content-item">
                                <a href="/semitrailer-unit/449f82c3ca73101f1782f958130b1a53"><div class="semitrailerUnits-content-item-number _number5">5</div><div class="semitrailerUnits-content-item-image" style="background-image: url('/images/unit/4725cc58c86285bca02e4d124289d8b1.jpg.200x82.jpg');"></div><div class="semitrailerUnits-content-item-text">Шкворни</div></a>
                            </div>
                        </div>
                        <div class="semitrailerUnits-content">
                            <div class="semitrailerUnits-content-item semitrailerUnits-content-item-narrow">
                                <a href="/semitrailer-unit/416dd32c7e603b34000ac748fb46330c"><div class="semitrailerUnits-content-item-number _number6">6</div><div class="semitrailerUnits-content-item-image" style="background-image: url('/images/unit/0cc4fd9f853710cf5cb96bbe67f311bf.jpg.200x82.jpg');"></div><div class="semitrailerUnits-content-item-text">Опорные устройства</div></a>
                            </div>
                            <div class="semitrailerUnits-content-item semitrailerUnits-content-item-narrow">
                                <a href="/semitrailer-unit/f00f6bd868c8a11fdce48da5fa9b4073"><div class="semitrailerUnits-content-item-number _number7">7</div><div class="semitrailerUnits-content-item-image" style="background-image: url('/images/unit/6abeeaa7323f3fad0cf88fd80cee5767.jpg.200x82.jpg');"></div><div class="semitrailerUnits-content-item-text">Седельно-Сцепные Устройства и ремкомплекты седел</div></a>
                            </div>
                            <div class="semitrailerUnits-content-item semitrailerUnits-content-item_empty"></div>
                            <div class="semitrailerUnits-content-item semitrailerUnits-content-item_empty"></div>
                            <div class="semitrailerUnits-content-item semitrailerUnits-content-item_empty"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer"><div class="button" style="text-align:center;"><a href="#">Начать подбор</a></div></div>
            </div>
        </div>
        <div id="parts-by-manufacturers-modal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close" style="float:right;">&times;</span>
                    <div style="color:white; float:left;">Запчасти по производителям</div>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="content">
                            <div class="content-mainPageInfo">
                                <div class="content-mainPageInfo-content">
                                    <div class="menu-parts-manufacturers">
                                        <?php foreach ([] as $manufacturer): ?>
                                            <a class="menu-parts-manufacturers-item" href="#"><div style="background-image: url('<?= $manufacturer->logo ?>');" class="menu-parts-manufacturers-item-logo"></div></a>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="parts-by-groups-modal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close" style="float:right;">&times;</span>
                    <div style="color:white; float:left;">Запчасти по группам</div>
                </div>
                <div class="modal-body">
                    <ul class="tilesWrap">
                        <div class="container">
                            <div class="content">
                                <div class="content-mainPageInfo">
                                    <?php $k = 1; ?>
                                    <?php foreach ([] as $group): ?>
                                        <li>
                                            <h2><?= ($k < 10) ? '0'.$k : $k; ?></h2>
                                            <h3><?= $group->name ?></h3>
                                            <p>Описание <?= $group->name ?></p>
                                            <button>Подробнее</button>
                                        </li>
                                        <?php $k++; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
        <div class="search search_mainMenu">
            <form action="/search/" method="get">
                <input class="search-input" name="search" placeholder="Поиск по артикулу" type="text" value="" />
                <span class="button without-shadow"><input class="is-small" value="Найти" type="submit" /></span>
            </form>
        </div>
    </div>
    <div class="content-mainPageInfo">
        <div class="content-mainPageInfo-content">
            <div class="slider-feedback">
                <div class="imageSlider">
                    <div class="imageSlider-content">
                        <div class="imageSlider-content-item imageSlider-content-item_active" style="background-image: url('/images/1.png');"><span class="imageSlider-content-item-button"><a href="#">Подробнее</a></span></div>
                        <div class="imageSlider-content-item" style="background-image: url('/images/2.png');"><span class="imageSlider-content-item-button"><a href="#">Подробнее</a></span></div>
                        <div class="imageSlider-content-item" style="background-image: url('/images/3.png');"><span class="imageSlider-content-item-button"><a href="#">Подробнее</a></span></div>
                        <div class="imageSlider-content-item" style="background-image: url('/images/4.png');"><span class="imageSlider-content-item-button"><a href="#">Подробнее</a></span></div>
                        <div class="imageSlider-content-item" style="background-image: url('/images/5.png');"><span class="imageSlider-content-item-button"><a href="#">Подробнее</a></span></div>
                    </div>
                    <div class="imageSlider-navigation">
                        <div class="imageSlider-navigation-item imageSlider-navigation-item_active">&nbsp;</div>
                        <div class="imageSlider-navigation-item">&nbsp;</div>
                        <div class="imageSlider-navigation-item">&nbsp;</div>
                        <div class="imageSlider-navigation-item">&nbsp;</div>
                        <div class="imageSlider-navigation-item">&nbsp;</div>
                    </div>
                </div>
                <div class="feedback-background">
                    <div class="feedback-container">
                        <div class="feedback-screen">
                            <div class="feedback-screen-body">
                                <div class="feedback-screen-body-item left">
                                    <div class="feedback-app-title">
                                        <span>ОТПРАВИТЬ ЗАЯВКУ</span>
                                    </div>
                                    <div class="feedback-app-contact">Отправляя форму, я подтверждаю, что ознакомлен с политикой конфинденциальности и согласен с обработкой персональных данных</div>
                                </div>
                                <div class="feedback-screen-body-item">
                                    <div class="feedback-app-form">
                                        <div class="feedback-app-form-group"><input class="feedback-app-form-control" placeholder="Имя"></div>
                                        <div class="feedback-app-form-group"><input class="feedback-app-form-control" placeholder="email"></div>
                                        <div class="feedback-app-form-group"><button class="feedback-app-form-button">Прикрепить файл</button></div>
                                        <div class="feedback-app-form-group message"><input class="feedback-app-form-control" placeholder="Перечислить запчасти"></div>
                                        <div class="feedback-app-form-group buttons"><button class="feedback-app-form-button">Отправить</button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h2 style="margin-left: 0px; padding-top: 20px; padding-bottom: 10px;">Запчасти по производителям</h2>
            <div class="parts-manufacturers">
                <a class="parts-manufacturers-item" href="#"><div style="background-image: url('/images/001.png');" class="parts-manufacturers-item-logo"></div></a>
                <a class="parts-manufacturers-item" href="#"><div style="background-image: url('/images/002.png');" class="parts-manufacturers-item-logo"></div></a>
                <a class="parts-manufacturers-item" href="#"><div style="background-image: url('/images/003.png');" class="parts-manufacturers-item-logo"></div></a>
                <a class="parts-manufacturers-item" href="#"><div style="background-image: url('/images/004.png');" class="parts-manufacturers-item-logo"></div></a>
                <a class="parts-manufacturers-item" href="#"><div style="background-image: url('/images/005.png');" class="parts-manufacturers-item-logo"></div></a>
                <a class="parts-manufacturers-item" href="#"><div style="background-image: url('/images/006.png');" class="parts-manufacturers-item-logo"></div></a>
            </div>
            <div class="parts-manufacturers">
                <a class="parts-manufacturers-item" href="#"><div style="background-image: url('/images/007.png');" class="parts-manufacturers-item-logo"></div></a>
                <a class="parts-manufacturers-item" href="#"><div style="background-image: url('/images/008.png');" class="parts-manufacturers-item-logo"></div></a>
                <a class="parts-manufacturers-item" href="#"><div style="background-image: url('/images/009.png');" class="parts-manufacturers-item-logo"></div></a>
                <a class="parts-manufacturers-item" href="#"><div style="background-image: url('/images/010.png');" class="parts-manufacturers-item-logo"></div></a>
                <a class="parts-manufacturers-item" href="#"><div style="background-image: url('/images/011.png');" class="parts-manufacturers-item-logo"></div></a>
                <a class="parts-manufacturers-item" href="#"><div style="background-image: url('/images/footer-logo.png');" class="parts-manufacturers-item-logo"></div></a>
            </div>
            <h2 style="margin-left: 0px; padding-top: 20px; padding-bottom: 10px;">Популярные категории</h2>
            <div class="pop-categories">
                <a class="pop-categories-item" href="#">
                    <div style="background-image: url('/images/40.png');" class="pop-categories-item-logo"><h2>Шкворни сцепные</h2></div>
                </a>
                <a class="pop-categories-item" href="#">
                    <div style="background-image: url('/images/44.png');" class="pop-categories-item-logo"><h2>Пневматика</h2></div>
                </a>
                <a class="pop-categories-item" href="#">
                    <div style="background-image: url('/images/37.png');" class="pop-categories-item-logo"><h2>Рессоры и полурессоры</h2></div>
                </a>
            </div>
            <div class="pop-categories">
                <a class="pop-categories-item" href="#">
                    <div style="background-image: url('/images/36.png');" class="pop-categories-item-logo"><h2>Седельно-сцепные устройства</h2></div>
                </a>
                <a class="pop-categories-item" href="#">
                    <div style="background-image: url('/images/39.png');" class="pop-categories-item-logo"><h2>Опорные и тягово-сцепные устройства</h2></div>
                </a>
                <a class="pop-categories-item" href="#">
                    <div style="background-image: url('/images/38.png');" class="pop-categories-item-logo"><h2>Шины и диски</h2></div>
                </a>
            </div>
            <h2 style="margin-left: 0px; padding-top: 20px; padding-bottom: 10px;">Выгодные предложения</h2>
            <div class="profit-offers">
                <div class="profit-offers-item" id="offer-one">
                    <div class="profit-offers-img" style="background-image: url('https://html5book.ru/wp-content/uploads/2015/10/black-dress.jpg');"></div>
                    <div class="profit-offers-list">
                        <h3>Маленькое черное платье 1</h3>
                        <span class="profit-offers-price">₽ 1999</span>
                        <div class="profit-offers-button"><a href="#">Подробнее</a></div>
                        &nbsp;
                        <div class="profit-offers-button">
                            <a href="#"><i class="fas fa-shopping-cart"></i></a>
                        </div>
                    </div>
                </div>
                <div class="profit-offers-item" id="offer-two">
                    <div class="profit-offers-img" style="background-image: url('https://html5book.ru/wp-content/uploads/2015/10/black-dress.jpg');"></div>
                    <div class="profit-offers-list">
                        <h3>Маленькое черное платье 2</h3>
                        <span class="profit-offers-price">₽ 1999</span>
                        <div class="profit-offers-button"><a href="#">Подробнее</a></div>
                        &nbsp;
                        <div class="profit-offers-button">
                            <a href="#"><i class="fas fa-shopping-cart"></i></a>
                        </div>
                    </div>
                </div>
                <div class="profit-offers-item" id="offer-three">
                    <div class="profit-offers-img" style="background-image: url('https://html5book.ru/wp-content/uploads/2015/10/black-dress.jpg');"></div>
                    <div class="profit-offers-list">
                        <h3>Маленькое черное платье 3</h3>
                        <span class="profit-offers-price">₽ 1999</span>
                        <div class="profit-offers-button"><a href="#">Подробнее</a></div>
                        &nbsp;
                        <div class="profit-offers-button">
                            <a href="#"><i class="fas fa-shopping-cart"></i></a>
                        </div>
                    </div>
                </div>
                <div class="profit-offers-item" id="offer-four">
                    <div class="profit-offers-img" style="background-image: url('https://html5book.ru/wp-content/uploads/2015/10/black-dress.jpg');"></div>
                    <div class="profit-offers-list">
                        <h3>Маленькое черное платье 4</h3>
                        <span class="profit-offers-price">₽ 1999</span>
                        <div class="profit-offers-button"><a href="#">Подробнее</a></div>
                        &nbsp;
                        <div class="profit-offers-button">
                            <a href="#"><i class="fas fa-shopping-cart"></i></a>
                        </div>
                    </div>
                </div>
                <div class="profit-offers-item" id="offer-five">
                    <div class="profit-offers-img" style="background-image: url('https://html5book.ru/wp-content/uploads/2015/10/black-dress.jpg');"></div>
                    <div class="profit-offers-list">
                        <h3>Маленькое черное платье 5</h3>
                        <span class="profit-offers-price">₽ 1999</span>
                        <div class="profit-offers-button"><a href="#">Подробнее</a></div>
                        &nbsp;
                        <div class="profit-offers-button">
                            <a href="#"><i class="fas fa-shopping-cart"></i></a>
                        </div>
                    </div>
                </div>
                <div class="profit-offers-item" id="offer-six">
                    <div class="profit-offers-img" style="background-image: url('https://html5book.ru/wp-content/uploads/2015/10/black-dress.jpg');"></div>
                    <div class="profit-offers-list">
                        <h3>Маленькое черное платье 6</h3>
                        <span class="profit-offers-price">₽ 1999</span>
                        <div class="profit-offers-button"><a href="#">Подробнее</a></div>
                        &nbsp;
                        <div class="profit-offers-button">
                            <a href="#"><i class="fas fa-shopping-cart"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <h2 style="margin-left: 0px; padding-bottom: 10px;">Глобалспецтранс – экспресс-поставка запчастей в любую точку России с полной гарантией совместимости</h2>
            <div style="text-align: justify; font-size: 16px;">
                <p>У нас вы можете купить абсолютно всё в одном месте (от гайки до прицепа) и получить заказ в кратчайшие сроки.</p>
                <p>В ассортименте запчасти как для отечественных полуприцепов – ТСП (Политранс), ТСМ (Тверьстроймаш), SPECPRICEP (Спецприцеп), HARTUNG (ЧКПЗ), ЧМЗАП (УРАЛАВТОПРИЦЕП) , УЗСТ, СПЕЦМАШ, НОВТРАК, ТОНАР, GRUNWALD и прочих</p>
                <p>
                    Так и для зарубежных - Kassbohrer (Кессборер), Schwarzmüller (Шварцмюллер), Nooteboom (Нотебум), Goldhofer (Голдхофер), Broshuis (Брошус), Faymonville (Файмонвиль), Fruehauf (Фрюхауф), Meusburger (Мейсбургер), Doll
                    (Доль) и т.д
                </p>
                <p>В наличие оси в сборе, подвески и запасные части к ним на самые известные марки BPW, SAF, Gigant, ЧМЗАП, L1, так и редкие ADR, SAE-SMB, Fuwa, BMT.</p>
                <p>
                    В наличии на складе запасные части на пневмоподвески, на оси, на рессорные подвески. Также всегда в наличии шкворни, опорные устройства, колесные диски, седельно-сцепные устройства рем.комплекты к ним. Кроме того, мы
                    продаем запчасти на тягачи и спецтехнику.
                </p>
                <p>Мы регулярно выполняем заявки, на запчасти, которые вообще не завозились в Россию.</p>
            </div>
            <div class="u-body">
                <section class="u-align-left u-clearfix u-section-1" id="carousel_0866">
                    <div class="u-clearfix u-sheet u-sheet-1">
                        <div class="u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-list u-list-1">
                            <div class="u-repeater u-repeater-1">
                                <div class="u-align-center u-container-style u-grey-5 u-list-item u-repeater-item u-shape-rectangle u-list-item-1">
                                    <div class="u-container-layout u-similar-container u-container-layout-1">
                                        <div class="u-border-15 u-border-palette-1-base u-expanded-width u-line u-line-horizontal u-line-1"></div>
                                        <h3 class="u-custom-font u-font-montserrat u-text u-text-3" data-animation-name="counter" data-animation-event="scroll" data-animation-duration="3000" style="will-change: contents;">2500</h3>
                                        <p class="u-text u-text-4">Запчастей</p>
                                        <p class="u-text u-text-5">для тралов в ассортименте</p>
                                    </div>
                                </div>
                                <div class="u-align-center u-container-style u-grey-5 u-list-item u-repeater-item u-shape-rectangle u-list-item-2">
                                    <div class="u-container-layout u-similar-container u-container-layout-2">
                                        <div class="u-border-15 u-border-palette-1-base u-expanded-width u-line u-line-horizontal u-line-2"></div>
                                        <h3 class="u-custom-font u-font-montserrat u-text u-text-6" data-animation-name="counter" data-animation-event="scroll" data-animation-duration="3000" style="will-change: contents;">1632</h3>
                                        <p class="u-text u-text-7">Позиций</p>
                                        <p class="u-text u-text-8">в наличии на наших складах</p>
                                    </div>
                                </div>
                                <div class="u-align-center u-container-style u-grey-5 u-list-item u-repeater-item u-shape-rectangle u-list-item-3">
                                    <div class="u-container-layout u-similar-container u-container-layout-3">
                                        <div class="u-border-15 u-border-palette-1-base u-expanded-width u-line u-line-horizontal u-line-3"></div>
                                        <h3 class="u-custom-font u-font-montserrat u-text u-text-9" data-animation-name="counter" data-animation-event="scroll" data-animation-duration="3000" style="will-change: contents;">1500</h3>
                                        <p class="u-text u-text-10">Заявок</p>
                                        <p class="u-text u-text-11">успешно завершено за год</p>
                                    </div>
                                </div>
                                <div class="u-align-center u-container-style u-grey-5 u-list-item u-repeater-item u-shape-rectangle u-list-item-4">
                                    <div class="u-container-layout u-similar-container u-container-layout-4">
                                        <div class="u-border-15 u-border-palette-1-base u-expanded-width u-line u-line-horizontal u-line-4"></div>
                                        <h3 class="u-custom-font u-font-montserrat u-text u-text-12" data-animation-name="counter" data-animation-event="scroll" data-animation-duration="3000" style="will-change: contents;">15</h3>
                                        <p class="u-text u-text-13">Минут</p>
                                        <p class="u-text u-text-14">средняя скорость подбора запчастей</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

<div class="u-body">
    <section class="u-align-center u-clearfix u-grey-10 u-section-2">
        <h2 class="u-text u-text-0">Ощутимые преимущества для клиентов</h2>
        <div class="u-list u-repeater u-list-1">
            <div class="u-container-style u-list-item u-repeater-item u-white u-list-item-1">
                <div class="u-container-layout u-similar-container u-valign-top u-align-center u-container-layout-1">
                    <h4>Точность подбора 98%</h4>
                    <span class="u-icon u-icon-circle u-palette-5-light-2 u-icon-1 a"><i class="fas fa-check-double"></i></span>
                    <p class="u-text u-text-2">Подобранные нами запчасти гарантированно подойдут на Ваш прицеп</p>
                </div>
            </div>
            <div class="u-container-style u-list-item u-repeater-item u-white u-list-item-1">
                <div class="u-container-layout u-similar-container u-valign-top u-align-center u-container-layout-1">
                    <h4>Экстренная доставка даже на крайний север</h4>
                    <span class="u-icon u-icon-circle u-palette-5-light-2 u-icon-1"><i class="fas fa-truck-loading"></i></span>
                    <p class="u-text u-text-4"><a href="#">Грамотная логистика</a> по всей России, лично проехали все самые сложные северные маршруты</p>
                </div>
            </div>
            <div class="u-container-style u-list-item u-repeater-item u-white u-list-item-1">
                <div class="u-container-layout u-similar-container u-valign-top u-align-center u-container-layout-1">
                    <h4>Сервис с заботой о клиенте 24/7</h4>
                    <span class="u-icon u-icon-circle u-palette-5-light-2 u-icon-1"><i class="fas fa-people-carry"></i></span>
                    <p class="u-text u-text-6">Решаем все вопросы, управляем заказом 24/7/365. Доступ к каталогу Вашего полуприцепа и закрытым ценам</p>
                </div>
            </div>
            <div class="u-container-style u-list-item u-repeater-item u-white u-list-item-1">
                <div class="u-container-layout u-similar-container u-valign-top u-align-center u-container-layout-1">
                    <h4>Единый поставщик для всей вашей техники</h4>
                    <span class="u-icon u-icon-circle u-palette-5-light-2 u-icon-1"><i class="fas fa-parachute-box"></i></span>
                    <p class="u-text u-text-8">Закроем потребности в запчастях для всей вашей колесной техники, комплектуем склады и всегда готовы экстренно отправить необходимые запчасти</p>
                </div>
            </div>
            <div class="u-container-style u-list-item u-repeater-item u-white u-list-item-1">
                <div class="u-container-layout u-similar-container u-valign-top u-align-center u-container-layout-1">
                    <h4>Собственное производство и склады по России</h4>
                    <span class="u-icon u-icon-circle u-palette-5-light-2 u-icon-1"><i class="fas fa-map-marked-alt"></i></span>
                    <p class="u-text u-text-8">Оперативно комплектуем клиентов и решаем нестандартные и индивидуальные задачи</p>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="container">
    <div class="content">
        <div class="content-mainPageInfo">
            <div class="content-mainPageInfo-content">
                <h2 style="margin-left: 0px; padding-top: 20px; padding-bottom: 10px; text-align: center;">Почему нам доверяют</h2>
                <div class="iconblocks">
                    <div class="iconblock-5">
                        <div class="icon">
                            <i class="fas fa-warehouse"></i>
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0" y="0" viewBox="0 -10 300 320" xml:space="preserve">
                                <polygon points="22.3,223.7 22.3,76.3 150,2.5 277.7,76.3 277.7,223.7 150,297.5"></polygon>
                                <path d="M150,4.8l125.7,72.6v145.2L150,295.2L24.3,222.6V77.4L150,4.8 M150,0.2L20.3,75.1v149.8L150,299.8l129.7-74.9V75.1L150,0.2 L150,0.2z"></path>
                            </svg>
                        </div>
                        <h3>Глобалспецтранс это собственное производство и система складов</h3>
                        <p>Экстренно комплектуем клиентов по всей России и выполняем индивидуальные производственные заказы любой сложности.</p>
                    </div>
                    <div class="iconblock-5">
                        <div class="icon">
                            <i class="fas fa-city"></i>
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0" y="0" viewBox="0 -10 300 320" xml:space="preserve">
                                <polygon points="22.3,223.7 22.3,76.3 150,2.5 277.7,76.3 277.7,223.7 150,297.5"></polygon>
                                <path d="M150,4.8l125.7,72.6v145.2L150,295.2L24.3,222.6V77.4L150,4.8 M150,0.2L20.3,75.1v149.8L150,299.8l129.7-74.9V75.1L150,0.2 L150,0.2z"></path>
                            </svg>
                        </div>
                        <h3>Мы из Челябинска – родины отечественных полуприцепов</h3>
                        <p>
                            Большинство полуприцепов в России произведено именно здесь, благодаря этому ведущие производители запчастей располагают свои склады на территории УРФО и мы имеем к ним прямой доступ. Мы являемся официальным
                            представителем уральского завода <a href="#">ООО ПКФ «Политранс»</a>, знаем до мелочей специфику местного рынка и гораздо быстрее решаем задачи по подбору запчастей.
                        </p>
                    </div>
                    <div class="iconblock-5">
                        <div class="icon">
                            <i class="fas fa-poll"></i>
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0" y="0" viewBox="0 -10 300 320" xml:space="preserve">
                                <polygon points="22.3,223.7 22.3,76.3 150,2.5 277.7,76.3 277.7,223.7 150,297.5"></polygon>
                                <path d="M150,4.8l125.7,72.6v145.2L150,295.2L24.3,222.6V77.4L150,4.8 M150,0.2L20.3,75.1v149.8L150,299.8l129.7-74.9V75.1L150,0.2 L150,0.2z"></path>
                            </svg>
                        </div>
                        <h3>Гарантируем результат</h3>
                        <p>
                            Неважно насколько мало информации будет для поиска, мы предложим вам оптимальный вариант уже в день обращения. Данный результат достигается благодаря отточенному за 12 лет специальному алгоритму подбора, который
                            исключает финансовые риски со стороны клиента
                        </p>
                    </div>
                    <div class="iconblock-5">
                        <div class="icon">
                            <i class="fas fa-check-circle"></i>
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0" y="0" viewBox="0 -10 300 320" xml:space="preserve">
                                <polygon points="22.3,223.7 22.3,76.3 150,2.5 277.7,76.3 277.7,223.7 150,297.5"></polygon>
                                <path d="M150,4.8l125.7,72.6v145.2L150,295.2L24.3,222.6V77.4L150,4.8 M150,0.2L20.3,75.1v149.8L150,299.8l129.7-74.9V75.1L150,0.2 L150,0.2z"></path>
                            </svg>
                        </div>
                        <h3>Глобалспецтранс – там, где другие сдаются мы работаем на совесть</h3>
                        <p>
                            Со многими нашими клиентами мы начали долгосрочное партнерство именно с самых проблемных запросов. Решаем любые нестандартные задачи от поиска очень редких запчастей до поставок в самые труднодоступные территории
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="u-body">
    <section class="u-clearfix u-palette-5-base u-section-123">
        <h2 class="u-text u-text-0">Отточенный до совершенства алгоритм работы</h2>
        <div class="u-clearfix u-sheet u-sheet-1">
            <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
                <div class="u-layout">
                    <div class="u-layout-row">
                        <div class="u-container-style u-layout-cell u-size-20 u-size-40-md u-layout-cell-1">
                            <div class="u-container-layout u-valign-top u-container-layout-1">
                                <h2 class="u-text u-text-1">01</h2>
                                <h4 class="u-text u-text-2">Заявка на подбор <i class="far fa-clock"></i> ~ 15 минут</h4>
                                <p class="u-text u-text-3">
                                    <strong>Вы оставляете заявку, и Ваша поломка теперь наша головоломка!</strong> Ищем по любым зацепкам, даже запчасти, которые не завозились в РФ. Уточним все детали и произведём мгновенный поиск по всем
                                    складам. Предложим не только дорогой оригинал, но и альтернативы - аналоги приемлемого качества и цены.
                                </p>
                                <div class="u-text u-text-4">
                                    <span class="u-icon u-icon-circle u-icon-1"><i class="fas fa-chevron-right"></i></span>
                                    <div class="u-text u-text-5">Выгодное предложение по запчастям с 100% гарантией совместимости + <a href="#">доступ к закрытым сервисам и ценам на сайте</a>.</div>
                                </div>
                            </div>
                        </div>
                        <div class="u-container-style u-layout-cell u-size-20 u-size-40-md u-layout-cell-1">
                            <div class="u-container-layout u-valign-top u-container-layout-1">
                                <h2 class="u-text u-text-1">02</h2>
                                <h4 class="u-text u-text-2">Оплата заказа и отгрузка <i class="far fa-clock"></i> ~ 1 день</h4>
                                <p class="u-text u-text-3">Оплата заказа осуществляется всеми <a href="#">доступными способами</a>. После оплаты товар тщательно проверяется и бережно упаковывается.</p>
                                <div class="u-text u-text-4">
                                    <span class="u-icon u-icon-circle u-icon-1"><i class="fas fa-chevron-right"></i></span>
                                    <div class="u-text u-text-5">
                                        Ваш заказ оплачен, проверен упакован и готов к отгрузке с нашего склада.<br />
                                        <strong>Также предоставляем фотоотчет по отгрузке</strong>. <strong>Доставляем бесплатно до ТК</strong>.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="u-container-style u-layout-cell u-size-20 u-size-40-md u-layout-cell-1">
                            <div class="u-container-layout u-valign-top u-container-layout-1">
                                <h2 class="u-text u-text-1">03</h2>
                                <h4 class="u-text u-text-2">Доставка товара <i class="far fa-clock"></i> ~ от 1 дня</h4>
                                <p class="u-text u-text-3">
                                    Отправляем заказ согласованным с Вами транспортом, наши логисты всегда предложат самые быстрые варианты по доставке, а менеджер проконтролирует доставку 24/7. В нашей практике очень много случаев, когда
                                    заказ приходил уже на следующий день после оплаты.
                                </p>
                                <div class="u-text u-text-4">
                                    <span class="u-icon u-icon-circle u-icon-1"><i class="fas fa-chevron-right"></i></span>
                                    <div class="u-text u-text-5">Вы получаете все запчасти и документы к ним в срок. Кроме того, для постоянных клиентов мы комплектуем наши склады заказанными ранее запчастями.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="container">
    <div class="content-mainPageInfo">
        <div class="content-mainPageInfo-content">
            <table class="our-advantages">
                <tbody>
                    <tr>
                        <td>
                            <i class="far fa-thumbs-down"></i>
                            <p>5 ключевых проблем с которыми сталкиваются 95% клиентов</p>
                        </td>
                        <td>
                            <i class="far fa-thumbs-up"></i>
                            <p>Наши решения</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <hr />
                            Покупка трала обернулась проблемой с его обслуживанием - запчасти быстро приходят в негодность их сложно найти или они неоправданно дороги
                        </td>
                        <td>
                            <hr />
                            Перед покупкой трала позвоните нам и спросите, есть ли на ту или иную подвеску и оси запчасти. Этим вы убережете себя от будущих проблем связанных с желанием завода удешевить производство за счет установки
                            дешевых (редких) деталей
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <hr />
                            Приходится работать с множеством поставщиков по различной технике и даже так не всегда удается найти нужную запчасть в наличии
                        </td>
                        <td>
                            <hr />
                            <strong>У нас вы всегда найдете всё для полуприцепа в наличии</strong>, кроме того поставляем запчасти и на другую колесную технику. Расширим номенклатуру под любого заказчика и всегда доставим вовремя
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <hr />
                            Постоянный дефицит по запчастям и их высокая цена в труднодоступных для доставки районах
                        </td>
                        <td>
                            <hr />
                            <strong>Работа с северными направлениями – наш профиль.</strong> Найдем транспорт даже там где его нет, привезем туда где на карте только координаты
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <hr />
                            Отсутствие нужной запчасти у поставщика в случае возникновения экстренного ремонта и невозможность поставщика доставить запчасть в срок
                        </td>
                        <td>
                            <hr />
                            Комплектуем наши склады под нужды постоянных клиентов и оперативно доставляем запчасти по оптимальной цене когда они так необходимы
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <hr />
                            Купленная деталь не подошла, и компания понесла убытки
                        </td>
                        <td>
                            <hr />
                            Побдерем совместимую с вашей техникой запчасть, используя свои методики поиска.
                        </td>
                    </tr>
                </tbody>
            </table>
<div class="newsAndExchange">
<div class="newsAndExchange-news">
<h2 class="newsAndExchange-news-title">Новости</h2>
<div class="news">
<div class="news-item has-large-text">
                        <div class="news-item-wrapper">
                            <div class="news-item-content">
                                <div class="news-item-picture">
                                    <img src="/images/noImage100x100.png" alt="Виды неисправностей и способы устранения" />
                                </div>

                                <div class="news-item-date">
                                    23 июня 2020
                                </div>

                                <div class="news-item-title">
                                    <a href="/news-item/55">Виды неисправностей и способы устранения</a>
                                </div>
                                <div class="news-item-text">
                                    ⠀⠀Неисправности на полуприцепах в основном идентичны поломкам на других автомобилях. Несмотря на то что эти средства характеризуются более простой конструкцией, важно следить за исправностью каждого
                                    узла. Ведь излишний вес полуприцепа может стать причиной аварии, потери управления, опасной для жизни ситуации.<br />
                                    ⠀<br />
                                    ⠀⠀Типичными и распространёнными неисправностями являются:<br />
                                    𝟭&nbsp;занос прицепа во время торможения;<br />
                                    𝟮&nbsp;трещины и повреждения лонжеронов или поперечин;<br />
                                    𝟯&nbsp;отсутствие плавности при движении и преодолении препятствий;<br />
                                    𝟰&nbsp;сдвиг основания платформы;<br />
                                    𝟱&nbsp;подтёки смазочной жидкости;<br />
                                    𝟲&nbsp;утечка воздуха из тормозных камер;<br />
                                    𝟳&nbsp;произвольное торможение трала и отсутствие реакции на водительские команды.<br />
                                    ⠀<br />
                                    ⠀⠀Способ устранения поломки зависит от типа неисправности.<br />
                                    Подтёки масла свидетельствуют о том, что износилось уплотнительное кольцо.<br />
                                    При обнаружении дефектов тормозной системы могут проводиться такие мероприятия, как: регулировка штоков; замена устройства и блоков АБС, пружин тормозных колодок, крышки и диафрагмы камеры; ремонт
                                    модулятора и других сложных узлов.<br />
                                    ⠀⠀Чтобы поддерживать высокий уровень безопасности и надёжности, необходимо регулярно следить за состоянием основных частей и деталей.<br />
                                    ⠀⠀Своевременная диагностика проблем и замена изношенных комплектующих элементов позволит чувствовать себя уверенно, отправляясь в дальние поездки и преодолевая различные дорожные препятствия.
                                </div>
                            </div>
                        </div>
                        <a href="/news-item/55" class="news-item-read_more">Читать далее</a>
                    </div>
                    <div class="news-item">
                        <div class="news-item-wrapper">
                            <div class="news-item-content">
                                <div class="news-item-picture">
                                    <img src="/images/noImage100x100.png" alt="Наша команда заботится о сохранности запасных частей в пути! Отправляем в любую точку нашей необъятной страны!" />
                                </div>

                                <div class="news-item-date">
                                    17 июня 2020
                                </div>

                                <div class="news-item-title">
                                    <a href="/news-item/54">Наша команда заботится о сохранности запасных частей в пути! Отправляем в любую точку нашей необъятной страны!</a>
                                </div>
                                <div class="news-item-text">
                                    ⠀<br />
                                    Упаковываем
                                </div>
                            </div>
                        </div>
                        <a href="/news-item/54" class="news-item-read_more">Читать далее</a>
                    </div>
                    <div class="news-item">
                        <div class="news-item-wrapper">
                            <div class="news-item-content">
                                <div class="news-item-picture">
                                    <img src="/images/noImage100x100.png" alt="Отгрузили ССУ +GF+ 🇩🇪" />
                                </div>

                                <div class="news-item-date">
                                    23 марта 2020
                                </div>

                                <div class="news-item-title">
                                    <a href="/news-item/53">Отгрузили ССУ +GF+ 🇩🇪</a>
                                </div>
                                <div class="news-item-text">
                                    ⠀<br />
                                    SK-HD 38.36 36тонн<br />
                                    ⠀<br />
                                    Доставка заняла до г. Нарьян-Мар 3 рабочих дня!<br />
                                    ⠀<br />
                                    ⠀<br />
                                    Обращайтесь и Вам поможем😉 ⠀
                                </div>
                            </div>
                        </div>
                        <a href="/news-item/53" class="news-item-read_more">Читать далее</a>
                    </div>
                    <div class="news-item">
                        <div class="news-item-wrapper">
                            <div class="news-item-content">
                                <div class="news-item-picture">
                                    <img src="/images/noImage100x100.png" alt="Сегодня отгрузили тормозные валы на поворотную ось BPW 🇩🇪" />
                                </div>

                                <div class="news-item-date">
                                    19 декабря 2019
                                </div>

                                <div class="news-item-title">
                                    <a href="/news-item/52">Сегодня отгрузили тормозные валы на поворотную ось BPW 🇩🇪</a>
                                </div>
                                <div class="news-item-text">
                                    ⠀<br />
                                    Так же на складе в наличии запчасти к подвескам и осям SAF, Gigant, BMT, L1, ЧМЗАП
                                </div>
                            </div>
                        </div>
                        <a href="/news-item/52" class="news-item-read_more">Читать далее</a>
                    </div>
</div>
<div class="button allNewsLink">
<a href="/news">Все новости</a>
</div>
</div>
</div>

        </div>
    </div>
</div>