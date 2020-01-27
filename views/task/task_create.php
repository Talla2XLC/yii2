<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>

<div class="title-top flex-row">
	<h1><?=$title?></h1>
	<a class="btn btn-lg btn-info" href="index.php?r=task">Назад</a>
</div>
<?php $form = ActiveForm::begin([
	'id' => 'new-task-form',
	'layout' => 'horizontal',
	'fieldConfig' => [
		'template' => "\n<div>{input}</div>\n<div>{error}</div>",
		'labelOptions' => ['class' => 'col-lg-1 control-label'],
		'errorOptions'=>['class'=>'text-size1 red'],
		'options' => ['class' => '']
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

		<div class="task-info-value flex-column">
			<?=$form->field($model, 'priority_id')->dropdownList(
	$arrPriority,
	['autofocus' => true]
)?>
			<?=$form->field($model, 'deadline')->textInput()?>
			<?=$form->field($model, 'creator_id')->dropdownList(
	$currentUser
)?>
			<?=$form->field($model, 'responsible_id')->dropdownList(
	$arrUsers
)?>
			<?=$form->field($model, 'status_id')->dropdownList(
	$arrStatus
)?>
		</div>
	</div>
	<div class="task-desc flex-column">
		<?=$form->field($model, 'title')->textInput()?>
		<span>Описание: </span>
		<?=$form->field($model, 'description')->textarea(['rows' => "8", 'cols' => "20"])?>
	</div>
</div>
<div class="form-group">
    <div class="col-lg-offset-1 col-lg-11 flex-row jc-c">
        <?=Html::submitButton('Добавить задание', ['class' => 'btn btn-lg btn-success', 'name' => 'register-button'])?>
    </div>
</div>

<?php ActiveForm::end();?>