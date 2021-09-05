<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\SearchModel;

class SearchController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index', [
            'searchProvider' => (new SearchModel)->search(Yii::$app->request->queryParams),
        ]);
    }
}