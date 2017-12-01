Yii2 Fine Uploader
==================
Fine Uploader extension for Yii2

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist powerkernel/yii2-fineuploader "*"
```

or add

```
"powerkernel/yii2-fineuploader": "*"
```

to the require section of your `composer.json` file.


Usage
-----
 
Once the extension is installed, simply use it in your code by :

**View**
```
<?= powerkernel\fineuploader\Fineuploader::widget([
    'options' => [
        'request' => [
            'endpoint' => Yii::$app->urlManager->createUrl(['/your-handler-url']),
            'params' => [Yii::$app->request->csrfParam => Yii::$app->request->csrfToken]
        ],
        'validation' => [
            'allowedExtensions' => ['jpeg', 'jpg', 'png', 'bmp', 'gif'],
        ],
        'classes' => [
            'success' => 'alert alert-success hidden',
            'fail' => 'alert alert-error'
        ],
        // other options like
        //'multiple'=>false,
        //'autoUpload'=>false
    ],
    //'events' => [
    //    'allComplete' => '$("#loading").modal("hide"); ',
    //]
])
?>
```

**Controller**
see https://github.com/FineUploader/php-traditional-server
