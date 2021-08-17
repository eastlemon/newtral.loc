<?php

namespace app\api;

use Yii;

class ApiDjango extends \yii\httpclient\Client
{
  public $baseUrl;
  public $auth_data;

  public function __construct($config = [])
  {
    $settings = Yii::$app->settings;
    
    $this->baseUrl = $settings->get('django', 'url');
    $this->auth_data = [
      'password' => $settings->get('django', 'password'),
      'username' => $settings->get('django', 'username'),
    ];

    parent::__construct($config);
  }

  public function login()
  {
    $response = $this->createRequest()
    ->setMethod('POST')
    ->setUrl('login/')
    ->setData($this->auth_data)
    ->send();

    if ($response->isOk) return $response->data['token'];
  }

  public function get_semitrailer_types()
  {
    $response = $this->createRequest()
    ->setMethod('GET')
    ->setUrl('dictionary/semitrailer_types')
    ->setHeaders(['Authorization: Token ' . $this->login()])
    ->send();

    return $response->data;
  }

  public function get_semitrailer_modes()
  {
    $response = $this->createRequest()
    ->setMethod('GET')
    ->setUrl('dictionary/semitrailer_modes')
    ->setHeaders(['Authorization: Token ' . $this->login()])
    ->send();

    return $response->data;
  }

  public function get_semitrailer_axis()
  {
    $response = $this->createRequest()
    ->setMethod('GET')
    ->setUrl('dictionary/semitrailer_axis')
    ->setHeaders(['Authorization: Token ' . $this->login()])
    ->send();

    return $response->data;
  }

  public function get_semitrailer_manufacturers()
  {
    $response = $this->createRequest()
    ->setMethod('GET')
    ->setUrl('dictionary/semitrailer_manufacturers')
    ->setHeaders(['Authorization: Token ' . $this->login()])
    ->send();

    return $response->data;
  }

  public function get_semitrailer_models()
  {
    $response = $this->createRequest()
    ->setMethod('GET')
    ->setUrl('dictionary/semitrailer_models')
    ->setHeaders(['Authorization: Token ' . $this->login()])
    ->send();

    return $response->data;
  }

  public function get_chassis_types()
  {
    $response = $this->createRequest()
    ->setMethod('GET')
    ->setUrl('dictionary/chassis_types')
    ->setHeaders(['Authorization: Token ' . $this->login()])
    ->send();

    return $response->data;
  }

  public function get_chassis_manufacturers()
  {
    $response = $this->createRequest()
    ->setMethod('GET')
    ->setUrl('dictionary/chassis_manufacturers')
    ->setHeaders(['Authorization: Token ' . $this->login()])
    ->send();

    return $response->data;
  }

  public function get_node_manufacturers()
  {
    $response = $this->createRequest()
    ->setMethod('GET')
    ->setUrl('dictionary/node_manufacturers')
    ->setHeaders(['Authorization: Token ' . $this->login()])
    ->send();

    return $response->data;
  }

  public function get_node_types()
  {
    $response = $this->createRequest()
    ->setMethod('GET')
    ->setUrl('dictionary/node_types')
    ->setHeaders(['Authorization: Token ' . $this->login()])
    ->send();

    return $response->data;
  }

  public function get_part_manufacturers()
  {
    $response = $this->createRequest()
    ->setMethod('GET')
    ->setUrl('dictionary/part_manufacturers')
    ->setHeaders(['Authorization: Token ' . $this->login()])
    ->send();

    return $response->data;
  }
}
