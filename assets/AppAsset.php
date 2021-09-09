<?php
namespace app\assets;

class AppAsset extends \yii\web\AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/carousel.css',
        'css/site.css',
    ];
    public $js = [
        'js/megamenu.js',
        'js/scrollcounter.js',
        'js/plusminus.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
        'rmrevin\yii\fontawesome\CdnFreeAssetBundle',
    ];
}
