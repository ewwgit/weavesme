<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAssetCustomer extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
            'css/customer/animate.css',
    		'css/customer/bootstrap.min.css',
    		'css/customer/font-awesome.min.css',
    		'css/customer/responsive.css',
    		'css/customer/style.css',
    		'js/customer/owl.carousel/owl.carousel.css',
    ];
    public $js = [
    		'js/customer/bootstrap.min.js',
    		'js/customer/jquery-1.11.1.min.js',
    		'js/customer/modernizr.js',
    		'js/customer/own-menu.js',
    		'js/customer/theme-script.js',
    		'js/customer/wow.min.js',
    		'js/customer/owl.carousel/owl.carousel.js',
    		'js/customer/owl.carousel/owl.carousel.min.js',
    		'css/customer/menus/css/select2/js/select2.min.js',
    		'css/customer/menus/js/jquery-ui.min.js',
    		'css/customer/menus/js/theme-script.js',
    		'css/customer/menus/js/simpleMobileMenu.js',
    		
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
