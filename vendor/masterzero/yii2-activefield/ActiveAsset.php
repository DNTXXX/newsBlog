<?



namespace masterzero\activefield;

class ActiveAsset extends \kartik\base\AssetBundle
{


    public function init() {
        $this->setSourcePath(__DIR__ . '/assets');
        $this->setupAssets('js', ['js/url-translate']);
        parent::init();
    }
}
