<?php

namespace app\models;
use app\models\tables\Tasks;
use yii\base\Model;

class TasksCollection extends Model {
	private static $allTasks;

	public function __construct() {
		self::$allTasks = Tasks::find()->all();
	}

	public function getAllTasks() {
		return isset(self::$allTasks) ? self::$allTasks : null;
	}

	public function getTask($id) {
		$task = Tasks::findOne(['id' => $id]);
		return isset($task) ? $task : null;
	}
}