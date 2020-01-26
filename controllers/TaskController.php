<?php

namespace app\controllers;
use app\models\NewTaskForm;
use app\models\tables\Priority;
use app\models\tables\Status;
use app\models\tables\Users;
use app\models\TasksCollection;
use Yii;
use yii\helpers\ArrayHelper;
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
		return $this->render('full_task', [
			'title' => 'Task # ',
			'task' => TasksCollection::getTask($id),
		]);
	}

	public function actionInfo() {
		return $this->render('task_info', [
			'title' => 'Описание задания',
		]);
	}

	public function actionCreate() {
		$model = new NewTaskForm();
		if ($model->load(Yii::$app->request->post()) && $model->createTask()) {
			return $this->goBack();
		}

		return $this->render('task_create', [
			'title' => 'Описание задания',
			'arrUsers' => ArrayHelper::map(Users::find()->all(), 'id', 'name'),
			'arrPriority' => ArrayHelper::map(Priority::find()->all(), 'id', 'name'),
			'arrStatus' => ArrayHelper::map(Status::find()->all(), 'id', 'name'),
			'model' => $model,
		]);
	}
}