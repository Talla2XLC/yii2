<?php

namespace app\widgets;

use app\models\tables\Tasks;
use yii\base\Widget;

class TaskWidget extends Widget {
	public $task;

	public function run() {
		if (is_a($this->task, Tasks::class)) {
			return $this->render('task-widget', ['task' => $this->task]);
		}
		throw new \Exception("Неправильный объект");
	}
}