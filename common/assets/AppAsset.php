<?php
namespace common\assets;

use yii\web\AssetBundle;


class AppAsset extends AssetBundle
{
    public $sourcePath = '@common/assets/css';
    public $css = [
        'app/style.css',
        'app/style.css',
        'app/bootstrap.css',

        'app/course/course.css',
        'app/course/courses.css',
        'app/course/main.css',

        'app/bootstrap.min.css',
        'app/animate.css',
        'app/animate.css',
        'app/plugins/dropzone/basic.css',
        'app/plugins/dropzone/dropzone.css',
        'app/plugins/jasny/jasny-bootstrap.min.css',
        'app/plugins/codemirror/codemirror.css',
    ];

    public $js = [
        'js/app.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset'
    ];
}