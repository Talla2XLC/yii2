<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tasks}}`.
 */
class m200119_110114_create_tasks_table extends Migration {
	/**
	 * {@inheritdoc}
	 */
	public function safeUp() {
		$this->createTable('{{%tasks}}', [
			'id' => $this->primaryKey(),
			'title' => $this->string(50)->notNull(),
			'description' => $this->string(),
			'creator_id' => $this->integer(),
			'responsible_id' => $this->integer(),
			'priority_id' => $this->integer(),
			'deadline' => $this->date(),
			'status_id' => $this->integer(),
		]);

		$this->batchInsert('{{%tasks}}', [
			'title', 'description', 'creator_id', 'responsible_id', 'priority_id', 'deadline', 'status_id',
		], [
			[
				'Gazprom meeting',
				'Meeting with Gazprom managment',
				'2',
				'3',
				'1',
				'24.01.2020',
				'1',
			],
			[
				'Intercall',
				'Internal conference call im Moscow office',
				'1',
				'2',
				'2',
				'16.01.2020',
				'3',
			],
			[
				'Change provider',
				'Look for a new internet provider for home PC',
				'2',
				'2',
				'3',
				'19.01.2020',
				'2',
			],
		]);
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown() {
		$this->dropTable('{{%tasks}}');
	}
}
