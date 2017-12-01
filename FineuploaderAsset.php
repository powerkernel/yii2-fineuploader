<?php
/**
 * @author Harry Tang <harry@powerkernel.com>
 * @link https://powerkernel.com
 * @copyright Copyright (c) 2017 Power Kernel
 */

namespace powerkernel\fineuploader;


use yii\web\AssetBundle;

/**
 * Class FineuploaderAsset
 * @package powerkernel\fineuploader
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
