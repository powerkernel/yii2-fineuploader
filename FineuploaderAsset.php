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
        'jquery.fineuploader-5.0.8/jquery.fineuploader-5.0.8.min.js'
    ];
    public $css = [
        'jquery.fineuploader-5.0.8/fineuploader-5.0.8.min.css',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];

} 