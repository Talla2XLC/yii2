<?php

namespace app\controllers;
use app\models\Lession;
use yii\web\Controller;

class TaskController extends Controller {
	public function actionIndex() {
		$model = new Lession();

		//передаём массив с аттрибутами
		$model->setAttributes([
			'name' => 'Lession1',
			'description' => '2123123',
			'order' => 8,
		]);

		if ($model->validated() === true) {
			return $this->render('index', [
				'title' => 'Hello!',
				'content' => 'Yii2 L1',
			]);
		} else {
			return $this->render('index', [
				'title' => 'Ошибка',
				'content' => $model->validated(),
			]);
		}

		//renderPartial отображает без layout
		//либо использовать $this->layout = false;
	}

	//?r=task/one&id=1
	public function actionOne($id = 1) {
		//$id = \Yii::$app->request->get('id');
		var_dump($id);
		exit;
	}
}