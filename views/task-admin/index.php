<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\filters\TaskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tasks-index">

    <h1><?=Html::encode($this->title)?></h1>

    <p>
        <?=Html::a('Create Tasks', ['create'], ['class' => 'btn btn-success'])?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=GridView::widget([
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
	'columns' => [

		'id',
		'title',
		'description',
		[
			'attribute' => 'creator_id',
			'label' => 'Creator',
			'value' => 'creator.name',
			'filter' => $arrUsers,
		],
		[
			'attribute' => 'responsible_id',
			'label' => 'Responsible',
			'value' => 'responsible.name',
			'filter' => $arrUsers,
		],
		[
			'attribute' => 'status_id',
			'label' => 'Status',
			'value' => 'status.name',
			'filter' => $arrStatus,
		],
		[
			'attribute' => 'priority_id',
			'label' => 'Priority',
			'value' => 'priority.name',
			'filter' => $arrPriority,
		],
        [
            'attribute' => 'deadline',
            'label' => 'deadline',
            'value' => 'deadline',
            'filter' => $monthList
        ],

		['class' => 'yii\grid\ActionColumn'],
	],
]);?>


</div>
