<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use app\traits\FindModelTrait;
use app\models\Trailer;
use app\models\Producer;
use app\models\Type;
use app\models\Mode;
use app\models\Axis;
use app\models\Chassis;

class TrailerController extends Controller
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
            'query' => Trailer::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel(Trailer::class, $id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Trailer();
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', Yii::t('app', 'Record created!') . ' <a href="' . Url::toRoute(['trailer/create']) . '">' . Yii::t('app', 'Create') . '</a>');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'producers' => ArrayHelper::map(Producer::find()->asArray()->all(), 'id', 'name'),
            'types' => ArrayHelper::map(Type::find()->asArray()->all(), 'id', 'name'),
            'modes' => ArrayHelper::map(Mode::find()->asArray()->all(), 'id', 'name'),
            'axes' => ArrayHelper::map(Axis::find()->asArray()->all(), 'id', 'name'),
            'chassis' => ArrayHelper::map(Chassis::find()->asArray()->all(), 'id', 'name'),
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel(Trailer::class, $id);
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'producers' => ArrayHelper::map(Producer::find()->asArray()->all(), 'id', 'name'),
            'types' => ArrayHelper::map(Type::find()->asArray()->all(), 'id', 'name'),
            'modes' => ArrayHelper::map(Mode::find()->asArray()->all(), 'id', 'name'),
            'axes' => ArrayHelper::map(Axis::find()->asArray()->all(), 'id', 'name'),
            'chassis' => ArrayHelper::map(Chassis::find()->asArray()->all(), 'id', 'name'),
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel(Trailer::class, $id)->delete();

        return $this->redirect(['index']);
    }

    public function actionDiagram($id)
    {
        $model = $this->findModel(Trailer::class, $id);
        
        return $this->render('diagram', [
            'model' => $model,
        ]);
    }

    public function actionSaveDiagram()
    {
        $post = Yii::$app->request->post();
        
        $model = $this->findModel(Trailer::class, $post['id']);
        $model->markup = json_encode($post['markup']);

        if ($model->save()) return true;
    }
}
