<?php

namespace app\controllers;

use yii\web\Controller;
use app\api\ApiDjango;
use yii\data\ActiveDataProvider;
use app\models\DictionaryPartmanufacturer;
use app\models\CatalogPart;

class TestController extends Controller
{
    public function actionGetSemitrailerTypes()
    {
        //$api = new ApiDjango();
        //var_dump($api->get_semitrailer_types());
        //var_dump($api->get_semitrailer_modes());
        //var_dump($api->get_semitrailer_axis());
        //var_dump($api->get_semitrailer_manufacturers());
        //var_dump($api->get_chassis_types());
        //var_dump($api->get_chassis_manufacturers());
        //var_dump($api->get_node_manufacturers());
        //var_dump($api->get_node_types());
        //var_dump($api->get_part_manufacturers());
    }

    public function actionPart($id)
    {
        $model = CatalogPart::findModel($id);

        return $this->render('part', [
            'model' => $model,
        ]);
    }

    public function actionManufacturers()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => DictionaryPartmanufacturer::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        return $this->render('manufacturers', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionPartsByManufacturer($id)
    {
        $model = DictionaryPartmanufacturer::findModel($id);

        $dataProvider = new ActiveDataProvider([
            'query' => $model->getCatalogParts(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        return $this->render('prts-by-m', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionPartsByGroups()
    {
        return $this->render('prts-by-g', [
            'content' => 'g'
        ]);
    }
}