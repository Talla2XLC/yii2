<div class="title-top flex-row">
	<h1><?=$title?></h1>
	<a class="btn btn-lg btn-info" href="index.php?r=task">Назад</a>
</div>
<div
class="
	task-container
	big-task
	flex-row
	<?if ($task['status_id'] == 4): ?>
	<?='red'?>
	<?elseif ($task['status_id'] == 3): ?>
	<?='grey'?>
	<?elseif ($task['status_id'] == 2): ?>
	<?='yellow'?>
	<?elseif ($task['status_id'] == 1): ?>
	<?='green'?>
	<?endif;?>
">
	<div class="task-info flex-row">
		<div class="task-info-tag flex-column">
			<p>Номер задания:</p>
			<p>Приоритет:</p>
			<p>Выполнить до:</p>
			<p>Назначил:</p>
			<p>Ответственный:</p>
			<p>Статус:</p>
		</div>

		<div class="task-info-value flex-column">
			<p><?=$task['id']?></p>
			<p><?=$task->priority['name']?></p>
			<p><?=$task['deadline']?></p>
			<p><?=$task['creator_id']?></p>
			<p><?=$task['responsible_id']?></p>
			<p><?=$task->status['name']?></p>
		</div>
	</div>
	<div class="task-desc flex-column">
		<span>Описание: </span>
		<p><?=$task['description']?></p>
	</div>
</div>