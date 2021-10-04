<?php
namespace app\modules\cms\controllers;

use Yii;
use yii\db\ActiveRecord;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\web\UnprocessableEntityHttpException;
use yii\web\UploadedFile;
use app\modules\cms\models\AttachmentModel;
use app\modules\cms\models\CmsModel;

class ManageController extends Controller
{
    public $indexView = '/cms/index';

    public $createView = '/cms/create';

    public $updateView = '/cms/update';

    public $searchClass = 'app\modules\cms\models\search\CmsSearch';

    public $modelClass = 'app\modules\cms\models\CmsModel';

    public $attachmentModelClass = 'app\modules\cms\models\AttachmentModel';

    public $verbFilterConfig = [
        'class' => 'yii\filters\VerbFilter',
        'actions' => [
            'index' => ['get'],
            'create' => ['get', 'post'],
            'update' => ['get', 'post'],
            'delete' => ['post'],
            'upload-image' => ['post'],
            'delete-image' => ['post'],
            'images' => ['get'],
        ],
    ];

    public $accessControlConfig = [
        'class' => 'yii\filters\AccessControl',
        'rules' => [
            [
                'allow' => true,
                'roles' => ['admin'],
            ],
        ],
    ];

    public function behaviors(): array
    {
        return [
            'verbs' => $this->verbFilterConfig,
            'access' => $this->accessControlConfig,
        ];
    }

    public function actionIndex()
    {
        $searchModel = Yii::createObject($this->searchClass);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render($this->indexView, [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionCreate()
    {
        $model = Yii::createObject($this->modelClass);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', Yii::t('yii2mod.cms', 'Page has been created.'));

            return $this->redirect(['index']);
        }

        return $this->render($this->createView, [
            'model' => $model,
        ]);
    }

    public function actionUpdate(int $id)
    {
        $model = $this->findModel($this->modelClass, $id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', Yii::t('yii2mod.cms', 'Page has been updated'));

            return $this->redirect(['index']);
        }

        return $this->render($this->updateView, [
            'model' => $model,
        ]);
    }

    public function actionDelete(int $id)
    {
        $this->findModel($this->modelClass, $id)->delete();
        Yii::$app->session->setFlash('success', Yii::t('yii2mod.cms', 'Page has been deleted'));

        return $this->redirect(['index']);
    }

    public function actionUploadImage(): Response
    {
        $model = Yii::createObject($this->attachmentModelClass);
        $model->file = UploadedFile::getInstanceByName('file');

        if (!$model->save()) {
            throw new UnprocessableEntityHttpException($model->getFirstError('file'));
        }

        return $this->asJson([
            'link' => $model->getFileUrl('origin'),
        ]);
    }

    public function actionDeleteImage(): Response
    {
        $model = $this->findModel($this->attachmentModelClass, Yii::$app->request->post('id'));

        $model->delete();

        return $this->asJson([
            'status' => 'success',
        ]);
    }
    
    public function actionImages(): Response
    {
        $result = [];

        foreach (AttachmentModel::find()->each() as $attachment) {
            $result[] = [
                'id' => $attachment->id,
                'url' => $attachment->getFileUrl('origin'),
                'thumb' => $attachment->getFileUrl('thumbnail'),
            ];
        }

        return $this->asJson($result);
    }
    
    protected function findModel($modelClass, $condition)
    {
        if (($model = $modelClass::findOne($condition)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('yii2mod.cms', 'The requested page does not exist.'));
        }
    }
}
