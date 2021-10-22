<?php

namespace app\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use app\traits\FindModelTrait;
use app\models\Producer;
use app\models\Trailer;
use app\models\Type;
use app\models\Mode;
use app\models\Axis;
use app\models\Chassis;

class TrailerController extends \yii\web\Controller
{
    use FindModelTrait;
    
    public function actionProducer($slug)
    {
        $producer = $this->findModel(Producer::class, ['slug' => $slug]);
        $trailers = Trailer::find()->where(['producer_id' => $producer->id])->all();

        return $this->render('producer', [
            'producer' => $producer,
            'trailers' => $trailers,
            'types' => Type::find()->all(),
            'modes' => Mode::find()->all(),
            'axises' => Axis::find()->all(),
            'chassises' => Chassis::find()->all(),
        ]);
    }

    public function actionItem($id)
    {
        return $this->render('trailer', [
            'trailer' => Trailer::findOne($id),
        ]);
    }
}
