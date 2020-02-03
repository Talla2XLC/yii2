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
            'filter' => [
                '1' => 'Январь',
                '2' => 'Февраль',
                '3' => 'Март',
                '4' => 'Апрель',
                '5' => 'Май',
                '6' => 'Июнь',
                '7' => 'Июль',
                '8' => 'Август',
                '9' => 'Сентябрь',
                '10' => 'Октябрь',
                '11' => 'Ноябрь',
                '12' => 'Декабрь',
            ],
        ],

		['class' => 'yii\grid\ActionColumn'],
	],
]);?>


</div>
