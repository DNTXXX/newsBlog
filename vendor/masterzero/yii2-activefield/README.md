# yii2-activefield
Cumstom Yii class ActiveField to work with tinymce, elfinder, and auto translit.

Installation
------------

Before install you need have [composer](http://getcomposer.org/download/).


Make sure you've correctly installed the [elfinder by zxbodya](https://github.com/zxbodya/yii2-elfinder).

Either run

```
$ composer require masterzero/yii2-activefield
```

or add

```
"masterzero/yii2-activefield": "*"
```

to the ```require``` section of your `composer.json` file.

## Usage


```
<?

use masterzero\activefield\ActiveForm;


$form = ActiveForm::begin([
    /* ... */
    'elFinderConnector' => '/el-finder/connector',
    /* ... */
	]);

?>


<?= $form->field($model, 'name')->copyName() ?>
<?= $form->field($model, 'url')->PasteToUrl() ?>
<?= $form->field($model, 'image')->elFinder() ?>
<?= $form->field($model, 'content')->tinyMCE() ?>

<? ActiveForm::end() ?>