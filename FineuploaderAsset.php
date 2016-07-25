<?php
/**
 * @author Harry Tang <harry@modernkernel.com>
 * @link https://modernkernel.com
 * @copyright Copyright (c) 2016 Modern Kernel
 */

namespace modernkernel\fineuploader;


use yii\web\AssetBundle;

/**
 * Class FineuploaderAsset
 * @package harrytang\fineuploader
 */
class FineuploaderAsset extends AssetBundle
{

    public $sourcePath = '@npm/fine-uploader/jquery.fine-uploader';
    public $js = [
        'jquery.fine-uploader.min.js'
    ];
    public $css = [
        'fine-uploader-new.min.css',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];

} 