<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

use frontend\models\News;
use frontend\models\NewsCategory;

use yii\helpers\ArrayHelper;
use mihaildev\ckeditor\CKEditor;

use mihaildev\elfinder\InputFile;
use mihaildev\elfinder\ElFinder;
use yii\web\JsExpression;
use masterzero\activefield\ActiveForm;

$modelNews = News::find()->where(['moderation'=>0])->orderBy([ 'created_at' => SORT_DESC])->all();
$modelCategory = NewsCategory::find()->all();

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    // $menuItems = [
    //     ['label' => 'Home', 'url' => ['/site/index']],
    //     ['label' => 'About', 'url' => ['/site/about']],
    //     ['label' => 'Contact', 'url' => ['/site/contact']],
    // ];
    if (Yii::$app->user->isGuest) {
        // $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Войти', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>

        <div class="index-content">
            <div class="row">
                <div class="col-md-3">
                    <h2>Сортировка</h2>
                        
                        <?php $form = ActiveForm::begin(['action' => '/news/sort', 'method' => 'get']); ?>
                        
                        <?php  
                            $modelFormCategory = new NewsCategory;
                            $modelFormNews = new News;
                        ?>
                        
                        <?= 
                            $form->field($modelFormCategory, 'id')->dropDownList(
                             \yii\helpers\ArrayHelper::map($modelCategory, 'id', 'name'),
                             [
                             'prompt' => 'Выбор категории',
                             ]                          
                        );?>
                        <?= $form->field($modelFormNews, 'created_at')->dropDownList([
                            'DESC' => 'Возрастание',
                            'ASC' => 'Уменьшение'
                        ]);
                        ?>

                        <?= Html::submitButton('Отсортировать', ['class' => 'btn btn-primary']) ?>
                        
                        <?php ActiveForm::end(); ?>
                    
                    <hr>

                    <h2>Добавить новость</h2>
                      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Добавить</button>

                </div>
                <div class="col-md-9">
                    <?= $content ?>
                </div>
                
            </div>
        </div>
        
    </div>
</div>

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

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Добавление новости</h4>
        </div>
        <div class="modal-body">
            <?php
                $model= new News;
            ?>
            <?php $form = ActiveForm::begin(['action' => '/news/add', 'method' => 'post']); ?>

            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'name')->copyName()->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'url')->PasteToUrl();?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?php
                        $items = ArrayHelper::map($modelCategory,'id','name');
                    ?>
                    <?=$form->field($model, 'id_category')->dropDownList($items); ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'image')->widget(InputFile::className(), [
                        'language'      => 'ru',
                        'controller'    => 'elfinder', // вставляем название контроллера, по умолчанию равен elfinder
                        'filter'        => 'image',    // фильтр файлов, можно задать массив фильтров https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#wiki-onlyMimes
                        'template'      => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
                        'options'       => ['class' => 'form-control'],
                        'buttonOptions' => ['class' => 'btn btn-default'],
                        'multiple'      => false       // возможность выбора нескольких файлов
                    ]);
                    ?>
                </div>
            </div>
            
            
            
            
            
            <?= $form->field($model, 'annotation')->widget(CKEditor::className(),[
                'editorOptions' => [
                    'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                    'inline' => false, //по умолчанию false
                ],
            ]);?>
            <?= $form->field($model, 'content')->widget(CKEditor::className(),[
                'editorOptions' => [
                    'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                    'inline' => false, //по умолчанию false
                ],
            ]);?>
            
            
        
            <div class="form-group">
                <?= Html::submitButton('Добавить новость', ['class' => 'btn btn-success']) ?>
            </div>
        <?php ActiveForm::end(); ?>
        </div>
      </div>
    </div>
</div>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
