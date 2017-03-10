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
class AppAsset extends AssetBundle
{
    public $baseUrl = '@web';
	public $sourcePath = '@app/assets';

    public $css = [
      //  'css/site.css',
		'css/main.css',
		'css/index.css',
    ];
    public $js = [
	    //'js/jquery-1.11.3.min.js',
		//'js/jquery.validate.min.js',
		//'js/jquery.inputmask.js',
		//'js/jquery.color-2.1.2.min.js',
		
	    'js/main.js',
		//'js/index.js',
		
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
