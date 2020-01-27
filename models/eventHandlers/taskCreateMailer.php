<?php

namespace app\models\eventHandlers;
use yii\base\Component;
use app\models\NewTaskForm;
use yii\base\Event;
use yii\base\BootstrapInterface;
use app\models\tables\Users;

class taskCreateMailer extends Component implements BootstrapInterface{
	public function bootstrap($app){
		$this->setTaskCreateListener();
	}
	public function setTaskCreateListener(){
		$handler = function (Event $event) {
			$user = Users::findOne($event->sender->responsible_id);
			// var_dump($user);exit;
			$this-> sendEmail($user);
		};
		Event::on(NewTaskForm::class, NewTaskForm::EVENT_TASK_SUCCESSFULLY_SAVED, $handler);

	}
	public function sendEmail($user){
		\Yii::$app->mailer->compose()
			->setTo($user->email)
			->setFrom([\Yii::$app->params['senderEmail'] => \Yii::$app->params['senderName']])
			->setReplyTo([$user->email => $user->name])
			->setSubject('New Task available!')
			->setTextBody('Come back to AI Task Manager and look up for your new task!')
			->send();
	}
	
}
