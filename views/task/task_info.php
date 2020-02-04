<div class="title-top flex-row">
	<h1><?=$title?></h1>
	<a class="btn btn-lg btn-info" href="index.php?r=task"><?=Yii::t('app', 'back_btn')?></a>
</div>
<div
class="
	task-container
	big-task
	flex-row
	bgc-red
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

		<div class="task-info-value help1 flex-column jc-sa">
			<p><- <?=Yii::t('app', 'task_info_number')?></p>
			<p><- <?=Yii::t('app', 'task_info_priority')?></p>
			<p><- <?=Yii::t('app', 'task_info_deadline')?></p>
			<p><- <?=Yii::t('app', 'task_info_creator')?></p>
			<p><- <?=Yii::t('app', 'task_info_responsible')?></p>
			<p><- <?=Yii::t('app', 'task_info_status')?></p>
		</div>
	</div>
	<div class="task-desc help2 flex-column jc-sa">
		<span class="text-bold"><?=Yii::t('app', 'task_title')?></span>
		<div class="task-desc-text flex-column ai-c fb-20">
			<span><?=Yii::t('app', 'task_description')?>: </span>
			<p class="green center"><?=Yii::t('app', 'task_info_description')?></p>
		</div>
	</div>
</div>