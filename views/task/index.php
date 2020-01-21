<h1><?=$title?></h1>
<?foreach ($allTasks as $task): ?>
	<a
	href="index.php?r=task/full&id=<?=$task['id']?>"
	class="
		task-container
		flex-row
		link
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
				<p><?=$task->creator['name']?></p>
				<p><?=$task->responsible['name']?></p>
				<p><?=$task->status['name']?></p>
			</div>
		</div>
		<div class="task-desc flex-column">
			<span>Описание: </span>
			<p><?=$task['description']?></p>
		</div>
	</a>
<?endforeach;?>
