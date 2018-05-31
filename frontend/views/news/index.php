<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
	$this->title = $model->name;
?>

<div class="well">
	<div class="media">
		<div class="row">
			<div class="col-md-4">
				<a class="pull-left" href="#">
					<img class="media-object img-responsive" src="<?=$model->image?>">
				</a>
			</div>
			<div class="col-md-8">
				<div class="media-body">
					<h4 class="media-heading"><?=$this->title?></h4>
					<p class="text-right"></p>
					<?=$model->content?>
					<ul class="list-inline list-unstyled">
						<li><span><i class="glyphicon glyphicon-calendar"></i> Дата создания: <?=$model->created_at?> </span></li>
						<li>|</li>
						<span><i class="glyphicon glyphicon-folder-open"></i> Категория: <?=$model->category->name?></span>
					</ul>
				</div>
				<?= Html::a('Вернуться назад', Yii::$app->request->referrer ?: Yii::$app->homeUrl ); ?>
			</div>
		</div>
	</div>
</div>
