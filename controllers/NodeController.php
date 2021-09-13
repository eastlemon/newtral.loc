<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\ActiveDataProvider;
use app\traits\FindModelTrait;
use app\models\Node;

class NodeController extends Controller
{
    use FindModelTrait;

    public function actionIndex($slug)
    {
        $model = $this->findModel(Node::class, ['slug' => $slug]);

        $dataProvider = new ActiveDataProvider([
            'query' => $model->getParts(),
        ]);

        return $this->render('index', [
            'model' => $model,
            'dataProvider' => $dataProvider,
        ]);
    }
}