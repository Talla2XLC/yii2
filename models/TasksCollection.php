<?php

namespace app\models;
use app\models\tables\Tasks;
use app\models\validation\TaskValidator;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use Yii;

class TasksCollection extends Model
{
	public $test;

	public function rules() {
		return [
			[['test'], TaskValidator::class], //правило проверяет является ли order числом
		];
	}

	public static function getTask($id) {
		$task = Tasks::findOne(['id' => $id]);
		return isset($task) ? $task : null;
	}

    public static function getMonthList() {
        return [
            '' => Yii::t('app', 'all'),
            '1' => Yii::t('app', 'jan'),
            '2' => Yii::t('app', 'feb'),
            '3' => Yii::t('app', 'mar'),
            '4' => Yii::t('app', 'apr'),
            '5' => Yii::t('app', 'may'),
            '6' => Yii::t('app', 'jun'),
            '7' => Yii::t('app', 'jul'),
            '8' => Yii::t('app', 'aug'),
            '9' => Yii::t('app', 'sep'),
            '10' => Yii::t('app', 'oct'),
            '11' => Yii::t('app', 'nov'),
            '12' => Yii::t('app', 'dec'),
        ];
    }
}