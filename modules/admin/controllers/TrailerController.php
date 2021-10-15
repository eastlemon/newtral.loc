<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\base\DynamicModel;
use app\traits\FindModelTrait;
use app\models\Trailer;
use app\models\Producer;
use app\models\Type;
use app\models\Mode;
use app\models\Axis;
use app\models\Chassis;
use app\models\Category;
use app\models\TrailerCategory;

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
            'sort' => [
                'attributes' => ['name']
            ]
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
        
        $cmodel = new DynamicModel(['c1', 'c2', 'c3', 'c4', 'c5', 'c6', 'c7']);
        $cmodel->addRule(['c1', 'c2', 'c3', 'c4', 'c5', 'c6', 'c7'], 'safe');
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($cmodel->load(Yii::$app->request->post())) {
                $data = [];
                if ($cmodel->c1) $data[] = [1, $model->id, $cmodel->c1];
                if ($cmodel->c2) $data[] = [2, $model->id, $cmodel->c2];
                if ($cmodel->c3) $data[] = [3, $model->id, $cmodel->c3];
                if ($cmodel->c4) $data[] = [4, $model->id, $cmodel->c4];
                if ($cmodel->c5) $data[] = [5, $model->id, $cmodel->c5];
                if ($cmodel->c6) $data[] = [6, $model->id, $cmodel->c6];
                if ($cmodel->c7) $data[] = [7, $model->id, $cmodel->c7];
                Yii::$app->db->createCommand()->batchInsert('trailer_category', ['num', 'trailer_id', 'category_id'], $data)->execute();
            }

            Yii::$app->session->setFlash('success', Yii::t('app', 'Record created!') . ' <a href="' . Url::toRoute(['trailer/create']) . '">' . Yii::t('app', 'Create') . '</a>');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'cmodel' => $cmodel,
            'producers' => ArrayHelper::map(Producer::find()->asArray()->all(), 'id', 'name'),
            'types' => ArrayHelper::map(Type::find()->asArray()->all(), 'id', 'name'),
            'modes' => ArrayHelper::map(Mode::find()->asArray()->all(), 'id', 'name'),
            'axes' => ArrayHelper::map(Axis::find()->asArray()->all(), 'id', 'name'),
            'chassis' => ArrayHelper::map(Chassis::find()->asArray()->all(), 'id', 'name'),
            'categories' => ArrayHelper::map(Category::find()->asArray()->all(), 'id', 'name'),
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel(Trailer::class, $id);
        $trailerCategories = $model->trailerCategories;

        $cmodel = new DynamicModel(['c1', 'c2', 'c3', 'c4', 'c5', 'c6', 'c7']);
        $cmodel->addRule(['c1', 'c2', 'c3', 'c4', 'c5', 'c6', 'c7'], 'safe');
        foreach ($trailerCategories as $item) {
            if ($item->num == 1) $cmodel->c1 = $item->category;
            if ($item->num == 2) $cmodel->c2 = $item->category;
            if ($item->num == 3) $cmodel->c3 = $item->category;
            if ($item->num == 4) $cmodel->c4 = $item->category;
            if ($item->num == 5) $cmodel->c5 = $item->category;
            if ($item->num == 6) $cmodel->c6 = $item->category;
            if ($item->num == 7) $cmodel->c7 = $item->category;
        }
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($cmodel->load(Yii::$app->request->post())) {
                Yii::$app->db->createCommand()->delete('trailer_category', ['trailer_id' => $model->id])->execute();

                $data = [];
                if ($cmodel->c1) $data[] = [1, $model->id, $cmodel->c1];
                if ($cmodel->c2) $data[] = [2, $model->id, $cmodel->c2];
                if ($cmodel->c3) $data[] = [3, $model->id, $cmodel->c3];
                if ($cmodel->c4) $data[] = [4, $model->id, $cmodel->c4];
                if ($cmodel->c5) $data[] = [5, $model->id, $cmodel->c5];
                if ($cmodel->c6) $data[] = [6, $model->id, $cmodel->c6];
                if ($cmodel->c7) $data[] = [7, $model->id, $cmodel->c7];
                Yii::$app->db->createCommand()->batchInsert('trailer_category', ['num', 'trailer_id', 'category_id'], $data)->execute();
            }

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'cmodel' => $cmodel,
            'producers' => ArrayHelper::map(Producer::find()->asArray()->all(), 'id', 'name'),
            'types' => ArrayHelper::map(Type::find()->asArray()->all(), 'id', 'name'),
            'modes' => ArrayHelper::map(Mode::find()->asArray()->all(), 'id', 'name'),
            'axes' => ArrayHelper::map(Axis::find()->asArray()->all(), 'id', 'name'),
            'chassis' => ArrayHelper::map(Chassis::find()->asArray()->all(), 'id', 'name'),
            'categories' => ArrayHelper::map(Category::find()->asArray()->all(), 'id', 'name'),
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
