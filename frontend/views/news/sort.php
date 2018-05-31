<?php
/* @var $this yii\web\View */
?>

<?= \yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_item',
    'summary' => false,
    'pager' => [
        'options' => [
            'tag' => 'div',
            'class' => 'row pagination pagination-lg pull-right col-xs-12 col-sm-12 col-md-12 col-lg-12',
        ],
    ],
]); ?>

<?/*php foreach ($model as $key => $value) { ?>
	<a href="<?=$value->category->url?>/<?=$value->url?>"><h1><?=$value->name?></h1></a>
<? } */?>

