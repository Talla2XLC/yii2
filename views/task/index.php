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
	[
		'' => 'Все',
		'01' => 'Январь',
		'02' => 'Февраль',
		'03' => 'Март',
		'04' => 'Апрель',
		'05' => 'Май',
		'06' => 'Июнь',
		'07' => 'Июль',
		'08' => 'Август',
		'09' => 'Сентябрь',
		'10' => 'Октябрь',
		'11' => 'Ноябрь',
		'12' => 'Декабрь',
	],
	['autofocus' => true]
)?>

    <div class="form-group">
        <?=Html::submitButton('Применить', ['class' => 'btn btn-success'])?>
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
	<a class="btn btn-lg btn-primary" href="index.php?r=task/create">Создать новое задание</a>
</div>
