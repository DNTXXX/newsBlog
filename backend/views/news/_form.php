<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use backend\models\NewsCategory;
use yii\helpers\ArrayHelper;
use mihaildev\ckeditor\CKEditor;

use mihaildev\elfinder\InputFile;
use mihaildev\elfinder\ElFinder;
use yii\web\JsExpression;
use masterzero\activefield\ActiveForm;
//use masterzero\activefield\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'name')->copyName()->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'url')->PasteToUrl();?>
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
            <?//= $form->field($model, 'image')->elFinder() ?>
            <?//= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'like_social')->textInput() ?>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <?php
                        $newsCategory = NewsCategory::find()->all();
                        $items = ArrayHelper::map($newsCategory,'id','name');
                    ?>
                    <?=$form->field($model, 'id_category')->dropDownList($items); ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'moderation')->textInput() ?>
                </div>
            </div>
            
        </div>      
        
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'annotation')->widget(CKEditor::className(),[
                'editorOptions' => [
                    'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                    'inline' => false, //по умолчанию false
                ],
            ]);?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'content')->widget(CKEditor::className(),[
                'editorOptions' => [
                    'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                    'inline' => false, //по умолчанию false
                ],
            ]);?>
        </div>
    </div>
    

    

    
    <?//= $form->field($model, 'annotation')->textarea(['rows' => 6]) ?>

    
    <?//= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    

    <?//= $form->field($model, 'created_at')->textInput() ?>

    <?//= $form->field($model, 'updated_at')->textInput() ?>

    <?//= $form->field($model, 'deleted_at')->textInput() ?>

    <?//= $form->field($model, 'removed')->textInput() ?>

    <?//= $form->field($model, 'deleted')->textInput() ?>

    <?//= $form->field($model, 'id_category')->textInput() ?>

    
        
    



    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
