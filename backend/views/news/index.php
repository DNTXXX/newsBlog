<?php

use yii\grid\GridView;
use yii\widgets\Menu;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Новости';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать новость', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute'=>'name',
                'content'=>function($data){
                    return Html::a($data['name'], Url::to(['update', 'id' => $data['id']]) );
                },
                'headerOptions' => ['style' => 'width:25%'],
            ],
            'url',
            //'image',
            //'annotation:ntext',
            //'content:ntext',
            'like_social',
            'created_at',
            'updated_at',
            //'deleted_at',
            //'removed',
            //'deleted',
            'id_category',

            [
                'class' => 'yii\grid\ActionColumn',
                'header'=>'Действия', 
                'headerOptions' => ['width' => '80'],
                'template' => ' {update} {hide} {delete} {moderation}',
                'buttons' => [
                    'hide' => function ($url,$model) {

                        $icon = $model->removed ? 'glyphicon-eye-close' : 'glyphicon-eye-open';
                        return Html::a(
                        '<span class="glyphicon '.$icon.'"></span>', 
                        $url);
                    },

                    'update' => function ($url,$model) {
                        return Html::a(
                        '<span class="glyphicon glyphicon-pencil"></span>', 
                        $url, array('title'=>'Редактировать') );
                    },
                    'moderation' => function ($url,$model) {

                        $icon = $model->moderation ? 'glyphicon-remove' : 'glyphicon-ok';
                        return Html::a(
                        '<span class="glyphicon '.$icon.'"></span>', 
                        $url);
                    },   
                    // 'view' => function ($url,$model) {
                    //     return Html::a(
                    //     '<span class="glyphicon glyphicon-fullscreen"></span>', 
                    //     $url, array('title'=>'Просмотреть информацию'));
                    // },
                    

                    // 'delete' => function ($url,$model) {
                    //     $icon = $model->removed ? 'glyphicon-eye-close' : 'glyphicon-eye-open';
                    //     return Html::a(
                    //     '<span class="glyphicon '.$icon.'"></span>', 
                    //     $url);
                    // },
                
                ],
            ],
        ],
    ]); ?>
</div>
