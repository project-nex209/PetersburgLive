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
//        'css/library/font-awesome.min.css',
//        'css/library/bootstrap.min.css',
//        'css/library/jquery-ui.min.css',
//        'css/library/owl.carousel.css',
//        'css/library/jquery.mb.YTPlayer.min.css',
//        'http://fonts.googleapis.com/css?family=Lato:300,400%7COpen+Sans:300,400,600',
//        'css/style.css',
        'css/site.css',
    ];
    public $js = [
//        'js/library/jquery-1.11.0.min.js',
//        'http://maps.google.com/maps/api/js?sensor=false',
//        'js/library/jquery-ui.min.js',
//        'js/library/bootstrap.min.js',
//        'js/library/owl.carousel.min.js',
//        'js/library/parallax.min.js',
//        'js/library/jquery.nicescroll.js',
//        'js/library/jquery.ui.touch-punch.min.js',
//        'js/library/jquery.mb.YTPlayer.min.js',
//        'js/library/SmoothScroll.js',
//        'js/script.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}