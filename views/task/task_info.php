<div class="title-top flex-row">
	<h1><?=$title?></h1>
	<a class="btn btn-lg btn-info" href="index.php?r=task">Назад</a>
</div>
<div
class="
	task-container
	big-task
	flex-row
	red
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
			<p>137</p>
			<p>major</p>
			<p>31.12.2020</p>
			<p>Master</p>
			<p>Slave</p>
			<p>overdue</p>
		</div>
	</div>
	<div class="task-desc flex-column">
		<span>Описание: </span>
		<p><?=$task['description']?></p>
	</div>
</div>