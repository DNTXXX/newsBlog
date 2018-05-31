<?

namespace masterzero\activefield;
use Yii;

class ActiveForm extends \yii\widgets\ActiveForm
{
	public $fieldClass = ActiveField::class;
	public $elFinderConnector = '/el-finder/connector';
}