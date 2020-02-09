<?php


namespace app\models\mail;

use yii\base\BaseObject;

class TaskMailer extends BaseObject
{
    public function send($to, $from = ['AI@mailer.ru' => 'AI'], $subject = 'New Task available!', $body = 'Come back to AI Task Manager and look up for your new task!')
    {
        \Yii::$app->mailer->compose()
            ->setTo($to)
            ->setFrom($from)
            ->setSubject($subject)
            ->setTextBody($body)
            ->send();
    }
}