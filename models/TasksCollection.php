<?php

namespace app\models;
use app\models\tables\Tasks;
use app\models\validation\TaskValidator;
use yii\base\Model;

class TasksCollection extends Model {
	public $test;

	/*public function __construct() {
		self::$allTasks = Tasks::find()->all();
	}*/

	public function rules() {
		return [
			[['test'], TaskValidator::class], //правило проверяет является ли order числом
		];
	}

	public function getAllTasks() {
		$allTasks = Tasks::find()->all();
		return isset($allTasks) ? $allTasks : null;
	}

	public function getTask($id) {
		$task = Tasks::findOne(['id' => $id]);
		return isset($task) ? $task : null;
	}
}