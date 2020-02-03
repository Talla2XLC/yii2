<?php

namespace app\controllers;

use app\models\filters\TaskSearch;
use app\models\tables\Priority;
use app\models\tables\Status;
use app\models\tables\Users;
use app\models\TaskForm;
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

		$searchModel = new TaskSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		Yii::$app->db->cache(function () use ($dataProvider) {
			return $dataProvider->prepare();
		}, 3600);

		if (!$model->validate()) {
			$error = $model->getErrors();
			print_r($error);exit;
		} else {
			return $this->render('index', [
				'title' => Yii::t('app', 'tasks_collection_header'),
				'searchModel' => $searchModel,
				'dataProvider' => $dataProvider,
                'monthList' => TasksCollection::getMonthList()
			]);
		}
	}

	public function actionFull($id) {
		return $this->render('full_task', [
			'title' => Yii::t('app', 'task_full_header'),
			'task' => TasksCollection::getTask($id),
		]);
	}

	public function actionInfo() {
		return $this->render('task_info', [
			'title' => 'Описание задания',
		]);
	}

	public function actionCreate() {
		$model = new TaskForm();

		if ($model->load(Yii::$app->request->post()) && $model->createTask()) {
			return $this->redirect('index.php?r=task/index');
		}

		return $this->render('task_create', [
			'title' => Yii::t('app', 'task_create_header'),
			'arrUsers' => ArrayHelper::map(Users::find()->all(), 'id', 'name'),
			'currentUser' => [Yii::$app->user->identity->id => Yii::$app->user->identity->name],
			'arrPriority' => ArrayHelper::map(Priority::find()->all(), 'id', 'name'),
			'arrStatus' => ArrayHelper::map(Status::find()->all(), 'id', 'name'),
			'model' => $model,
		]);
	}

	public function actionEdit($id) {
		$model = new TaskForm();

		if ($model->load(Yii::$app->request->post()) && $model->editTask()) {
			return $this->redirect('index.php?r=task/index');
		}

		return $this->render('task_edit', [
			'title' => Yii::t('app', 'task_edit_header'),
			'task' => TasksCollection::getTask($id),
			'arrUsers' => ArrayHelper::map(Users::find()->all(), 'id', 'name'),
			'currentUser' => [Yii::$app->user->identity->id => Yii::$app->user->identity->name],
			'arrPriority' => ArrayHelper::map(Priority::find()->all(), 'id', 'name'),
			'arrStatus' => ArrayHelper::map(Status::find()->all(), 'id', 'name'),
			'model' => $model,
		]);
	}
}