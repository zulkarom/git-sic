<?php

namespace website\assets;

use yii\web\AssetBundle;

/**
 * Main website application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $sourcePath = '@website/views/myassets';

    public $css = [
        'css/bootstrap.min.css',
        'css/font-awesome.css',
        'js/owl-carousel/owl.carousel.css',
        'js/owl-carousel/owl.theme.css',
        'js/owl-carousel/owl.transitions.css',
        'css/magnific-popup.css',
        'css/animate.css',
        'css/etlinefont.css',
        'css/style.css',
    ];
    public $js = [

        'js/jquery-1.11.1.min.js',
        'js/bootstrap.min.js',
        'js/owl-carousel/owl.carousel.js',
        'js/jquery.flexslider-min.js',
        'js/jquery.magnific-popup.min.js',
        'js/easing.js',
        'js/jquery.easypiechart.js',
        'js/jquery.appear.js',
        'js/jquery.parallax-1.1.3.js',
        'js/jquery.mixitup.min.js',
        'js/custom.js',

    ];


    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
