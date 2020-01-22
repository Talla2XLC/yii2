<?php

namespace app\controllers;

use app\models\Lession;
use yii\web\Controller;

class WidgetController extends Controller {
	public function actionIndex() {
		$model = new Lession();
		return $this->render('index', ['model' => $model]);
	}
}