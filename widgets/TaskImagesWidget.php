<?php

namespace app\widgets;

use app\models\tables\Tasks;
use yii\base\Widget;

class TaskImagesWidget extends Widget {
    public $task;
    public $images;

    public function run() {
        if (is_a($this->task, Tasks::class)) {
            return $this->images ? $this->render('task-images-widget', ['id' => $this->task->id, 'images' => $this->images]) : null;
        }
        throw new \Exception("Неправильный объект");
    }
}