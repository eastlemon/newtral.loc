<?php

namespace app\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use app\traits\FindModelTrait;
use app\models\OldSemitrailer;
use app\models\OldUnit;
use app\models\OldNode;
use app\models\OldPart;

use app\models\OldSemitrailerModel;
use app\models\OldSemitrailerAxis;
use app\models\OldSemitrailerManufacturer;
use app\models\OldSemitrailerMode;
use app\models\OldSemitrailerType;

class OldController extends \yii\web\Controller
{
    use FindModelTrait;
    
    public $commentWidgetParams = [];
    
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => OldSemitrailerType::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /*public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => OldSemitrailerModel::find()->where(['semitrailer_manufacturer_id' => 4]),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }*/
    

    public function actionSemitrailers()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => OldSemitrailer::find(),
        ]);

        return $this->render('semitrailers', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionUnits($id)
    {
        $model = $this->findModel(OldSemitrailer::class, ['id' => $id]);
        
        $dataProvider = new ActiveDataProvider([
            'query' => $model->getUnits(),
        ]);

        return $this->render('units', [
            'dataProvider' => $dataProvider,
            'uid' => $id,
        ]);
    }

    public function actionNodes($id, $unit_id)
    {
        $model = $this->findModel(OldUnit::class, ['id' => $id]);
        
        $dataProvider = new ActiveDataProvider([
            'query' => $model->getNodes(),
        ]);

        return $this->render('nodes', [
            'dataProvider' => $dataProvider,
            'nid' => $id,
            'unit_id' => $unit_id,
        ]);
    }

    public function actionParts($id, $unit_id, $node_id)
    {
        $model = $this->findModel(OldNode::class, ['id' => $id]);
        
        $dataProvider = new ActiveDataProvider([
            'query' => $model->getNodeParts()->groupBy(['part_id']),
        ]);

        return $this->render('parts', [
            'dataProvider' => $dataProvider,
            'pid' => $id,
            'unit_id' => $unit_id,
            'node_id' => $node_id,
        ]);
    }

    public function actionPart($id, $unit_id, $node_id, $part_id)
    {
        $model = $this->findModel(OldPart::class, ['id' => $id]);

        return $this->render('part', [
            'model' => $model,
            'unit_id' => $unit_id,
            'node_id' => $node_id,
            'part_id' => $part_id,
        ]);
    }
}
