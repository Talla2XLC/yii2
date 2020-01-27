<div class="title-top flex-row">
	<h1><?=$title . $task->id?></h1>
	<a class="btn btn-lg btn-info" href="index.php?r=task">Назад</a>
</div>
<div
class="
	task-container
	big-task
	flex-row
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
		<div class="task-info-tag flex-column jc-sa">
			<p>Номер задания:</p>
			<p>Приоритет:</p>
			<p>Выполнить до:</p>
			<p>Назначил:</p>
			<p>Ответственный:</p>
			<p>Статус:</p>
		</div>

		<div class="task-info-value flex-column jc-sa">
			<p><?=$task->id?></p>
			<p><?=$task->priority->name?></p>
			<p><?=$task->deadline?></p>
			<p><?=$task->creator->name?></p>
			<p><?=$task->responsible->name?></p>
			<p><?=$task->status->name?></p>
		</div>
	</div>
	<div class="task-desc flex-column jc-sa">
		<span class="text-size3 text-bold"><?=$task->title?></span>
		<div class="task-desc-text flex-column ai-c fb-20">
			<span class="flex-grow">Описание: </span>
			<p><?=$task->description?></p>
		</div>
	</div>
</div>
<div class="add-task-container flex-row jc-c center">
	<a class="btn btn-lg btn-primary" href="index.php?r=task/edit&id=<?=$task['id']?>">Изменить задание</a>
</div>