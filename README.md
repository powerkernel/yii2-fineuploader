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
            ],
            //'multiple'=>false,
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