<?php
use yii\helpers\Url;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\ActiveForm;
use app\models\SearchModel;
?>

<div class="container">
   <div class="row mb-4">
      <div class="col-4 mx-auto my-auto"><a href="/"><img src="/images/header-logo.png"></a></div>
      <div class="col-8">
         <div class="row justify-content-center align-items-center">
            <div class="col-3">
               <b><i class="fas fa-phone-square"></i>&nbsp;<?= Yii::$app->settings->get('mainPage', 'phone') ?></b>
            </div>
            <div class="col-3">
               <i class="far fa-clock"></i>&nbsp;<?= Yii::$app->settings->get('mainPage', 'workTime') ?>
            </div>
            <div class="col-3">
               <div style="text-align: center;">
                  <a style="color:green; font-size:28px;" href="<?= Yii::$app->settings->get('mainPage', 'whatsapp_link') ?>" target="_blank"><i class="fab fa-whatsapp"></i></a>&nbsp;
                  <a style="color:blue; font-size:28px;" href="<?= Yii::$app->settings->get('mainPage', 'telegram-link') ?>" target="_blank"><i class="fab fa-telegram-plane"></i></a>&nbsp;
                  <a style="color:purple; font-size:28px;" href="<?= Yii::$app->settings->get('mainPage', 'viber-link') ?>" target="_blank"><i class="fab fa-viber"></i></a>
               </div>
            </div>
            <div class="col-3 text-right">
               <?php if (!Yii::$app->user->isGuest): ?>
                  <?php if (Yii::$app->user->can('admin')): ?>
                     <i class="fas fa-users-cog"></i>&nbsp;<a href="/admin"><?= Yii::t('app', 'Control') ?></a>&nbsp;|&nbsp;<?= Html::a('<i class="fas fa-door-open"></i>', Url::to(['site/logout']), ['data-method' => 'POST']) ?>
                  <?php else: ?>
                     <i class="fas fa-user-shield"></i>&nbsp;<a href="/site/cabinet"><?= Yii::t('app', 'Cabinet') ?></a>&nbsp;|&nbsp;<?= Html::a('<i class="fas fa-door-open"></i>', Url::to(['site/logout']), ['data-method' => 'POST']) ?>
                  <?php endif; ?>
               <?php else: ?>
                  <i class="fas fa-key"></i>&nbsp;<a href="/site/login"><?= Yii::t('app', 'Enter') ?></a></a>
               <?php endif; ?>
            </div>
         </div>
         <div class="row justify-content-center align-items-center">
            <div class="col-3">
               <select class="form-control" id="officeFormControlSelect" placeholder="<?= Yii::t('app', 'Select Office') ?>">
                  <?php foreach (\app\models\Office::find()->all() as $item): ?>
                     <option><?= $item->name ?></option>
                  <?php endforeach; ?>
               </select>
            </div>
            <div class="col-3">
               <i class="far fa-envelope"></i>&nbsp;<a href="mailto:<?= Yii::$app->settings->get('mainPage', 'email') ?>"><?= Yii::$app->settings->get('mainPage', 'email') ?></a>
            </div>
            <div class="col-3">
               <span style="text-align: center;"><?= Html::a('<small><i class="fas fa-phone"></i> Заказать звонок</small>', ['#'], ['class' => 'btn btn-block btn-primary', 'title' => 'Заказать звонок']) ?></span>
            </div>
            <div class="col-3 text-right">
               <i class="fas fa-shopping-cart"></i>&nbsp;<a href="/cart"><?= Yii::t('app', 'Empty Cart') ?></a>
            </div>
         </div>
      </div>
   </div>
</div>

<?php
   foreach (\app\models\Category::getRoots() as $item) $categories .= '<a class="list-group-item list-group-item-action" href="/category/' . $item->slug . '">' . $item->name . '</a>';
   foreach (\app\models\Producer::getMenuItems() as $item) $producers .= '<a class="list-group-item list-group-item-action" href="/producer/' . $item->slug . '">' . $item->name . '</a>';
?>

<?php NavBar::begin(['options' => [
   'id' => 'mainNav',
   'class' => 'navbar navbar-expand-lg navbar-dark bg-primary',
   'brandLabel' => false,
]]); ?>
   <?= Nav::widget([
      'options' => ['class' => 'navbar-nav mr-auto'],
      'items' => [
         (!Yii::$app->user->isGuest) ? [
            'label' => Yii::t('app', 'Parts Catalog'),
            'items' => [
               '<div class="container">
                  <div class="col-4 sidebar">
                     <div class="list-group flex-column" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="list-group-item list-group-item-action active" id="v-pills-groups-tab" data-toggle="pill" href="#v-pills-groups" role="tab" aria-controls="v-pills-groups" aria-selected="true">' . Yii::t('app', 'Groups') . '</a>
                        <a class="list-group-item list-group-item-action" id="v-pills-producers-tab" data-toggle="pill" href="#v-pills-producers" role="tab" aria-controls="v-pills-producers" aria-selected="false">' . Yii::t('app', 'Producers') . '</a>
                     </div>
                  </div>
                  <div class="col tab-content" id="v-pills-tabContent">
                     <div class="tab-pane fade show active" id="v-pills-groups" role="tabpanel" aria-labelledby="v-pills-groups-tab"><ul class="list-group list-group-flush">' . $categories . '</ul></div>
                     <div class="tab-pane fade" id="v-pills-producers" role="tabpanel" aria-labelledby="v-pills-producers-tab"><ul class="list-group list-group-flush">' . $producers . '</ul></div>
                  </div>
               </div>',
            ],
            'options' => ['class' => 'nav-item dropdown megamenu'],
         ] : [
            'label' => Yii::t('app', 'Parts Catalog'),
            'items' => [
               '<div class="container">
                  <div class="col-md-8"><div class="demo-trailer"></div></div>
                  <div class="col-md-4"><div class="list-group"' . $categories . '</div></div>
               </div>',
            ],
            'options' => ['class' => 'nav-item dropdown megamenu'],
         ],
         ['label' => Yii::t('app', 'About'), 'url' => ['/site/about']],
         ['label' => Yii::t('app', 'News'), 'url' => ['/site/news']],
         ['label' => Yii::t('app', 'Delivery'), 'url' => ['/site/delivery']],
         ['label' => Yii::t('app', 'Contacts'), 'url' => ['/site/contact']],
      ],
   ]) ?>
   <?php $searchModel = new SearchModel(); ?>
   <?php $form = ActiveForm::begin([
      'method' => 'get',
      'action' => ['/search'],
   ]); ?>
      <?= Nav::widget([
         'options' => ['class' => 'navbar-nav ml-auto'],
         'items' => [
            [
               'label' => $form->field($searchModel, 'search', [
                  'template' => '<div class="input-group">{input}<div class="input-group-append">' . Html::button('<i class="fas fa-search"></i>', ['class' => 'btn btn-warning', 'type' => 'submit']) . '</div></div>'
               ])->textInput(['placeholder' => Yii::t('app', 'Search by article')])->label(false),
               'linkOptions' => ['style' => 'padding:0px;'],
               'encode' => false,
               'url' => false,
            ],
         ],
      ]) ?>
   <?php ActiveForm::end(); ?>
<?php NavBar::end(); ?>

<?php
   $controller = Yii::$app->controller;
   $default_controller = Yii::$app->defaultRoute;
?>

<? if (($controller->id === $default_controller) && ($controller->action->id === $controller->defaultAction)): ?>
   <div id="myCarousel" class="carousel slide" data-ride="carousel">
   <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1" class=""></li>
      <li data-target="#myCarousel" data-slide-to="2" class=""></li>
   </ol>
   <div class="carousel-inner">
      <div class="carousel-item active">
         <img class="first-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="First slide">
         <div class="container">
         <div class="carousel-caption text-left">
            <h1>Example headline.</h1>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
         </div>
         </div>
      </div>
      <div class="carousel-item">
         <img class="second-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Second slide">
         <div class="container">
         <div class="carousel-caption">
            <h1>Another example headline.</h1>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
         </div>
         </div>
      </div>
      <div class="carousel-item">
         <img class="third-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
         <div class="container">
         <div class="carousel-caption text-right">
            <h1>One more for good measure.</h1>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
         </div>
         </div>
      </div>
   </div>
   <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
   </a>
   <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
   </a>
   </div>
<? endif; ?>
