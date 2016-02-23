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
class JqueryQIAssets extends AssetBundle
{
    public $basePath = '@webroot/plugins';
    public $baseUrl = '@web/plugins';
    public $css = [
    ];
    public $js = [
        'jquery-ui/jquery-ui.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
