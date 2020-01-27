<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%tasks}}`.
 */
class m200127_191931_add_create_date_column_to_tasks_table extends Migration {
	/**
	 * {@inheritdoc}
	 */
	public function safeUp() {
		$this->addColumn('{{%tasks}}', 'create_date', $this->date());

		$this->update('{{%tasks}}', ['create_date' => '2020-01-27']);
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown() {
		$this->dropColumn('{{%tasks}}', 'create_date');
	}
}
