<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
            'css/site.css',
    		'css/bootstrap.min.css',
    		'css/font-awesome.min.css',
    		'css/style.css',
    ];
    public $js = [
    		//'js/bootstrap.min.js',
    		//'js/jquery-1.11.1.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
