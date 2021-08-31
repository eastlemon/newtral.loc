<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\ActiveDataProvider;
use app\traits\FindModelTrait;
use app\models\Part;

class PartController extends Controller
{
    use FindModelTrait;

    public function actionIndex($name)
    {
        $model = $this->findModel(Part::class, ['slug' => $name]);

        $stocksProvider = new ActiveDataProvider([
            'query' => $model->getStocks(),
        ]);

        $analoguesProvider = new ActiveDataProvider([
            'query' => $model->getAnalogues(),
        ]);

        $certificatesProvider = new ActiveDataProvider([
            'query' => $model->getCertificates(),
        ]);

        return $this->render('index', [
            'model' => $model,
            'stocksProvider' => $stocksProvider,
            'analoguesProvider' => $analoguesProvider,
            'certificatesProvider' => $certificatesProvider,
        ]);
    }
}