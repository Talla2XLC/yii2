<?php

namespace app\models;

use app\models\tables\Users;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class RegisterForm extends Model {
	public $username;
	public $password;
	public $name;

	/**
	 * @return array the validation rules.
	 */
	public function rules() {
		return [
			// username and password are both required
			[['username', 'password', 'name'], 'required'],
			// password validation
			['password', 'string', 'max' => 10],
			['username', 'validateUser'],
		];
	}

	public function validateUser($attribute, $params) {
		if (!$this->hasErrors()) {
			if (Users::find()->where(['username' => $this->username])->exists()) {
				$this->addError($attribute, 'Такой пользователь уже существует');
			}
		}
	}

	/**
	 * Regiaster new user using the provided username, password and name.
	 * @return bool whether the user is register in successfully
	 */
	public function register() {
		if ($this->validate() && !Users::find()->where(['username' => $this->username])->exists()) {
			$newUser = new Users([
				'username' => $this->username,
				'password' => $this->password,
				'name' => $this->name,
			]);

			return $newUser->save();
		}
		return false;
	}
}
