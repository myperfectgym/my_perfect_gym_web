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
class Select2Asset extends AssetBundle
{
    public $sourcePath = '@bower/select2';

    public $css = [
        'dist/css/select2.css',
    ];
    public $js = [
        'dist/js/select2.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
