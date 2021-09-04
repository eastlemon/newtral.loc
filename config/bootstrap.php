<?php
namespace app\config;

use yii\base\BootstrapInterface;

class Bootstrap implements BootstrapInterface
{
    public function bootstrap($app)
	{
        $container = \Yii::$container;

        $container->setDefinitions([
            \yii\widgets\LinkPager::class => \yii\bootstrap4\LinkPager::class,
        ]);
	}
}