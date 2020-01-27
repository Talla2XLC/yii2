<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%users}}`.
 */
class m200127_192237_add_create_date_column_to_users_table extends Migration {
	/**
	 * {@inheritdoc}
	 */
	public function safeUp() {
		$this->addColumn('{{%users}}', 'create_date', $this->date());
		$this->update('{{%users}}', ['create_date' => '2020-01-27']);
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown() {
		$this->dropColumn('{{%users}}', 'create_date');
	}
}
