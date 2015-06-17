Yii2 Fine Uploader
==================
Yii2 Fine Uploader

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist harrytang/yii2-fineuploader "*"
```

or add

```
"harrytang/yii2-fineuploader": "*"
```

to the require section of your `composer.json` file.

VIEW FILE
---------
```
<div class="uploader"></div>
<div>
    <script type="text/template" id="qq-template">
        <div class="qq-uploader-selector qq-uploader">
            <div class="qq-upload-drop-area-selector qq-upload-drop-area" qq-hide-dropzone>
                <span>Drop images here to upload</span>
            </div>
            <div class="qq-upload-button-selector qq-upload-button btn btn-default" style="width: auto;">
                <span class="glyphicon glyphicon-upload"
                      aria-hidden="true"></span>Add images
            </div>
            <span class="qq-drop-processing-selector qq-drop-processing">
                <span>Processing dropped files...</span>
                <span class="qq-drop-processing-spinner-selector qq-drop-processing-spinner"></span>
            </span>
            <ul class="qq-upload-list-selector qq-upload-list">
                <li>
                    <div class="qq-progress-bar-container-selector">
                        <div class="qq-progress-bar-selector qq-progress-bar"></div>
                    </div>
                    <span class="qq-upload-spinner-selector qq-upload-spinner"></span>
                    <span class="qq-edit-filename-icon-selector qq-edit-filename-icon"></span>
                    <span class="qq-upload-file-selector qq-upload-file"></span>
                    <input class="qq-edit-filename-selector qq-edit-filename" tabindex="0" type="text">
                    <span class="qq-upload-size-selector qq-upload-size"></span>
                    <a class="qq-upload-cancel-selector qq-upload-cancel"
                       href="#">Cancel</a>
                    <a class="qq-upload-retry-selector qq-upload-retry"
                       href="#">Retry</a>
                    <a class="qq-upload-delete-selector qq-upload-delete"
                       href="#">Delete</a>
                    <span class="qq-upload-status-text-selector qq-upload-status-text"></span>
                </li>
            </ul>
        </div>
    </script>
</div>

<?= harrytang\fineuploader\Fineuploader::widget([
        'options' => [
            'request' => [
                'endpoint' => Yii::$app->urlManager->createUrl(['/your-handler']),
                'params' => [Yii::$app->request->csrfParam => Yii::$app->request->csrfToken]
            ],
            'validation' => [
                'allowedExtensions' => ['jpeg', 'jpg', 'png', 'bmp', 'gif'],
            ],
            'classes' => [
                'success' => 'alert alert-success hidden',
                'fail' => 'alert alert-error'
            ]
        ],
        //'events' => [
        //    'allComplete' => '$("#loading").modal("hide"); ',
        //]
    ])
?>
```

CONTROLLER
----------

```
public function actionUploading($id)
    {

        $uploader = new FineuploaderHandler();
        $uploader->allowedExtensions = ['jpeg', 'jpg', 'png', 'bmp', 'gif']; // all files types allowed by default
        $uploader->sizeLimit = YOUR_PHP_MaxFileSizeLimit;
        $uploader->inputName = "qqfile"; // matches Fine Uploader's default inputName value by default
        //$uploader->chunksFolder = "chunks";
        if (Yii::$app->request->isPost) {
            // upload file
            $result = $uploader->handleUpload(UPLOAD DIR);
            if (isset($result['success']) && $result['success'] == true) {
                // do something more
            }
            echo json_encode($result);            
        }
    }
```

Note
----
npm install -g grunt-cli
npm install -g grunt
npm install
grunt package