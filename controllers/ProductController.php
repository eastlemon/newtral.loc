<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\ActiveDataProvider;
use app\models\Product;

class ProductController extends Controller
{    
    public function actionIndex($name)
    {
        $model = Product::find()->andFilterWhere(['like', 'name', $name])->one();

        $dataProvider = new ActiveDataProvider([
            'query' => Product::find()->andFilterWhere(['like', 'name', $name]),
        ]);

        return $this->render('index', [
            'model' => $model,
            'dataProvider' => $dataProvider,
        ]);
    }
}