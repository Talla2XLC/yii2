<?php

namespace app\controllers;
use app\models\TasksCollection;
use yii\web\Controller;

class TaskController extends Controller {
	public function actionIndex() {
		$model = new TasksCollection();

		$allTasks = $model::getAllTasks();

		return $this->render('index', [
			'title' => 'All Available Tasks',
			'allTasks' => $allTasks,
		]);
	}

	public function actionFull($id) {
		$model = new TasksCollection();

		$task = $model::getTask($id);

		return $this->render('full_task', [
			'title' => 'Task # ' . $id,
			'task' => $task,
		]);
	}
}