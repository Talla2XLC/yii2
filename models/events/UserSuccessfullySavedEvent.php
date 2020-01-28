<?php

namespace app\models\events;
use yii\base\Event;

class UserSuccessfullySavedEvent extends Event {
	public $userId;
}