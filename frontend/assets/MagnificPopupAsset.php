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
class MagnificPopupAsset extends AssetBundle
{
    public $sourcePath = '@bower/magnific-popup';

    public $css = [
        'dist/magnific-popup.css',
    ];
    public $js = [
        'dist/jquery.magnific-popup.min.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
