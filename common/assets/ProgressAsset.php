<?php

namespace common\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class ProgressAsset extends AssetBundle
{
    public $sourcePath = '@bower/progress.js';

    public $css = [
        'src/progressjs.css'
    ];
    public $js = [
        'src/progress.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
