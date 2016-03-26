<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/core.css',
        'css/components.css',
        'css/icons.css',
        'css/pages.css',
        'css/responsive.css',
        'css/site.css',
        'css/menu.css'
    ];
    public $js = [
        'js/detect.js',
        'js/fastclick.js',
        'js/jquery.blockUI.js',
        'js/jquery.core.js',
        'js/jquery.nicescroll.js',
        'js/jquery.scrollTo.min.js',
        'js/jquery.slimscroll.js',
        'js/waves.js',
        'js/wow.min.js',
        'js/jquery.core.js',
        'js/jquery.app.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
