<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m200119_135752_create_users_table extends Migration {
	/**
	 * {@inheritdoc}
	 */
	public function safeUp() {
		$this->createTable('{{%users}}', [
			'id' => $this->primaryKey(),
			'username' => $this->string(50)->notNull(),
			'password' => $this->string(50)->notNull(),
			'name' => $this->string(50)->notNull(),
			'email' => $this->string(50)->notNull(),
		]);

		$this->batchInsert('{{%users}}', [
			'username', 'password', 'name', 'email',
		], [
			['admin', 'admin', 'CEO', 'admin@ai.com'],
			['AI', 'MMMMMM', 'Alexey Ivanov', 'mmm-appp@mail.ru'],
			['Employee', '123', 'Ushat Pomoev', 'ushat.pomoev@ai.com'],
		]);
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown() {
		$this->dropTable('{{%users}}');
	}
}
