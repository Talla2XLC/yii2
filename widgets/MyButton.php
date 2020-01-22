<?php

namespace app\widgets

use yii\base\Widget;

class MyButton extends Widget{
	public $label = 'Нажми меня';

	public $attr = '';

	public function run(){
		return $this->render('my-button', ['attr' => $this->attr, 'label' => $this->label])
	}
}