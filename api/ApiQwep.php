<?php

namespace app\api;

class ApiQwep extends \yii\httpclient\Client
{
  public $baseUrl;
  public $authorizationCode;
  public $token;

  public function __construct($url, $code, $config = [])
  {
    $this->baseUrl = $url;
    $this->authorizationCode = $code;
    $this->token = $this->getToken();
    parent::__construct($config);
  }

  public function getToken()
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
    }')->send();
    if ($response->isOk) return $response->data['Response']['entity']['token'];
  }

  public function searchArticul($a)
  {
    $response = $this->createRequest()
    ->setMethod('POST')
    ->setUrl('search?json')
    ->addHeaders(['Authorization' => 'Bearer ' . $this->token])
    ->setContent('{
      "Request": {
        "RequestData": {
          "article": "' . $a . '"
        }
      }
    }')->send();
    if ($response->isOk) return $response->data;
  }
}
