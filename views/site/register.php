<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?=Html::encode($this->title)?></h1>

    <p>Пожалуйста, для регистрации заполните следующие поля:</p>

    <?php $form = ActiveForm::begin([
	'id' => 'register-form',
	'layout' => 'horizontal',
	'fieldConfig' => [
		'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
		'labelOptions' => ['class' => 'col-lg-1 control-label'],
	],
]);?>

        <?=$form->field($model, 'username')->textInput(['autofocus' => true])?>

        <?=$form->field($model, 'name')->textInput()->label('Имя')?>

        <?=$form->field($model, 'email')->textInput()->label('e-mail')?>

        <?=$form->field($model, 'password')->passwordInput()?>

        <?=$form->field($model, 'confirm')->passwordInput()?>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?=Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-lg btn-primary', 'name' => 'register-button'])?>
            </div>
        </div>

    <?php ActiveForm::end();?>
</div>
