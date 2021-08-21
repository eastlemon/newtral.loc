<?php

namespace app\api;

use Yii;

class ApiQwep extends \yii\httpclient\Client
{
  public $baseUrl;
  public $authorizationCode;

  public function __construct($config = [])
  {
    $settings = Yii::$app->settings;
    
    $this->baseUrl = $settings->get('qwep', 'url');
    $this->authorizationCode = $settings->get('qwep', 'authorizationCode');

    parent::__construct($config);
  }

  public function authorization()
  {
    $response = $this->createRequest()
    ->setMethod('POST')
    ->setUrl('authorization?json')
    ->setContent('{
      "Request": {
        "RequestData": {
          "authorizationCode": "' . $this->authorizationCode . '"
        }
      }
    }')
    ->send();

    if ($response->isOk) return $response->data;
  }

  public function search()
  {
    $response = $this->createRequest()
    ->setMethod('POST')
    ->setUrl('search?json')
    ->addHeaders(['Authorization' => 'Bearer 3777154ce2389224a6823447cf7570b1c861cc60'])
    ->setContent('{
      "Request": {
        "RequestData": {
          "article": "01244",
          "brand": "Febi",
          "accounts": [
            {
              "id": 14
            }
          ],
          "type": 0
        }
      }
    }')
    ->send();

    if ($response->isOk) return $response->data;
  }
}
