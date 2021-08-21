<?php
use yii\bootstrap4\Html;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\Nav;
use yii\bootstrap4\ActiveForm;
use app\models\Search;
use yii\helpers\Url;
?>
<div class="container">
   <div class="row">
      <div class="col-md-auto" style="padding-top:15px;"><a href="/"><img src="/images/header-logo.png"></a></div>
      <div class="col-md-auto">
         <p style="font-size: 18px;"><b><i class="fas fa-phone-square"></i>&nbsp;<?= Yii::$app->settings->get('mainPage', 'phone') ?></b></p>
         <select class="form-control" id="filialFormControlSelect" placeholder="<?= Yii::t('app', 'Select Office') ?>">
            <option>Челябинск</option>
            <option>Усинск</option>
         </select>
      </div>
      <div class="col-md-auto">
         <p><i class="far fa-clock"></i>&nbsp;<?= Yii::$app->settings->get('mainPage', 'workTime') ?></p>
         <p><i class="far fa-envelope"></i>&nbsp;<a href="mailto:<?= Yii::$app->settings->get('mainPage', 'email') ?>"><?= Yii::$app->settings->get('mainPage', 'email') ?></a></p>
      </div>
      <div class="col-md-auto">
         <div style="text-align: center;">
            <a style="color:green; font-size:28px;" href="<?= Yii::$app->settings->get('mainPage', 'whatsapp_link') ?>" target="_blank"><i class="fab fa-whatsapp"></i></a>&nbsp;
            <a style="color:blue; font-size:28px;" href="<?= Yii::$app->settings->get('mainPage', 'telegram-link') ?>" target="_blank"><i class="fab fa-telegram-plane"></i></a>&nbsp;
            <a style="color:purple; font-size:28px;" href="<?= Yii::$app->settings->get('mainPage', 'viber-link') ?>" target="_blank"><i class="fab fa-viber"></i></a>
         </div>
         <p style="text-align: center;"><?= Html::a('<i class="fas fa-phone"></i> Заказать звонок', ['#'], ['class' => 'btn btn-primary', 'title' => 'Заказать звонок']) ?></p>
      </div>
      <div class="col" style="text-align:right;">
         <div class="float-right">
            <p>
               <?php if (!Yii::$app->user->isGuest): ?>
                  <?php if (Yii::$app->user->can('admin')): ?>
                     <i class="fas fa-users-cog"></i>&nbsp;<a href="/admin"><?= Yii::t('app', 'Control') ?></a>
                  <?php else: ?>
                     <i class="fas fa-user-shield"></i>&nbsp;<a href="/site/cabinet"><?= Yii::t('app', 'Cabinet') ?></a>&nbsp;|&nbsp;<?= Html::a(Yii::t('app', 'Logout'), Url::to(['site/logout']), ['data-method' => 'POST']) ?>
                  <?php endif; ?>
               <?php else: ?>
                  <i class="fas fa-key"></i>&nbsp;<a href="/site/login"><?= Yii::t('app', 'Enter') ?></a>&nbsp;|&nbsp;<a href="/site/signup"><?= Yii::t('app', 'Signup') ?></a>
               <?php endif; ?>
            </p>
            <small class="text-muted"><i class="fas fa-shopping-cart"></i>&nbsp;<a href="/cart">В корзине ничего нет</a></small>
         </div>
      </div>
   </div>
</div>

<?php NavBar::begin(['options' => [
   'brandLabel' => false,
   'class' => 'navbar navbar-expand-lg navbar-dark bg-primary',
]]); ?>
   <?= Nav::widget([
      'options' => ['class' => 'navbar-nav mr-auto'],
      'items' => [
         [
            'label' => Yii::t('app', 'Parts Catalog'),
            'items' => [
               ['label' => Yii::t('app', 'Parts By Models'), 'url' => '/', 'linkOptions' => ['class' => 'bg-warning']],
               ['label' => Yii::t('app', 'Parts By Manufacturers'), 'url' => '/'],
               ['label' => Yii::t('app', 'Parts By Groups'), 'url' => '/'],
            ],
         ],
         ['label' => Yii::t('app', 'About'), 'url' => ['/site/about']],
         ['label' => Yii::t('app', 'News'), 'url' => ['/site/news']],
         ['label' => Yii::t('app', 'Delivery'), 'url' => ['/site/delivery']],
         ['label' => Yii::t('app', 'Contacts'), 'url' => ['/site/contact']],
      ],
   ]) ?>
   <?php $model = new Search(); ?>
   <?php $form = ActiveForm::begin([
      'method' => 'get',
      'action' => ['/search'],
   ]); ?>
      <?= Nav::widget([
         'options' => ['class' => 'navbar-nav ml-auto'],
         'items' => [
            [
               'label' => $form->field($model, 'search', [
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