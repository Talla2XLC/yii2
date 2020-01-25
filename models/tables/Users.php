<?php

namespace app\models\tables;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 */
class Users extends \yii\db\ActiveRecord {
	/**
	 * {@inheritdoc}
	 */
	public static function tableName() {
		return 'users';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules() {
		return [
			[['username', 'password'], 'required'],
			[['username', 'password'], 'string', 'max' => 50],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels() {
		return [
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
		];
	}

	public function fields() {
		return [
			'id',
			'username' => 'username',
			'password',
		];
	}
}
