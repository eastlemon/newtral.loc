<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use app\traits\FindModelTrait;
use app\modules\admin\models\search\CategorySearch;
use app\models\Category;

class CategoryController extends Controller
{
    use FindModelTrait;

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    
    public function actionIndex()
    {
        $searchModel = new CategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel(Category::class, ['id' => $id]),
        ]);
    }

    public function actionCreate()
    {
        $model = new Category(['scenario' => 'create']);
        $model->is_popular = 0;
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', Yii::t('app', 'Record created!') . ' <a href="' . Url::toRoute(['category/create']) . '">' . Yii::t('app', 'Create') . '</a>');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'data' => ArrayHelper::map(Category::find()->asArray()->all(), 'id', 'name'),
        ]);
    }
    
    public function actionUpdate($id)
    {
        $model = $this->findModel(Category::class, ['id' => $id]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'data' => ArrayHelper::map(Category::find()->where(['<>', 'id', $id])->asArray()->all(), 'id', 'name'),
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel(Category::class, ['id' => $id])->delete();

        return $this->redirect(['index']);
    }
}
