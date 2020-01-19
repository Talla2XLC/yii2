<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%priority}}`.
 */
class m200119_142716_create_priority_table extends Migration {
	/**
	 * {@inheritdoc}
	 */
	public function safeUp() {
		$this->createTable('{{%priority}}', [
			'id' => $this->primaryKey(),
			'name' => $this->string(50)->notNull(),
		]);

		$this->batchInsert('{{%priority}}', [
			'name',
		], [
			['major'],
			['medium'],
			['minor'],
		]);
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown() {
		$this->dropTable('{{%priority}}');
	}
}
