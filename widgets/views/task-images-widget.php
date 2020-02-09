<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="img_div flex-column">
    <span class="img_div_span text-bold"><?=Yii::t('app', 'task_images')?>:</span>
    <div class="img_div_list">
        <? foreach ($images as $image): ?>
            <?= Html::a(Html::img(Url::to('/'.strstr($image, 'uploads')), ['alt' => 'Task'.$task->id.'_img']), Url::to('/'.str_replace('\small', '', strstr($image, 'uploads'))) , ['class' => 'img_link', 'target'=>'_blank']) ?>
        <? endforeach;?>
    </div>
</div>