<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%tasks}}`.
 */
class m200127_191159_add_modified_date_column_to_tasks_table extends Migration {
	/**
	 * {@inheritdoc}
	 */
	public function safeUp() {
		$this->addColumn('{{%tasks}}', 'modified_date', $this->date());

		$this->update('{{%tasks}}', ['modified_date' => '2020-01-27']);
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown() {
		$this->dropColumn('{{%tasks}}', 'modified_date');
	}
}
