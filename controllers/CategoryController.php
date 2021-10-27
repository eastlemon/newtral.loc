<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\ActiveDataProvider;
use app\traits\FindModelTrait;
use app\models\Category;

class CategoryController extends Controller
{
    use FindModelTrait;

    public function actionIndex($slug)
    {
        $model = $this->findModel(Category::class, ['slug' => $slug]);
        
        $categoryProvider = new ActiveDataProvider([
            'query' => $model->getCategories(),
        ]);

        return $this->render('index', [
            'model' => $model,
            'categoryProvider' => $categoryProvider,
        ]);
    }
}