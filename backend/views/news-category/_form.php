<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use masterzero\activefield\ActiveForm;
/* @var $this yii\web\View */
/* @var $model backend\models\NewsCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-category-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'name')->copyName()->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'url')->PasteToUrl();?>
        </div>
        <div class="col-md-6">
            
        </div>
    </div>
    

    <?//= $form->field($model, 'created_at')->textInput() ?>

    <?//= $form->field($model, 'updated_at')->textInput() ?>

    <?//= $form->field($model, 'deleted_at')->textInput() ?>

    <?//= $form->field($model, 'removed')->textInput() ?>

    <?//= $form->field($model, 'deleted')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
