<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\filters\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">

    <h1><?=Html::encode($this->title)?></h1>

    <p>
        <?=Html::a('Create Users', ['create'], ['class' => 'btn btn-success'])?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=GridView::widget([
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
	'columns' => [
		'id',
		'username',
		'password',
		[
			'attribute' => 'name',
			'value' => 'name',
			'filter' => $arrUsers,
		],

		['class' => 'yii\grid\ActionColumn'],
	],
]);?>


</div>