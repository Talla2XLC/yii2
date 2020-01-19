<h1><?=$title?></h1>
<?foreach ($allTasks as $task): ?>
	<a
	href="index.php?r=task/full&id=<?=$task['id']?>"
	class="
		task-container
		flex-row
		<?if ($task['priority'] == 'major'): ?>
		<?='red'?>
		<?elseif ($task['priority'] == 'medium'): ?>
		<?='yellow'?>
		<?elseif ($task['priority'] == 'minor'): ?>
		<?='green'?>
		<?endif;?>
	">
		<div class="task-info flex-row">
			<div class="task-info-tag flex-column">
			<p>Номер задания:</p>
			<p>Приоритет:</p>
			<p>Дата выполнения:</p>
			<p>Место проведения:</p>
			</div>

			<div class="task-info-value flex-column">
			<p><?=$task['id']?></p>
			<p><?=$task['priority']?></p>
			<p><?=$task['date']?></p>
			<p><?=$task['place']?></p>
			</div>
		</div>
		<div class="task-desc flex-column">
			<span>Описание: </span>
			<p><?=$task['description']?></p>
		</div>
	</a>
<?endforeach;?>
