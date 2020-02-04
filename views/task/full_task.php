<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use app\widgets\TaskImagesWidget;
use yii\helpers\Url;
?>

<div class="title-top flex-row">
	<h1><?=$title . $task->id?></h1>
	<a class="btn btn-lg btn-info" href="<?=Url::toRoute('task/index')?>"><?=Yii::t('app', 'back_btn')?></a>
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
            <p><?=Yii::t('app', 'task_number')?>:</p>
            <p><?=Yii::t('app', 'task_priority')?>:</p>
            <p><?=Yii::t('app', 'task_deadline')?>:</p>
            <p><?=Yii::t('app', 'task_creator')?>:</p>
            <p><?=Yii::t('app', 'task_responsible')?>:</p>
            <p><?=Yii::t('app', 'task_status')?>:</p>
		</div>

		<div class="task-info-value flex-column jc-sa">
			<p><?=$task->id?></p>
			<p><?=$task->priority->name?></p>
			<p><?=date_format(date_create($task->deadline), 'd.m.Y')?></p>
			<p><?=$task->creator->name?></p>
			<p><?=$task->responsible->name?></p>
			<p><?=$task->status->name?></p>
		</div>
	</div>
	<div class="task-desc flex-column jc-sa">
		<span class="text-size3 text-bold"><?=$task->title?></span>
		<div class="task-desc-text flex-column ai-c fb-20">
			<span class="flex-grow"><?=Yii::t('app', 'task_description')?>:</span>
			<p><?=$task->description?></p>
		</div>
	</div>
</div>
<div class="img_div">
    <?=TaskImagesWidget::widget(['task' => $task, 'images' => $images])?>
</div>
<div class="add-task-container flex-row jc-sa center">
	<a class="btn btn-lg btn-primary" href="<?=Url::toRoute(['task/edit', 'id' => $task->id])?>"><?=Yii::t('app', 'task_edit_btn')?></a>
    <?php $form = ActiveForm::begin([
        'id' => 'img-upload-form',
        'layout' => 'horizontal',
        'options' => ['class' => 'flex-row'],
        'fieldConfig' => [
            'template' => "\n<div>{input}</div>\n<div>{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
            'errorOptions' => ['class' => 'text-size1 red'],
            'options' => ['class' => 'width-100 flex-row'],
        ],
    ]); ?>

    <?=$form->field($model, 'img')->fileInput(['class' => 'bgc-grey btn-lg'])?>
    <?=$form->field($model, 'id')->hiddenInput(['value'=> $task->id])->label(false)?>
    <?=Html::submitButton(Yii::t('app', 'upload_img_btn'), ['class' => 'btn btn-lg btn-success', 'name' => 'upload-button'])?>

    <?php ActiveForm::end(); ?>
</div>

