<?php


namespace app\controllers;


use app\models\Language;
use yii\web\Controller;

class LangController extends Controller
{
    public function actionEn()
    {
        Language::setEnLang();
        $this->redirect(\Yii::$app->request->referrer);
    }

    public function actionRu()
    {
        Language::setRuLang();
        $this->redirect(\Yii::$app->request->referrer);
    }
}