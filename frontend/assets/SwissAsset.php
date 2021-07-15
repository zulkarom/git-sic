<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class SwissAsset extends AssetBundle
{
    public $sourcePath = '@frontend/assets/swissAsset';

    public $css = [
        'css/styles/layout.css',
        'css/styles/bootstrap.css',
        'menu/menu.css',
        'menu/hamburgers.min.css',
    ];
    public $js = [
        // 'js/scripts/jquery.min.js',
        'js/scripts/jquery.backtotop.js',
        //'js/scripts/jquery.mobilemenu.js',
        'menu/menu.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
