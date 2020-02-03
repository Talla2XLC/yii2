<?php
use app\widgets\TaskWidget;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\widgets\ListView;
?>

<h1><?=$title?></h1>
<div class="task-form">
    <?php $form = ActiveForm::begin(['method' => 'get']);?>

    <?=$form->field($searchModel, 'deadline')->dropdownList(
	$monthList,
	['autofocus' => true]
)?>

    <div class="form-group">
        <?=Html::submitButton(Yii::t('app', 'apply_btn'), ['class' => 'btn btn-success'])?>
    </div>

    <?php ActiveForm::end();?>
</div>
<?=ListView::widget([
	'dataProvider' => $dataProvider,
	'itemView' => function ($model) {
		return TaskWidget::widget(['task' => $model]);
	},
	'options' => [
		'class' => 'preview-container',
	],
	'summary' => false,
])?>
<div class="add-task-container flex-row jc-c center">
	<a class="btn btn-lg btn-primary" href="index.php?r=task/create"><?=Yii::t('app', 'task_create_btn')?></a>
</div>
