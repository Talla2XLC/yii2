<?php


namespace app\commands;

use app\models\tables\Tasks;
use yii\console\Controller;
use Yii;

class TaskController extends Controller
{
    /**
     * Отправить оповещения о приближающемся дедлайне
     */
    public function actionDeadlineComing()
    {
        $currentDate = date('Y-m-d');
        $criticalDate = date('Y-m-d', strtotime("+1 day"));
        $tasks = Tasks::find()
            ->where(['>=', 'deadline', $currentDate])
            ->andWhere(['<', 'deadline', $criticalDate])
            ->all();

        $sendedMailCount = 0;
        foreach ($tasks as $task) {
            Yii::$app->mailer->compose()
                ->setTo($task->responsible->email)
                ->setFrom([\Yii::$app->params['senderEmail'] => \Yii::$app->params['senderName']])
                ->setReplyTo([$task->responsible->email => $task->responsible->name])
                ->setSubject('Deadline is coming!')
                ->setTextBody('Come back to AI Task Manager and hurry up to complete your task! Less than 1 day available!')
                ->send();
            $sendedMailCount += 1;
        }
        echo "Количество отправленных писем: {$sendedMailCount}";
    }
}