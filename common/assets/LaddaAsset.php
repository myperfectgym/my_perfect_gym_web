<?php

namespace common\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class LaddaAsset extends AssetBundle
{
    public $sourcePath = '@bower/ladda';

    public $css = [
        'dist/ladda.min.css'
    ];
    public $js = [
        'js/spin.js',
        'dist/ladda.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
