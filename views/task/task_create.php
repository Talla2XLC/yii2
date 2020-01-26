<?php

use yii\bootstrap\ActiveForm;
?>

<div class="title-top flex-row">
	<h1><?=$title?></h1>
	<a class="btn btn-lg btn-info" href="index.php?r=task">Назад</a>
</div>
<?php $form = ActiveForm::begin([
	'id' => 'new-task-form',
	'layout' => 'horizontal',
	'fieldConfig' => [
		'template' => "\n<div >{input}</div>\n<div>{error}</div>",
		'labelOptions' => ['class' => 'col-lg-1 control-label'],
	],
]);?>
<div
class="
	task-container
	big-task
	flex-row
	bgc-green
">
	<div class="task-info flex-row">
		<div class="task-info-tag flex-column">
			<p>Приоритет:</p>
			<p>Выполнить до:</p>
			<p>Назначил:</p>
			<p>Ответственный:</p>
			<p>Статус:</p>
		</div>

		<div class="task-info-value help1 flex-column">
			<?=$form->field($model, 'priority')->dropdownList(
	$arrPriority,
	['autofocus' => true]
)?>
			<?=$form->field($model, 'deadline')->textInput()?>
			<?=$form->field($model, 'creator_id')->dropdownList(
	$arrUsers
)?>
			<?=$form->field($model, 'responsible_id')->dropdownList(
	$arrUsers
)?>
			<?=$form->field($model, 'status')->dropdownList(
	$arrStatus
)?>
		</div>
	</div>
	<div class="task-desc help2 flex-column">
		<?=$form->field($model, 'title')->textInput()?>
		<span>Описание: </span>
		<?=$form->field($model, 'description')->textarea(['rows' => "12", 'cols' => "40"])?>
	</div>
</div>

<?php ActiveForm::end();?>