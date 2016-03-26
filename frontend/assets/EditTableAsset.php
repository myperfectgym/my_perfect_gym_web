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
class EditTableAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [

    ];
    public $js = [
        'plugins/magnific-popup/dist/jquery.magnific-popup.min.js',
        'plugins/jquery-datatables-editable/jquery.dataTables.js',
        'plugins/datatables/dataTables.bootstrap.js',
        'plugins/tiny-editable/mindmup-editabletable.js',
        'plugins/tiny-editable/numeric-input-example.js',
        'pages/datatables.editable.init.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}