<?php

namespace app\models;
use yii\base\Model;

class AllTasks extends Model {
	private static $tasks = [
		'1' => [
			'id' => 1,
			'priority' => 'major',
			'date' => '24.01.2020',
			'place' => 'Gazprom HQ',
			'description' => 'Meeting with Gazprom managment',
		],
		'2' => [
			'id' => 2,
			'priority' => 'medium',
			'date' => '16.01.2020',
			'place' => 'office',
			'description' => 'Internal conference call',
		],
		'3' => [
			'id' => 3,
			'priority' => 'minor',
			'date' => '18.01.2020',
			'place' => 'home',
			'description' => 'Look for a new internet provider',
		],
	];

	public function getAllTasks() {
		return isset(self::$tasks) ? self::$tasks : null;
	}

	public function getTask($id) {
		return isset(self::$tasks[$id]) ? self::$tasks[$id] : null;
	}
}