<a
	href="index.php?r=task/full&id=<?=$task['id']?>"
	class="
		task-container
		flex-row
		link
		side-margin
		<?if ($task->status_id == 4): ?>
		<?='bgc-red'?>
		<?elseif ($task->status_id == 3): ?>
		<?='bgc-grey'?>
		<?elseif ($task->status_id == 2): ?>
		<?='bgc-yellow'?>
		<?elseif ($task->status_id == 1): ?>
		<?='bgc-green'?>
		<?endif;?>
	">
		<div class="task-info flex-row">
			<div class="task-info-tag flex-column">
				<p><?=Yii::t('app', 'task_number')?>:</p>
				<p><?=Yii::t('app', 'task_priority')?>:</p>
				<p><?=Yii::t('app', 'task_deadline')?>:</p>
				<p><?=Yii::t('app', 'task_creator')?>:</p>
				<p><?=Yii::t('app', 'task_responsible')?>:</p>
				<p><?=Yii::t('app', 'task_status')?>:</p>
			</div>

			<div class="task-info-value flex-column">
				<p><?=$task->id?></p>
				<p><?=$task->priority->name?></p>
				<p><?=date_format(date_create($task->deadline), 'd.m.Y')?></p>
				<p><?=$task->creator->name?></p>
				<p><?=$task->responsible->name?></p>
				<p><?=$task->status->name?></p>
			</div>
		</div>
		<div class="task-desc flex-column">
			<span class="text-size1 text-bold"><?=$task->title?></span>
			<span><?=Yii::t('app', 'task_description')?>:</span>
			<p><?=$task->description?></p>
		</div>
	</a>