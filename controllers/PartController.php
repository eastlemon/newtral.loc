<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\ActiveDataProvider;
use app\models\Part;
use app\models\Offer;
use app\models\PartAnalogue;
use app\models\PartCertificate;

class PartController extends Controller
{    
    public function actionIndex($name)
    {
        $model = Part::find()->andFilterWhere(['=', 'slug', $name])->one();

        $offerProvider = new ActiveDataProvider([
            'query' => Offer::find()->andFilterWhere(['=', 'part_id', $model->id]),
        ]);

        $analogueProvider = new ActiveDataProvider([
            'query' => PartAnalogue::find()->andFilterWhere(['=', 'part_id', $model->id]),
        ]);

        $certificateProvider = new ActiveDataProvider([
            'query' => PartCertificate::find()->andFilterWhere(['=', 'part_id', $model->id]),
        ]);

        return $this->render('index', [
            'model' => $model,
            'offerProvider' => $offerProvider,
            'analogueProvider' => $analogueProvider,
            'certificateProvider' => $certificateProvider,
        ]);
    }
}