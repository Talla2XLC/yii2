<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use app\widgets\TaskImagesWidget;
use yii\helpers\Url;
?>

<div class="title-top flex-row">
	<h1><?=$title?></h1>
	<a class="btn btn-lg btn-info" href="<?=Url::toRoute('task/index')?>"><?=Yii::t('app', 'back_btn')?></a>
</div>
<?php $form = ActiveForm::begin([
	'id' => 'new-task-form',
	'layout' => 'horizontal',
	'fieldConfig' => [
		'template' => "\n<div>{input}</div>\n<div>{error}</div>",
		'labelOptions' => ['class' => 'col-lg-1 control-label'],
		'errorOptions' => ['class' => 'text-size1 red'],
		'options' => ['class' => 'width-100'],
	],
]);?>
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
            <p><?=Yii::t('app', 'task_number')?>:</p>
            <p><?=Yii::t('app', 'task_priority')?>:</p>
            <p><?=Yii::t('app', 'task_deadline')?>:</p>
            <p><?=Yii::t('app', 'task_creator')?>:</p>
            <p><?=Yii::t('app', 'task_responsible')?>:</p>
            <p><?=Yii::t('app', 'task_status')?>:</p>
		</div>

		<div class="task-info-value flex-column jc-sa flex-grow">
			<?=$form->field($model, 'id')->dropdownList(
	[$task->id => $task->id],
	['value' => $task->id]
)?>
			<?=$form->field($model, 'priority_id')->dropdownList(
	$arrPriority,
	['autofocus' => true, 'value' => $task->priority_id]
)?>
			<?=$form->field($model, 'deadline')->textInput(['value' => date_format(date_create($task->deadline), 'd.m.Y')])?>
			<?=$form->field($model, 'creator_id')->dropdownList(
	[$task->creator->id => $task->creator->name],
	['value' => $task->creator_id, 'type' => 'number']
)?>
			<?=$form->field($model, 'responsible_id')->dropdownList(
	$arrUsers,
	['value' => $task->responsible->id]
)?>
			<?=$form->field($model, 'status_id')->dropdownList(
	$arrStatus,
	['value' => $task->status_id]
)?>
		</div>
	</div>
	<div class="task-desc flex-column jc-sa">
		<?=$form->field($model, 'title')->textInput(['value' => $task->title])?>
		<div class="task-desc-text flex-column ai-c fb-20">
            <span class="flex-grow"><?=Yii::t('app', 'task_description')?>:</span>
			<?=$form->field($model, 'description')->textarea(['rows' => "8", 'cols' => "20", 'value' => $task->description])?>
		</div>
	</div>
</div>
<?=TaskImagesWidget::widget(['task' => $task, 'images' => $images])?>

<div class="form-group">
    <div class="col-lg-offset-1 col-lg-11 flex-row jc-c">
        <?=$form->field($model, 'img')->fileInput(['class' => 'bgc-grey btn-lg'])?>
        <?=Html::submitButton(Yii::t('app', 'task_edit_commit_btn'), ['class' => 'btn btn-lg btn-success', 'name' => 'register-button'])?>
    </div>
</div>

<?php ActiveForm::end();?>

