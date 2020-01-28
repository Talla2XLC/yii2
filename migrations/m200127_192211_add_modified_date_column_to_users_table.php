<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%users}}`.
 */
class m200127_192211_add_modified_date_column_to_users_table extends Migration {
	/**
	 * {@inheritdoc}
	 */
	public function safeUp() {
		$this->addColumn('{{%users}}', 'modified_date', $this->date());
		$this->update('{{%users}}', ['modified_date' => '2020-01-27']);
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown() {
		$this->dropColumn('{{%users}}', 'modified_date');
	}
}
