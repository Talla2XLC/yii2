<?php

namespace app\models;

use app\models\tables\Tasks;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class TaskForm extends Model {
	public $id;
	public $priority_id;
	public $deadline;
	public $creator_id;
	public $responsible_id;
	public $title;
	public $description;
	public $status_id;

	const EVENT_TASK_CREATE_FAILED = 'event_task_create_failed';
	const EVENT_TASK_SUCCESSFULLY_SAVED = 'event_task_successfully_saved';
	const EVENT_TASK_CREATE_START = 'event_task_create_start';

	/**
	 * @return array the validation rules.
	 */
	public function rules() {
		return [
			[['priority_id', 'deadline', 'creator_id', 'responsible_id', 'title', 'description', 'status_id'], 'required'],
			['id', 'number'],
			[['title'], 'string', 'max' => 20],
			[['description'], 'string'],
			[['deadline'], 'date', 'format' => 'yyyy-MM-dd', 'message' => 'Дата должна вводиться в формате ХХХХ-ХХ-ХХ'],
		];
	}

	public function createTask() {
		$this->trigger(static::EVENT_TASK_CREATE_START);
		if ($this->validate()) {
			$newTask = new Tasks([
				'priority_id' => $this->priority_id,
				'deadline' => \Yii::$app->formatter->asDate($this->deadline, 'php:Y-m-d'),
				'creator_id' => $this->creator_id,
				'responsible_id' => $this->responsible_id,
				'title' => $this->title,
				'description' => $this->description,
				'status_id' => $this->status_id,
			]);

			$newTask->save();

			$this->trigger(static::EVENT_TASK_SUCCESSFULLY_SAVED, $event);
			return true;
		}
		$this->trigger(static::EVENT_TASK_CREATE_FAILED);
		return false;
	}

	public function editTask() {
		if ($this->validate()) {
			$task = Tasks::FindOne($this->id);

			$task->priority_id = $this->priority_id;
			$task->deadline = \Yii::$app->formatter->asDate($this->deadline, 'php:Y-m-d');
			$task->creator_id = $this->creator_id;
			$task->responsible_id = $this->responsible_id;
			$task->title = $this->title;
			$task->description = $this->description;
			$task->status_id = $this->status_id;

			$task->save();

			return true;
		}
		return false;
	}
}
