<?php

namespace app\models\tables;

use \yii\db\ActiveRecord;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 */
class Users extends ActiveRecord {
	/**
	 * {@inheritdoc}
	 */
	public static function tableName() {
		return 'users';
	}

	public function behaviors() {
		return [
			'timestamp' => [
				'class' => 'yii\behaviors\TimestampBehavior',
				'attributes' => [
					ActiveRecord::EVENT_BEFORE_INSERT => ['create_date', 'modified_date'],
					ActiveRecord::EVENT_BEFORE_UPDATE => ['modified_date'],
				],
				'value' => function () {return date('Y-m-d');},
			],
		];
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
			'modified_date' => 'Modified_date',
			'create_date' => 'Create_date',
		];
	}

	public function fields() {
		return [
			'id',
			'username' => 'username',
			'password',
			'modified_date',
			'create_date',
		];
	}
}
