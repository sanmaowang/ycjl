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
class MobileAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'js/bootstrap/css/bootstrap.min.css',
        'css/mobile.css',
    ];
    public $js = [
        'js/bootstrap/js/bootstrap.min.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
