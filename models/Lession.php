<?php

namespace app\models;
use yii\base\Model;

class Lession extends Model {
	public $name;
	public $description;
	public $order;

	public function rules() {
		return [
			[['name', 'description', 'order'], 'required'], //правило задаёт обязательные поля
			[['name', 'description'], 'string', 'max' => 10], //правило проверяет являются ли name и description строками
			[['order'], 'myValidate'], //правило проверяет является ли order числом
		];
	}

	public function attributeLabels() {
		return [
			'name' => 'Название',
		];
	}

	public function validated() {
		if ($this->validate()) {
			return true;
		} else {
			$errors = $this->getErrors();
			$answ = '';
			foreach ($errors as $error => $message) {
				$answ = $answ . $error . ' ' . implode($message);
			}
			return $answ;
		}
	}

	public function myValidate($attrName, $params) {
		if ($this->$attrName > 10) {
			$this->addError($attrName, 'Больше 10!!!');
		}
	}
}