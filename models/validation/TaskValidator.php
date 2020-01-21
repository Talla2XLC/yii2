<?php
namespace app\models\validation;

use yii\validators\Validator;

class TaskValidator extends Validator {
	/**
	 * {@inheritdoc}
	 */
	public function validateAttribute($model, $attribute) {
		$value = $model->$attribute;

		if ($value > 10) {
			$model->addError($attribute, 'Больше 10!!!');
		}
	}
}
