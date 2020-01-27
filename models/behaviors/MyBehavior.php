<?php

namespace app\models\behaviors;
use yii\base\Behavior;

class MyBehavior extends Behavior{
	public $message = "Привет, я дружелюбное поведение";

	public function sendMessage(){
		echo $this->message;
	}
}