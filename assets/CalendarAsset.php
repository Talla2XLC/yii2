<?php


namespace app\assets;


use yii\web\AssetBundle;

class CalendarAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'css/allTasks.css'
    ];
    public $js = [
    ];

    public $depends = [
    ];
}