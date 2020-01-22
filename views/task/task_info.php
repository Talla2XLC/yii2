<div class="title-top flex-row">
	<h1><?=$title?></h1>
	<a class="btn btn-lg btn-info" href="index.php?r=task">Назад</a>
</div>
<div
class="
	task-container
	big-task
	flex-row
	bgc-red
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

		<div class="task-info-value help1 flex-column">
			<p><- Порядковый номер задачи</p>
			<p><- Приоритетность задачи от Major - Middle - Minor</p>
			<p><- Срок выполнения</p>
			<p><- Пользователь, создавший задачу</p>
			<p><- Исполнитель задачи</p>
			<p><- Текущий статус: opened - in progress - closed - overdue</p>
		</div>
	</div>
	<div class="task-desc help2 flex-column">
		<span>Название задания</span>
		<span>Описание: </span>
		<p class="green center">Здесь располагается детальное описание задания</p>
	</div>
</div>