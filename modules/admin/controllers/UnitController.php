<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use app\traits\FindModelTrait;
use app\models\Unit;
use app\models\Category;
use app\models\Producer;

class UnitController extends Controller
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
            'query' => Unit::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel(Unit::class, $id),
        ]);
    }
    
    public function actionCreate()
    {
        $model = new Unit();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', Yii::t('app', 'Record created!') . ' <a href="' . Url::toRoute(['unit/create']) . '">' . Yii::t('app', 'Create') . '</a>');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'dataCategory' => ArrayHelper::map(Category::find()->asArray()->all(), 'id', 'name'),
            'dataProducer' => ArrayHelper::map(Producer::find()->asArray()->all(), 'id', 'name'),
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel(Unit::class, $id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    
    public function actionDelete($id)
    {
        $this->findModel(Unit::class, $id)->delete();

        return $this->redirect(['index']);
    }
}
