<?php

namespace app\models;
use app\models\tables\Tasks;
use app\models\validation\TaskValidator;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class TasksCollection extends Model {
	public $test;

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

	public function getDataProvider() {
		$query = Tasks::find()->where(['or',
			['creator_id' => \Yii::$app->user->identity->id],
			['responsible_id' => \Yii::$app->user->identity->id],
		]);

		return $dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);
	}
}