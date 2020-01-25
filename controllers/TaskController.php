<?php

namespace app\controllers;
use app\models\TasksCollection;
use yii\web\Controller;

class TaskController extends Controller {
	public function actionIndex() {
		$model = new TasksCollection();

		$model->setAttributes([
			'test' => 8,
		]);

		$dataProvider = $model::getDataProvider();

		if (!$model->validate()) {
			$error = $model->getErrors();
			print_r($error);exit;
		} else {
			return $this->render('index', [
				'title' => 'All Available Tasks',
				'dataProvider' => $dataProvider,
			]);
		}
	}

	public function actionFull($id) {
		$task = TasksCollection::getTask($id);

		return $this->render('full_task', [
			'title' => 'Task # ',
			'task' => $task,
		]);
	}

	public function actionInfo() {
		return $this->render('task_info', [
			'title' => 'Описание задания',
		]);
	}
}