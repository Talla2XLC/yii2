<?php

namespace app\widgets;

use yii\base\Widget;

class TaskWidget extends Widget {
	public $task;

	public function run() {
		return $this->render('task-widget', ['task' => $this->task]);
	}
}