<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class SwissAsset extends AssetBundle
{
    public $sourcePath = '@backend/assets/swissAsset';

    public $css = [
        'css/styles/layout.css',
        'css/styles/bootstrap.css',
    ];
    public $js = [
        'js/scripts/jquery.min.js',
        'js/scripts/jquery.backtotop.js',
        'js/scripts/jquery.mobilemenu.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
