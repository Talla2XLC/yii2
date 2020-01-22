<?php
use yii\widgets\ListView;
?>

<h1><?=$title?></h1>
<?=ListView::widget([
	'dataProvider' => $dataProvider,
	'itemView' => 'small_task',
])?>
