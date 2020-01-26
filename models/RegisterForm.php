<?php

namespace app\models;

use app\models\events\UserSuccessfullySavedEvent;
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
	public $confirm;
	public $name;
	public $email;

	const EVENT_USER_CREATE_FAILED = 'event_user_create_failed';
	const EVENT_USER_SUCCESSFULLY_SAVED = 'event_user_successfully_saved';
	const EVENT_USER_CREATE_START = 'event_user_create_start';
	const EVENT_USER_CREATE_COMPLETE = 'event_user_create_complete';

	/**
	 * @return array the validation rules.
	 */
	public function rules() {
		return [
			// username and password are both required
			[['username', 'password', 'confirm', 'name', 'email'], 'required'],
			// password validation
			[['password', 'confirm'], 'string', 'max' => 10],
			['username', 'validateUser'],
			['password', 'passwordMatch'],
			['email', 'email'],
		];
	}

	public function validateUser($attribute, $params) {
		if (!$this->hasErrors()) {
			if (Users::find()->where(['username' => $this->username])->exists()) {
				$this->addError($attribute, 'Такой пользователь уже существует');
			}
		}
	}

	public function passwordMatch($attribute, $params) {
		if (!$this->hasErrors()) {
			if (!($this->password === $this->confirm)) {
				$this->addError($attribute, 'Пароль не совпадает');
			}
		}
	}

	/**
	 * Regiaster new user using the provided username, password and name.
	 * @return bool whether the user is register in successfully
	 */
	public function register() {
		$this->trigger(static::EVENT_USER_CREATE_START);
		// echo "начало работы \<br>";
		if ( /*$this->validate()*/1 == 1) {
			// echo "пользователь найден \<br>";
			$newUser = new Users([
				'username' => $this->username,
				'password' => $this->password,
				'name' => $this->name,
				'email' => $this->email,
			]);

			$newUser->save();
			// echo "пользователь сохранён \<br>";
			$event = new UserSuccessfullySavedEvent(['userId' => $newUser->id]);
			$this->trigger(static::EVENT_USER_SUCCESSFULLY_SAVED, $event);
			echo "метод завершён \<br>";
			return $this->trigger(static::EVENT_USER_CREATE_COMPLETE);
		}
		$this->trigger(static::EVENT_USER_CREATE_FAILED);
		return false;
	}
}
