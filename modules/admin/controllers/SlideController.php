<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use app\traits\FindModelTrait;
use app\models\Slide;

class SlideController extends Controller
{
    use FindModelTrait;

    public $positions;

    public function init()
    {
        parent::init();
        
        $this->positions = [
            'left' => Yii::t('app', 'toLeft'),
            'center' => Yii::t('app', 'toCenter'),
            'right' => Yii::t('app', 'toRight'),
        ];
    }

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
            'query' => Slide::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel(Slide::class, $id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Slide(['scenario' => 'create']);
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', Yii::t('app', 'Record created!') . ' <a href="' . Url::toRoute(['slide/create']) . '">' . Yii::t('app', 'Create') . '</a>');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'positions' => $this->positions,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel(Slide::class, $id);
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'positions' => $this->positions,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel(Slide::class, $id)->delete();

        return $this->redirect(['index']);
    }
}
