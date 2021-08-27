<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Part;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;
use app\models\UploadForm;
use app\models\Producer;
use app\models\PartPicture;
use app\models\Offer;
use app\models\Store;
use app\traits\FindModelTrait;

/**
 * PartController implements the CRUD actions for Part model.
 */
class PartController extends Controller
{
    use FindModelTrait;

    /**
     * {@inheritdoc}
     */
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

    /**
     * Lists all Part models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Part::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Part model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel(Part::class, $id),
        ]);
    }

    /**
     * Creates a new Part model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Part();
        $modelOffer = new Offer();
        $modelOffer->scenario = 'create';

        if ($model->load(Yii::$app->request->post())) {
            $uploadModel = new UploadForm();
            $uploadModel->uploadFile = UploadedFile::getInstance($model, 'picture');
            
            if ($model->save()) {
                $partPicture = new PartPicture();
                $partPicture->picture = $uploadModel->upload();
                $partPicture->part_id = $model->id;
                $partPicture->save();

                if ($modelOffer->load(Yii::$app->request->post())) {
                    $modelOffer->part_id = $model->id;
                    if ($modelOffer->save()) return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        }

        return $this->render('create', [
            'model' => $model,
            'modelOffer' => $modelOffer,
            'data' => ArrayHelper::map(Producer::find()->asArray()->all(), 'id', 'name'),
            'dataSrores' => ArrayHelper::map(Store::find()->asArray()->all(), 'id', 'name'),
        ]);
    }

    /**
     * Updates an existing Part model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel(Part::class, $id);
        $modelOffer = new Offer();

        if ($model->load(Yii::$app->request->post())) {
            $uploadModel = new UploadForm();
            $uploadModel->uploadFile = UploadedFile::getInstance($model, 'picture');
            
            if ($model->save()) {
                $partPicture = new PartPicture();
                $partPicture->picture = $uploadModel->upload();
                $partPicture->part_id = $model->id;
                $partPicture->save();

                if ($modelOffer->load(Yii::$app->request->post())) {
                    $modelOffer->part_id = $model->id;
                    if ($modelOffer->price && $modelOffer->store_id) $modelOffer->save();
                }
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'modelOffer' => $modelOffer,
            'data' => ArrayHelper::map(Producer::find()->asArray()->all(), 'id', 'name'),
            'dataSrores' => ArrayHelper::map(Store::find()->asArray()->all(), 'id', 'name'),
        ]);
    }

    /**
     * Deletes an existing Part model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel(Part::class, $id)->delete();

        return $this->redirect(['index']);
    }
}
