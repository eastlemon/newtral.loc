<div class="jumbotron">
	<div class="container">
		<div class="row">
			<div class="col-md-auto"><a href="/"><img src="/images/header-logo.png"></a></div>
			<div class="col-md-auto">
				<ul class="list-inline">
					<li class="list-inline-item"><a class="social-icon text-xs-center" target="_blank" href="/"><?= Yii::t('app', 'Parts Catalog') ?></a></li>
					<li class="list-inline-item"><a class="social-icon text-xs-center" target="_blank" href="/about"><?= Yii::t('app', 'About') ?></a></li>
					<li class="list-inline-item"><a class="social-icon text-xs-center" target="_blank" href="/contacts"><?= Yii::t('app', 'Contacts') ?></a></li>
					<li class="list-inline-item"><a class="social-icon text-xs-center" target="_blank" href="/news"><?= Yii::t('app', 'News') ?></a></li>
					<li class="list-inline-item"><a class="social-icon text-xs-center" target="_blank" href="/delivery"><?= Yii::t('app', 'Delivery') ?></a></li>
				</ul>
				<p>&copy; <?= Yii::$app->settings->get('mainPage', 'startYear') ?> - <?= date('Y', time()) ?> <?= Yii::$app->settings->get('mainPage', 'copyrightText') ?></p>
			</div>
			<div class="col" style="text-align:right;">
				<div class="float-right">
					<p><b><i class="fas fa-phone-square"></i>&nbsp;<?= Yii::$app->settings->get('mainPage', 'phone') ?></b></p>
					<p><i class="far fa-envelope"></i>&nbsp;<a href="mailto:<?= Yii::$app->settings->get('mainPage', 'email') ?>"><?= Yii::$app->settings->get('mainPage', 'email') ?></a></p>
				</div>
			</div>
		</div>
	</div>
<div>