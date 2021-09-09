<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use app\traits\FindModelTrait;
use app\models\UserModel;
use app\modules\admin\models\search\UserSearch;

class UserController extends Controller
{
    use FindModelTrait;

    const ORIGINAL_USER_SESSION_KEY = 'original_user';

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
    
    public function actions(): array
    {
        return [
            'index' => [
                'class' => 'yii2tech\admin\actions\Index',
                'newSearchModel' => function () {
                    return new UserSearch();
                },
            ],
            'delete' => [
                'class' => 'yii2tech\admin\actions\Delete',
                'findModel' => function (int $id) {
                    return $this->findModel(UserModel::class, $id);
                },
                'flash' => Yii::t('app', 'User has been deleted.'),
            ],
        ];
    }
    
    public function actionCreate()
    {
        $model = new UserModel(['scenario' => 'create']);

        if ($model->load(Yii::$app->request->post())) {
            if ($model->create()) {
                Yii::$app->session->setFlash('success', Yii::t('app', 'User has been created.'));

                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate(int $id)
    {
        $model = $this->findModel(UserModel::class, $id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if (!empty($model->plainPassword)) {
                $model->setPassword($model->plainPassword);
            }
            $model->save(false);
            Yii::$app->session->setFlash('success', Yii::t('app', 'User has been saved.'));

            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    
    public function actionSwitch(int $id)
    {
        if (Yii::$app->session->has(self::ORIGINAL_USER_SESSION_KEY)) {
            $user = $this->findModel(UserModel::class, Yii::$app->session->get(self::ORIGINAL_USER_SESSION_KEY));
            Yii::$app->session->remove(self::ORIGINAL_USER_SESSION_KEY);
        } else {
            $user = $this->findModel(UserModel::class, $id);
            Yii::$app->session->set(self::ORIGINAL_USER_SESSION_KEY, Yii::$app->user->id);
        }

        Yii::$app->user->switchIdentity($user, 3600);

        return $this->goHome();
    }
}
