<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\NewsCategory */

$this->title = 'Создать новую категорию';
$this->params['breadcrumbs'][] = ['label' => 'Категории', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
