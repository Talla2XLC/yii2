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
class NewTaskForm extends Model {
	public $id;
	public $priority;
	public $deadline;
	public $creator_id;
	public $responsible_id;
	public $title;
	public $description;
	public $status;

	const TASK_USER_CREATE_FAILED = 'event_user_create_failed';
	const TASK_USER_SUCCESSFULLY_SAVED = 'event_user_successfully_saved';
	const TASK_USER_CREATE_START = 'event_user_create_start';
	const TASK_USER_CREATE_COMPLETE = 'event_user_create_complete';

	/**
	 * @return array the validation rules.
	 */
	public function rules() {
		return [
			// username and password are both required
			[['id', 'priority', 'deadline', 'creator_id', 'responsible_id', 'title', 'description', 'status'], 'required'],
			// password validation
			[['title'], 'string', 'max' => 20],
			[['description'], 'string'],
			[['deadline'], 'match', 'pattern' => '^([0]?[1-9]|[1|2][0-9]|[3][0|1])[./-]([0]?[1-9]|[1][0-2])[./-]([0-9]{4}|[0-9]{2})$', 'message' => 'Дата должна вводиться в формате ХХ.ХХ.ХХХХ'],
		];
	}

	public function createTask() {
		$this->trigger(static::EVENT_TASK_CREATE_START);
		if ($this->validate()) {
			$newTask = new Tasks([
				'id' => $this->id,
				'priority' => $this->priority,
				'deadline' => $this->deadline,
				'creator_id' => $this->creator_id,
				'responsible_id' => $this->responsible_id,
				'title' => $this->title,
				'description' => $this->description,
				'status' => $this->status,
			]);

			$newTask->save();
			$this->trigger(static::EVENT_TASK_SUCCESSFULLY_SAVED, $event);
			return $this->trigger(static::EVENT_TASK_CREATE_COMPLETE);
		}
		$this->trigger(static::EVENT_TASK_CREATE_FAILED);
		return false;
	}
}
