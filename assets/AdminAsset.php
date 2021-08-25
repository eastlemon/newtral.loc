<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Class AdminAsset
 *
 * @package app\assets
 */
class AdminAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $basePath = '@webroot';

    /**
     * @var string
     */
    public $baseUrl = '@web';

    /**
     * @var array
     */
    public $css = [
        'css/admin.css',
        'css/navbar-fixed-side.css',
    ];
    public $js = [
        'js/admin.js'
    ];

    /**
     * @var array
     */
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'rmrevin\yii\fontawesome\CdnFreeAssetBundle',
    ];
}
