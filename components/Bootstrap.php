<?php

namespace app\components;

use app\models\tables\Users;
use app\models\TaskForm;
use yii\base\BootstrapInterface;
use yii\base\Component;
use yii\base\Event;

class Bootstrap extends Component implements BootstrapInterface {
	public function bootstrap($app) {
		$this->setTaskCreateListener();
		$this->setLang();
	}
    protected function setTaskCreateListener() {
		$handler = function (Event $event) {
			$user = Users::findOne($event->sender->responsible_id);
			$this->sendEmail($user);
		};
		Event::on(TaskForm::class, TaskForm::EVENT_TASK_SUCCESSFULLY_SAVED, $handler);

	}
    protected function sendEmail($user) {
		\Yii::$app->mailer->compose()
			->setTo($user->email)
			->setFrom([\Yii::$app->params['senderEmail'] => \Yii::$app->params['senderName']])
			->setReplyTo([$user->email => $user->name])
			->setSubject('New Task available!')
			->setTextBody('Come back to AI Task Manager and look up for your new task!')
			->send();
	}

	protected function setLang(){
	    if($lang = \Yii::$app->session->get('lang')){
            \Yii::$app->language = $lang;
        }
    }
}