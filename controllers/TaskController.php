<?php

namespace app\controllers;
use app\models\AllTasks;
use yii\web\Controller;

class TaskController extends Controller {
	public function actionIndex() {
		$model = new AllTasks();

		return $this->render('index', [
			'title' => 'All Available Tasks',
			'allTasks' => $model::getAllTasks(),
		]);
	}

	public function actionFull($id) {
		$model = new AllTasks();

		$task = $model::getTask($id);

		return $this->render('fullTask', [
			'title' => 'Task # ' . $id,
			'task' => $task,
		]);
	}
}