<?php
/** 
 * @author: Harry Tang (giaduy@gmail.com)
 * @link: http://www.greyneuron.com 
 * @copyright: Grey Neuron
 */

namespace harrytang\fineuploader;


use yii\web\AssetBundle;

class FineuploaderAsset extends AssetBundle {

    public $sourcePath = '@harrytang/fineuploader/assets';
    public $js=[
        'jquery.fine-uploader/jquery.fine-uploader.min.js'
    ];
    public $css = [
        'jquery.fine-uploader/fine-uploader.min.css',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];

} 