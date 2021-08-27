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
use app\models\PartOffer;

/**
 * PartController implements the CRUD actions for Part model.
 */
class PartController extends Controller
{
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
            'model' => $this->findModel($id),
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

        if ($model->load(Yii::$app->request->post())) {
            $uploadModel = new UploadForm();
            $uploadModel->uploadFile = UploadedFile::getInstance($model, 'picture');
            
            if ($model->save()) {
                $partPicture = new PartPicture();
                $partPicture->picture = $uploadModel->upload();
                $partPicture->part_id = $model->id;
                $partPicture->save();

                $partOffer = new PartOffer();
                $partOffer->price = $model->offer;
                $partOffer->part_id = $model->id;
                $partOffer->save();

                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'data' => ArrayHelper::map(Producer::find()->asArray()->all(), 'id', 'name'),
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
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $uploadModel = new UploadForm();
            $uploadModel->uploadFile = UploadedFile::getInstance($model, 'picture');
            
            if ($model->save()) {
                $partPicture = new PartPicture();
                $partPicture->picture = $uploadModel->upload();
                $partPicture->part_id = $model->id;
                $partPicture->save();

                $partOffer = new PartOffer();
                $partOffer->price = $model->offer;
                $partOffer->part_id = $model->id;
                $partOffer->save();

                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'data' => ArrayHelper::map(Producer::find()->asArray()->all(), 'id', 'name'),
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
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Part model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Part the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Part::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
