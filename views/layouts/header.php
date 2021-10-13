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
                     <i class="fas fa-user-shield"></i>&nbsp;<a href="/account"><?= Yii::t('app', 'Account') ?></a>&nbsp;|&nbsp;<?= Html::a('<i class="fas fa-door-open"></i>', Url::to(['site/logout']), ['data-method' => 'POST']) ?>
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

<?php if (!Yii::$app->user->isGuest): ?>
   <?php foreach (\app\models\Category::getMenuItems() as $item) $categories .= '<div class="col-lg-3 col-md-4 col-sm-6"><a href="/category/' . $item->slug . '"><img class="img-thumbnail" src="/' . $item->picture . '" height="25">' . $item->name . '</a></div>'; ?>
   <?php foreach (\app\models\Producer::getMenuItems() as $item) $producers .= '<div class="col-lg-3 col-md-4 col-sm-6"><a href="/producer/' . $item->slug . '"><img class="img-thumbnail" src="/' . $item->picture . '" height="25">' . $item->name . '</a></div>'; ?>
   <?php foreach (\app\models\Producer::getMenuItems() as $item) $producers2 .= '<div class="col-lg-3 col-md-4 col-sm-6"><a href="/trailer/producer?slug=' . $item->slug . '"><img class="img-thumbnail" src="/' . $item->picture . '" height="25">' . $item->name . '</a></div>'; ?>
<?php endif; ?>

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
               '<div class="container d-flex align-items-start p-4">
                  <div class="col sidebar">
                     <div class="list-group" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="list-group-item list-group-item-action disabled" id="v-pills-categories-tab" data-toggle="pill" href="#v-pills-categories" role="tab" aria-controls="v-pills-categories" aria-selected="false"><i class="fas fa-screwdriver"></i>&nbsp;' . Yii::t('app', 'Spare parts by groups') . '</a>
                        <a class="list-group-item list-group-item-action active" id="v-pills-producers-tab" data-toggle="pill" href="#v-pills-producers" role="tab" aria-controls="v-pills-producers" aria-selected="true">' . Yii::t('app', 'Spare parts by manufacturer') . '</a>
                        <a class="list-group-item list-group-item-action" id="v-pills-producers2-tab" data-toggle="pill" href="#v-pills-producers2" role="tab" aria-controls="v-pills-producers2" aria-selected="true">' . Yii::t('app', 'Spare parts by manufacturer') . ' 2</a>
                     </div>
                  </div>
                  <div class="col-8 tab-content" id="v-pills-tabContent">
                     <div class="tab-pane fade" id="v-pills-categories" role="tabpanel" aria-labelledby="v-pills-categories-tab"><div class="container"><div class="row">' . $categories . '</div></div></div>
                     <div class="tab-pane fade show active" id="v-pills-producers" role="tabpanel" aria-labelledby="v-pills-producers-tab"><div class="container"><div class="row">' . $producers . '</div></div></div>
                     <div class="tab-pane fade show" id="v-pills-producers2" role="tabpanel" aria-labelledby="v-pills-producers2-tab"><div class="container"><div class="row">' . $producers2 . '</div></div></div>
                  </div>
               </div>',
            ],
            'options' => ['class' => 'nav-item dropdown megamenu'],
         ] : [
            'label' => Yii::t('app', 'Parts Catalog'),
            'items' => [
               /*'<div class="container">
                  <div class="row">
                     <div class="col-8 sidebar"><div class="demo-trailer"></div></div>
                     <div class="col pt-4 pb-4 tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-categories" role="tabpanel" aria-labelledby="v-pills-categories-tab"><ul class="list-group list-group-flush">' . $categories . '</ul></div>
                     </div>
                  </div>
               </div>',*/
               '<div class="container d-flex align-items-start p-4">
                  <div class="col sidebar">
                     <div class="list-group" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="list-group-item list-group-item-action active" id="v-pills-semitrailers-tab" data-toggle="pill" href="#v-pills-semitrailers" role="tab" aria-controls="v-pills-semitrailers" aria-selected="true">' . Yii::t('app', 'Spare parts for semitrailers') . '</a>
                     </div>
                  </div>
                  <div class="col-8 tab-content" id="v-pills-tabContent">
                     <div class="tab-pane fade show active" id="v-pills-semitrailers" role="tabpanel" aria-labelledby="v-pills-semitrailers-tab"><ul class="list-group list-group-flush"><li>123</li></ul></div>
                  </div>
               </div>',
            ],
            'options' => ['class' => 'nav-item dropdown megamenu'],
         ],
         ['label' => Yii::t('app', 'About'), 'url' => ['/page/about']],
         ['label' => Yii::t('app', 'News'), 'url' => ['/page/news']],
         ['label' => Yii::t('app', 'Delivery'), 'url' => ['/page/delivery']],
         ['label' => Yii::t('app', 'Contacts'), 'url' => ['/page/contact']],
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