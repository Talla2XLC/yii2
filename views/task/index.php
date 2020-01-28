<?php
use app\widgets\TaskWidget;
use yii\widgets\ListView;
?>

<h1><?=$title?></h1>
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
	<a class="btn btn-lg btn-primary" href="index.php?r=task/create">Создать новое задание</a>
</div>
