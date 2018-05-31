


<a href="/news/<?=$model->category->url?>/<?=$model->url?>">
	<div class="col-lg-4">
	    <div class="card">
	        <img src="<?=$model->image?>" alt="<?=$model->name?>" title="<?=$model->name?>">
	        <h4><?=$model->name?></h4>
	        <?=$model->annotation?>
	        <p>Дата публикации: <?=$model->created_at?></p>
	        <a href="/news/<?=$model->category->url?>/<?=$model->url?>" class="blue-button">Подробнее</a>
	        <a href=""><span class="glyphicon glyphicon-thumbs-up">Like</span></a>
	    </div>
	</div>
</a>