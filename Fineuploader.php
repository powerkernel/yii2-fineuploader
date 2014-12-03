<?php
/**
 * @author: Harry Tang (giaduy@gmail.com)
 * @link: http://www.greyneuron.com
 * @copyright: Grey Neuron
 */

namespace harrytang\fineuploader;


use yii\base\Widget;
use yii\helpers\Json;
use yii\web\View;

class Fineuploader extends Widget
{

    public $selector = '.uploader';
    public $options = array();
    public $events = array();
    public $default_events = array(
        'autoRetry'=>'',
        'cancel'=>'',
        'complete'=>'',
        'allComplete'=>'',
        'delete'=>'',
        'deleteComplete'=>'',
        'error'=>'',
        'manualRetry'=>'',
        'pasteReceived'=>'',
        'progress'=>'',
        'resume'=>'',
        'sessionRequestComplete'=>'',
        'statusChange'=>'',
        'submit'=>'',
        'submitDelete'=>'',
        'submitted'=>'',
        'totalProgress'=>'',
        'upload'=>'',
        'uploadChunk'=>'',
        'uploadChunkSuccess'=>'',
        'validate'=>'',
        'validateBatch'=>'',
    );

    public function init(){
        parent::init();
        $this->events=array_merge($this->default_events, $this->events);
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        $this->registerPlugin();
        $this->registerJS();
    }

    /**
     * Registers plugin and the related events
     */
    protected function registerPlugin()
    {
        $view = $this->getView();
        FineuploaderAsset::register($view);
    }

    /**
     * Register JS
     */
    protected function registerJS()
    {
        $options = Json::encode($this->options);
        $script = <<<EOD
$("{$this->selector}").fineUploader({$options})
.on("autoRetry", function(event, id, name){{$this->events['autoRetry']}})
.on("cancel", function(event, id, name){{$this->events['cancel']}})
.on("complete", function(event, id, name, responseJSON){{$this->events['complete']}})
.on("allComplete", function(event, id, name){{$this->events['allComplete']}})
.on("delete", function(event, id, name){{$this->events['delete']}})
.on("deleteComplete", function(event, id, name){{$this->events['deleteComplete']}})
.on("error", function(event, id, name){{$this->events['error']}})
.on("manualRetry", function(event, id, name){{$this->events['manualRetry']}})
.on("pasteReceived", function(event, id, name){{$this->events['pasteReceived']}})
.on("progress", function(event, id, name){{$this->events['progress']}})
.on("resume", function(event, id, name){{$this->events['resume']}})
.on("sessionRequestComplete", function(event, id, name){{$this->events['sessionRequestComplete']}})
.on("submit", function(event, id, name){{$this->events['submit']}})
.on("submitDelete", function(event, id, name){{$this->events['submitDelete']}})
.on("submitted", function(event, id, name){{$this->events['submitted']}})
.on("totalProgress", function(event, id, name){{$this->events['totalProgress']}})
.on("upload", function(event, id, name){{$this->events['upload']}})
.on("uploadChunk", function(event, id, name){{$this->events['uploadChunk']}})
.on("uploadChunkSuccess", function(event, id, name){{$this->events['uploadChunkSuccess']}})
.on("validate", function(event, id, name){{$this->events['validate']}})
.on("validateBatch", function(event, id, name){{$this->events['validateBatch']}})
EOD;
        $this->getView()->registerJs($script, View::POS_READY, __CLASS__.$this->selector);
        
    }
} 