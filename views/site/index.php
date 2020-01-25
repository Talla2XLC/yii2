<div class="site-index">

    <div class="jumbotron">
        <h1>Поздравляем!</h1>

        <p class="lead">Вы получили доступ к ресурсу, который организует Ваше время с максимальной эффективность и позволит наиболее рационально запланировать ближайшие дни.</p>
	<?if (!Yii::$app->user->isGuest): ?>
        <a class="btn btn-lg btn-success" href="index.php?r=task">Посмотреть текущие задания</a>
    <?else: ?>
    	<a class="btn btn-lg btn-success" href="index.php?r=site/login">Войти</a>
    	<a class="btn btn-lg btn-primary" href="index.php?r=site/register">Зарегистрироваться</a>
	<?endif;?>
    </div>
</div>
