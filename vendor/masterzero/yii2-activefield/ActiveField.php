<?

namespace masterzero\activefield;

use Yii;
use zxbodya\yii2\tinymce\TinyMce;
use zxbodya\yii2\elfinder\TinyMceElFinder;
use zxbodya\yii2\elfinder\ElFinderInput;


class ActiveField extends \yii\widgets\ActiveField
{
	public $copyUrlClassName = 'url-copy-field';
	public $pasteUrlClassName = 'url-generate-field';


	public function copyName()
	{

		$this->options['class'] .= ' '.$this->copyUrlClassName;

		return $this;
	}

	public function PasteToUrl()
	{

		$this->options['class'] .= ' '.$this->pasteUrlClassName;

		return $this;
	}

	public function elFinder()
	{
		return $this->widget(
		    ElFinderInput::className(),
		    ['connectorRoute' => $this->form->elFinderConnector,] );
	}


	public function tinyMCE()
	{
		return $this->widget(
		    TinyMce::className(),
		    [
		        'fileManager' => [
		            'class' => TinyMceElFinder::className(),
		            'connectorRoute' => $this->form->elFinderConnector,
		        ],
		    ]
		);
	}



	public function dropDownEnum( $enumList )
	{
		return $this->dropDownList(
    		\yii\helpers\ArrayHelper::map( $enumList , 'id', 'name') );
	}




	public function init ()
	{

		ActiveAsset::register(\Yii::$app->controller->view);


		return parent::init();
	}

}