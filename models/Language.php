<?php


namespace app\models;


use yii\base\Model;

class Language extends Model
{
    public $lang;

    public function rules() {
        return [
            ['lang', 'safe']
        ];
    }

    static function startSession() {
        \Yii::$app->session->open();
        \Yii::$app->language = \Yii::$app->session->get('language');
    }

    static function setEnLang()
    {
        \Yii::$app->session->set('language', 'en');
        \Yii::$app->language = 'en';
    }

    static function setRuLang()
    {
        \Yii::$app->session->set('language', 'ru');
        \Yii::$app->language = 'ru';
    }
}