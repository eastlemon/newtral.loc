<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;

class SearchController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index', [
            'search_string' => Yii::$app->request->queryParams
        ]);
    }
}