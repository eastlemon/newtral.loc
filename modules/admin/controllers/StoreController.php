<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use app\traits\FindModelTrait;
use app\models\Store;
use app\models\Office;
use app\models\OfficeStore;

class StoreController extends Controller
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
        $dataProvider = new ActiveDataProvider([
            'query' => Store::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel(Store::class, $id),
        ]);
    }
    
    public function actionCreate()
    {
        $model = new Store();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                $office_store = new OfficeStore();
                $office_store->delivery = $model->delivery;
                $office_store->office_id = $model->office;
                $office_store->store_id = $model->id;
                if ($office_store->save()) return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'data' => ArrayHelper::map(Office::find()->asArray()->all(), 'id', 'name'),
        ]);
    }
    
    public function actionUpdate($id)
    {
        $model = $this->findModel(Store::class, $id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'data' => ArrayHelper::map(Office::find()->asArray()->all(), 'id', 'name'),
        ]);
    }
    
    public function actionDelete($id)
    {
        $this->findModel(Store::class, $id)->delete();

        return $this->redirect(['index']);
    }
}
