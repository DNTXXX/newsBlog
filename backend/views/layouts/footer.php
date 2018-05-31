<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<footer class="footer">
    <div class="container">
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<p>&copy; <?= date('Y') ?> Разработал CMS: <?= Html::a(Yii::$app->params['develop'] ,Yii::$app->params['developLink'], array('target'=>'_blank'))?> </p>
			<p><i class="fas fa-envelope-open"></i>  Email: <?= Html::a(Yii::$app->params['developEmail'], Yii::$app->params['developEmail'] )?></p>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 text-right">
			<p><?= Yii::powered() ?> 2.0</p>
		</div>
    </div>
</footer>