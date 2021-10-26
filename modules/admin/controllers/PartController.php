<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use app\traits\FindModelTrait;
use app\models\Part;
use app\models\Producer;
use app\models\PartPicture;
use app\models\Offer;
use app\models\Certificate;
use app\models\Store;
use app\models\PartCertificate;

class PartController extends Controller
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
            'query' => Part::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel(Part::class, $id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Part();
        $modelOffer = new Offer(['scenario' => 'create']);
        $modelPartPicture = new PartPicture(['scenario' => 'create']);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($certificates = $model->certificate_ids) {
                foreach ($certificates as $item) {
                    $partCertificate = new PartCertificate();
                    $partCertificate->part_id = $model->id;
                    $partCertificate->certificate_id = $item;
                    $partCertificate->save();
                }
            }

            if ($modelOffer->load(Yii::$app->request->post())) {
                $modelOffer->part_id = $model->id;
                $modelOffer->save();
            }

            $modelPartPicture->part_id = $model->id;
            $modelPartPicture->save();

            Yii::$app->session->setFlash('success', Yii::t('app', 'Record created!') . ' <a href="' . Url::toRoute(['part/create']) . '">' . Yii::t('app', 'Create') . '</a>');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'modelOffer' => $modelOffer,
            'modelPartPicture' => $modelPartPicture,
            'data' => ArrayHelper::map(Producer::find()->asArray()->all(), 'id', 'name'),
            'dataParts' => ArrayHelper::map(Part::find()->asArray()->all(), 'id', 'articul'),
            'dataStores' => ArrayHelper::map(Store::find()->asArray()->all(), 'id', 'name'),
            'dataCertificates' => ArrayHelper::map(Certificate::find()->asArray()->all(), 'id', 'name'),
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel(Part::class, $id);
        $modelOffer = new Offer();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($certs = $model->certificate_ids) {
                PartCertificate::deleteAll(['part_id' => $model->id]);
                foreach ($certs as $item) {
                    $partCertificate = new PartCertificate();
                    $partCertificate->part_id = $model->id;
                    $partCertificate->certificate_id = $item;
                    $partCertificate->save();
                }
            }

            if ($modelOffer->load(Yii::$app->request->post())) {
                $modelOffer->part_id = $model->id;
                if ($modelOffer->price && $modelOffer->store_id) $modelOffer->save();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'modelOffer' => $modelOffer,
            'data' => ArrayHelper::map(Producer::find()->asArray()->all(), 'id', 'name'),
            'dataParts' => ArrayHelper::map(Part::find()->asArray()->all(), 'id', 'articul'),
            'dataStores' => ArrayHelper::map(Store::find()->asArray()->all(), 'id', 'name'),
            'dataCertificates' => ArrayHelper::map(Certificate::find()->asArray()->all(), 'id', 'name'),
            'selectedCertificates' => ArrayHelper::getColumn(PartCertificate::find()->where(['part_id' => $model->id])->asArray()->all(), 'certificate_id'),
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel(Part::class, $id)->delete();

        return $this->redirect(['index']);
    }
}
