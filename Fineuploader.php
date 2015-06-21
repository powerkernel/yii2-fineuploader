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

    public $dropLabel='Drop here.';
    public $dropProcessingLabel='Processing dropped file(s)...';

    public $buttonIcon='glyphicon glyphicon-open';
    public $buttonLabel='Add File(s)';
    public $cancelLabel='Cancel';
    public $retryLabel='Retry';
    public $deleteLabel='Delete';


    public $options = array();
    public $default_options = array(
        'template'=>'qq-template'
    );
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
        $this->options=array_merge($this->default_options, $this->options);
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        $this->registerPlugin();
        $this->registerJS();
        echo <<<EOB
<div>
    <script type="text/template" id="{$this->options['template']}">
        <div class="qq-uploader-selector qq-uploader">
            <div class="qq-upload-drop-area-selector qq-upload-drop-area " qq-hide-dropzone>
                <span>{$this->dropLabel}</span>
            </div>

            <div class="qq-upload-button-selector qq-upload-button btn btn-info" style="width: auto;">
                <span class="{$this->buttonIcon}" aria-hidden="true"></span> {$this->buttonLabel}
            </div>

            <span class="qq-drop-processing-selector qq-drop-processing">
                <span>{$this->dropProcessingLabel}</span>
                <span class="qq-drop-processing-spinner-selector qq-drop-processing-spinner"></span>
            </span>

            <ul class="qq-upload-list-selector qq-upload-list margin-top-md">
                <li class="alert alert-info margin-bottom-lg">
                    <div class="qq-progress-bar-container-selector">
                        <div class="qq-progress-bar-selector qq-progress-bar"></div>
                    </div>

                    <span class="qq-upload-spinner-selector qq-upload-spinner"></span>
                    <span class="qq-edit-filename-icon-selector qq-edit-filename-icon"></span>
                    <span class="qq-upload-file-selector qq-upload-file"></span>
                    <input class="qq-edit-filename-selector qq-edit-filename" tabindex="0" type="text"/>
                    <span class="qq-upload-size-selector qq-upload-size"></span>

                    <a class="qq-upload-cancel-selector qq-upload-cancel" href="#">{$this->cancelLabel}</a>
                    <a class="qq-upload-retry-selector qq-upload-retry" href="#">{$this->retryLabel}</a>
                    <a class="qq-upload-delete-selector qq-upload-delete" href="#">{$this->deleteLabel}</a>

                    <span class="qq-upload-status-text-selector qq-upload-status-text"></span>
                </li>
            </ul>
        </div>
    </script>
</div>
EOB;
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