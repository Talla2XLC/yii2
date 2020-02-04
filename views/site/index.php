<?php
use yii\helpers\Url;
?>

<div class="site-index">

    <div class="jumbotron">
        <h1>Поздравляем, <?=$userName ? $userName : 'Гость'?>!</h1>

        <p class="lead">Вы получили доступ к ресурсу, который организует Ваше время с максимальной эффективность и позволит наиболее рационально запланировать ближайшие дни.</p>
	<?if (!Yii::$app->user->isGuest): ?>
        <a class="btn btn-lg btn-success" href="<?=Url::toRoute('task/index')?>">Посмотреть текущие задания</a>
    <?else: ?>
    	<a class="btn btn-lg btn-success" href="<?=Url::toRoute('site/login')?>">Войти</a>
    	<a class="btn btn-lg btn-primary" href="<?=Url::toRoute('site/register')?>">Зарегистрироваться</a>
	<?endif;?>
    </div>
</div>
