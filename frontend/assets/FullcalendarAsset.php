<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;


/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class FullcalendarAsset extends AssetBundle
{
    public $sourcePath = '@bower/fullcalendar';

    public $css = [
        'dist/fullcalendar.min.css',
    ];
    public $js = [
        'dist/fullcalendar.min.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
