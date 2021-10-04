<?php
    use yii\bootstrap4\ActiveForm;
    use yii\bootstrap4\Html;
    use yii2mod\comments\widgets\Comment;

    $this->title = $cmsModel->meta_title;
    $this->registerMetaTag(['name' => 'keywords', 'content' => $cmsModel->meta_keywords]);
    $this->registerMetaTag(['name' => 'description', 'content' => $cmsModel->meta_description]);
    $this->params['breadcrumbs'][] = $cmsModel->title;
?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="page-title">
                <?= $cmsModel->title ?>
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="page-content">
                <?= $cmsModel->getContent() ?>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <img src="/uploads/30VJDczAY.png" class="img-fluid">
        </div>
    </div>
</div>
<div class="container p-0">
    <div class="row">
        <div class="col">
            <h3>Мы ставим перед собой стратегические цели и идем к их выполнению</h3>
        </div>
    </div>
    <div class="row">
        <div class="card-deck">
            <div class="card">
                <div class="card-header"><h5 class="card-title">Оперативное обеспечение прицепной техники качественными запчастями</h5></div>
                <div class="card-footer bg-primary"></div>
                <div class="card-body"><p class="card-text">Мы построили грамотную логистику с опорой на точечное размещение складов по всей России</p></div>
            </div>
            <div class="card">
                <div class="card-header"><h5 class="card-title">Обеспечивать постоянную максимальную точность подбора</h5></div>
                <div class="card-footer bg-primary"></div>
                <div class="card-body"><p class="card-text">За 12 лет продуктивной работы создана система, <a href="#" data-toggle="tooltip" title="На основе данных с 2018 по 2021 гг">с точностью подбора в 98%</a>.  За все время поставок запчастей, нет ни одного случая возврата из-за неправильного подбора. Если мы отправляем запчасти, значит, они гарантированно подойдут на ваш прицеп</p></div>
            </div>
            <div class="card">
                <div class="card-header"><h5 class="card-title">Сделать доступными запчасти для полуприцепов в отдаленных районах России</h5></div>
                <div class="card-footer bg-primary"></div>
                <div class="card-body"><p class="card-text">Годами отработаны как самые популярные маршруты, так и сложные северные направления с их бездорожьем и отсутствием транспорта</p></div>
            </div>
        </div>
    </div>
    <div class="row pt-4">
        <div class="col p-0">
            <h3>4 ключевые задачи, которые мы уже решили</h3>
        </div>
    </div>
    <div class="row p-0">
        <div class="col-lg-6 col-xxl-4 mb-3">
            <div class="card bg-light border-0 h-100">
                <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                    <div class="container">
                        <div class="row">
                            <div class="col-2 p-4">
                                <div class="mb-4 mt-n4"><i class="fas fa-3x fa-check"></i></div>
                            </div>
                            <div class="col">
                                <p class="mb-0">Объединили в себе нескольких поставщиков по разным категориям техники, принцип «единого поставщика» существенно сокращает трудозатраты клиентов, снижает бюрократическую нагрузку и время на подбор</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xxl-4 mb-3">
            <div class="card bg-light border-0 h-100">
                <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                    <div class="container">
                        <div class="row">
                            <div class="col-2 p-4">
                                <div class="mb-4 mt-n4"><i class="fas fa-3x fa-check"></i></div>
                            </div>
                            <div class="col">
                                <p class="mb-0">Наладили индивидуальное комплектование складов под нужды постоянных заказчиков и запустили собственное производство, тем самым обеспечив возможность экстренно поставлять запчасти и выполнять индивидуальные заказы. Склады в северных регионах работают 24/7/365 дней в году, обеспечивая бесперебойную поставку</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xxl-4 mb-3">
            <div class="card bg-light border-0 h-100">
                <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                    <div class="container">
                        <div class="row">
                            <div class="col-2 p-4">
                                <div class="mb-4 mt-n4"><i class="fas fa-3x fa-check"></i></div>
                            </div>
                            <div class="col">
                                <p class="mb-0">Исключили до статистической погрешности % ошибок при подборе запчастей, бережем деньги и нервы своих клиентов, снижая к минимуму финансовые издержки</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xxl-4 mb-3">
            <div class="card bg-light border-0 h-100">
                <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                    <div class="container">
                        <div class="row">
                            <div class="col-2 p-4">
                                <div class="mb-4 mt-n4"><i class="fas fa-3x fa-check"></i></div>
                            </div>
                            <div class="col">
                                <p class="mb-0">Настроили логистику даже на самый крайний север -  не первый год отправляем запчасти и за Полярный круг и в Коми и в Сибирь и в Якутию, лично проехали все маршруты и детально знаем специфику логистики этих мест</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container p-0">
    <div class="row">
        <div class="col">
            <p>Кроме того, мы являемся официальным представителем крупного завода по производству прицепной техники ООО ПКФ «Политранс» (при клике popup c свидетельством официального партнера) и развиваем собственное производство основываясь на опыте и традициях уральского машиностроения</p>
        </div>
    </div>
</div>
<div class="container pt-4">
    <div class="row">
        <div class="col p-0">
            <h3>Примеры сложных задач которые мы решили для своих клиентов</h3>
        </div>
    </div>
    <div class="row pb-4">
        <div class="col p-0">
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0"><button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Пример 1</button></h2>
                    </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">11 декабря 2018 года (во вторник) нам поступил заказ на доставку запчастей для полуприцепа в Нерюнгри 17 декабря (следующий понедельник) запчасти уже были на объекте</div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0"><button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Пример 2</button></h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">Наш клиент с Камчатки заказал 30 позиций запчастей для раздаточной коробки вездехода Урал с колесной формулой 8х8. Завод их выпускает под заказ в течении месяца. Мы оперативно собрали заказ на складах партнеров в 7 городах России и уже через 2 недели заказчик получил их на Камчатке</div>
                    </div>
                </div>
                <!--<div class="card">
                    <div class="card-header" id="headingThree">
                        <h2 class="mb-0"><button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Collapsible Group Item #3</button></h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">And lastly, the placeholder content for the third and final accordion panel. This panel is hidden by default.</div>
                    </div>
                </div>-->
            </div>
        </div>
    </div>
</div>
<div class="container">
    <?php if ($cmsModel->comment_available): ?>
        <div class="row">
            <div class="col">
                <div class="page-comments">
                    <?= Comment::widget(ArrayHelper::merge([
                            'model' => $cmsModel,
                            'relatedTo' => 'cms page: ' . $cmsModel->url,
                        ],
                        $commentWidgetParams,
                    )) ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
