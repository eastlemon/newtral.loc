<?php
namespace app\commands;

use Yii;
use app\api\ApiQwep;

class QwepController extends \yii\console\Controller
{
    public $settings;

    public function init()
    {
      $this->settings = Yii::$app->settings;
      parent::init();
    }

    public function actionSearch($articul)
    {
        $qwep = new ApiQwep($this->settings->get('qwep', 'url'), $this->settings->get('qwep', 'authorizationCode'));
        var_dump($qwep->searchArticul($articul));
    }
}
