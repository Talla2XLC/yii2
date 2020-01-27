<?php

namespace app\controllers;
use app\models\RegisterForm;
use yii\base\Event;
use yii\web\Controller;

class EventController extends Controller {
	public function actionIndex() {
		$model = new RegisterForm([
			'username' => 'Pupkin' . rand(),
			'password' => 'qwerty',
			'confirm' => 'qwerty',
			'name' => 'Pupkin' . rand(),
			'email' => '123@123.ru',
		]);

		$model2 = new RegisterForm([
			'username' => 'Pupkin' . rand(),
			'password' => 'qwerty',
			'confirm' => 'qwerty',
			'name' => 'Pupkin' . rand(),
			'email' => '123@123.ru',
		]);

		$model->on(
			RegisterForm::EVENT_USER_SUCCESSFULLY_SAVED,
			function (Event $event) {
				var_dump($event);exit;
				echo "Пользователь подписан на рассылку!!!!";
			}
		); //обработчик для конкретного объекта класса

		$handler = function (Event $event) {
			var_dump($event);exit;
			echo "Пользователь подписан на рассылку!!!!";
		}		
		Event::on(RegisterForm::class, RegisterForm::EVENT_USER_SUCCESSFULLY_SAVED, $handler); //обработчик для всех экземпляров выбранного класса

		$model->register();
	}

	public function actionTest() {
		
		$model = new RegisterForm([
			'username' => 'Pupkin' . rand(),
			'password' => 'qwerty',
			'confirm' => 'qwerty',
			'name' => 'Pupkin' . rand(),
			'email' => '123@123.ru',
		]);

		$model->register();
	}
}