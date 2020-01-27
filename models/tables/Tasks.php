<?php

namespace app\models\tables;

use Yii;

/**
 * This is the model class for table "Tasks".
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property int|null $creator_id
 * @property int|null $responsible_id
 * @property int|null $priority
 * @property string|null $deadline
 * @property int|null $status_id
 * @property Test $status
 */
class Tasks extends \yii\db\ActiveRecord {
	/**
	 * {@inheritdoc}
	 */
	public static function tableName() {
		return 'Tasks';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules() {
		return [
			[['title'], 'required'],
			[['creator_id', 'responsible_id', 'status_id'], 'integer'],
			[['deadline'], 'safe'],
			[['title'], 'string', 'max' => 50],
			[['description'], 'string', 'max' => 255],
		];
	}

	public function getStatus() {
		return $this->hasOne(Status::class, ['id' => 'status_id']);
	}

	public function getPriority() {
		return $this->hasOne(Priority::class, ['id' => 'priority_id']);
	}

	public function getResponsible() {
		return $this->hasOne(Users::class, ['id' => 'responsible_id']);
	}

	public function getCreator() {
		return $this->hasOne(Users::class, ['id' => 'creator_id']);
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels() {
		return [
			'id' => 'ID',
			'title' => 'Title',
			'description' => 'Description',
			'creator_id' => 'Creator ID',
			'responsible_id' => 'Responsible ID',
			'priority' => 'Priority',
			'deadline' => 'Deadline',
			'status_id' => 'Status ID',
		];
	}
}
