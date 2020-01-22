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

	private $_user = false;

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
			$isAlreadyExist = $this->isUserAlreadyExist();

			if ($isAlreadyExist) {
				$this->addError($attribute, 'Такой пользователь уже существует');
			}
		}
	}

	/**
	 * Regiaster new user using the provided username, password and name.
	 * @return bool whether the user is register in successfully
	 */
	public function register() {
		if ($this->validate() && !$this->isUserAlreadyExist()) {
			$newUser = new Users([
				'username' => $this->username,
				'password' => $this->password,
				'name' => $this->name,
			]);

			return $newUser->save();
		}
		return false;
	}

	public function isUserAlreadyExist() {
		if (User::findByUsername($this->username)) {
			return true;
		}
		return false;
	}
}
