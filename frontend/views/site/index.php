<?php
use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use frontend\models\News;
use frontend\models\NewsCategory;

use yii\helpers\ArrayHelper;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\InputFile;
use mihaildev\elfinder\ElFinder;
use yii\web\JsExpression;
use masterzero\activefield\ActiveForm;
/* @var $this yii\web\View */

$this->title = Yii::$app->name;
$modelNews = News::find()->where(['moderation'=>0])->orderBy([ 'created_at' => SORT_DESC])->limit(6)->all();
$modelCategory = NewsCategory::find()->all();
?>

<?php
	
	foreach ($modelNews as $key => $value) { 
?>
	<a href="/news/<?=$value->category->url?>/<?=$value->url?>">
        <div class="col-lg-4">
            <div class="card">
                <img src="<?=$value->image?>" alt="<?=$value->name?>" title="<?=$value->name?>">
                <h4><?=$value->name?></h4>
                <?=$value->annotation?>
                <p>Дата публикации: <?=$value->created_at?></p>
                <a href="/news/<?=$value->category->url?>/<?=$value->url?>" class="blue-button">Подробнее</a>
                <a href=""><span class="glyphicon glyphicon-thumbs-up">Like</span></a>
            </div>
        </div>
    </a>

<? } ?>	 	

        
