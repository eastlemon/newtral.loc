<?php

namespace app\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use app\traits\FindModelTrait;
use app\models\Producer;

class TrailerController extends \yii\web\Controller
{
    use FindModelTrait;
    
    public function actionProducer($slug)
    {
        $producer = $this->findModel(Producer::class, ['slug' => $slug]);

        return $this->render('producer', [
            'producer' => $producer,
        ]);
    }
}
