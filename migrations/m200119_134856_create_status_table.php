<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%status}}`.
 */
class m200119_134856_create_status_table extends Migration {
	/**
	 * {@inheritdoc}
	 */
	public function safeUp() {
		$this->createTable('{{%status}}', [
			'id' => $this->primaryKey(),
			'name' => $this->string(50)->notNull(),
		]);

		$this->batchInsert('{{%status}}', [
			'name',
		], [
			['opened'],
			['in progress'],
			['completed'],
			['overdue'],
		]);
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown() {
		$this->dropTable('{{%status}}');
	}
}
