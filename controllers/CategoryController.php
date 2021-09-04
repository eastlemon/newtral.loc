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

        return $this->render('index', [
            'model' => $model,
        ]);
    }
}