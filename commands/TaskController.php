<?php


namespace app\commands;

use app\models\mail\TaskMailer;
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
        /**
         * @var Tasks[] $tasks
         */
        $tasks = Tasks::find()
            /*->where('DATEDIFF (NOW(), tasks.deadline) <= 1')
            ->all();*/
            ->where(['>=', 'deadline', $currentDate])
            ->andWhere(['<=', 'deadline', $criticalDate])
            ->with('responsible')
            ->all();

        $sendedMailCount = 0;
        $mailer = new TaskMailer();
        foreach ($tasks as $task) {
            $mailer->send(
                $task->responsible->email,
                ['ceo@admin.ru' => 'CEO'],
                'Deadline is coming!',
                'Come back to AI Task Manager and hurry up to complete your task! Less than 1 day available!'
            );
            $sendedMailCount += 1;
        }
        echo "Количество отправленных писем: {$sendedMailCount}";
    }
}