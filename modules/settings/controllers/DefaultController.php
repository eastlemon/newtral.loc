<?php

namespace app\modules\settings\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class DefaultController extends Controller
{
    public $indexView = '/default/index';
    public $createView = '/default/create';
    public $updateView = '/default/update';
    public $searchClass = 'yii2mod\settings\models\search\SettingSearch';
    public $modelClass = 'yii2mod\settings\models\SettingModel';

    public function behaviors(): array
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'index' => ['get'],
                    'create' => ['get', 'post'],
                    'update' => ['get', 'post'],
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = Yii::createObject($this->searchClass);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render($this->indexView, [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = Yii::createObject($this->modelClass);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', Yii::t('yii2mod.settings', 'Setting has been created.'));

            return $this->redirect(['index']);
        } else {
            return $this->render($this->createView, [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate(int $id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', Yii::t('yii2mod.settings', 'Setting has been updated.'));

            return $this->redirect(['index']);
        } else {
            return $this->render($this->updateView, [
                'model' => $model,
            ]);
        }
    }

    public function actionDelete(int $id)
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', Yii::t('yii2mod.settings', 'Setting has been deleted.'));

        return $this->redirect(['index']);
    }

    protected function findModel(int $id)
    {
        $settingModelClass = $this->modelClass;

        if (($model = $settingModelClass::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('yii2mod.settings', 'The requested page does not exist.'));
        }
    }
}
