<?php

namespace app\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii2mod\rbac\filters\AccessControl;
use yii2mod\user\traits\EventTrait;
use app\models\Slide;
use app\models\Producer;
use app\models\Category;
use app\models\Part;

class SiteController extends \yii\web\Controller
{
    use EventTrait;
    
    const EVENT_BEFORE_SIGNUP = 'beforeSignup';
    const EVENT_AFTER_SIGNUP = 'afterSignup';

    public $loginModelClass = 'yii2mod\user\models\LoginForm';
    
    public $signupModelClass = 'yii2mod\user\models\SignupForm';

    public function behaviors(): array
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => [
                    'login',
                    'logout',
                    'signup',
                    'request-password-reset',
                    'password-reset',
                    'account',
                ],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login', 'signup', 'request-password-reset', 'password-reset'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logout', 'account'],
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'index' => ['get'],
                    'contact' => ['get', 'post'],
                    'account' => ['get', 'post'],
                    'login' => ['get', 'post'],
                    'logout' => ['post'],
                    'signup' => ['get', 'post'],
                    'request-password-reset' => ['get', 'post'],
                    'password-reset' => ['get', 'post'],
                ],
            ],
        ];
    }

    public function actions(): array
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            /*'login' => [
                'class' => 'yii2mod\user\actions\LoginAction',
            ],*/
            'logout' => [
                'class' => 'yii2mod\user\actions\LogoutAction',
            ],
            /*'signup' => [
                'class' => 'yii2mod\user\actions\SignupAction',
            ],*/
            'request-password-reset' => [
                'class' => 'yii2mod\user\actions\RequestPasswordResetAction',
            ],
            'password-reset' => [
                'class' => 'yii2mod\user\actions\PasswordResetAction',
            ],
        ];
    }

    public function actionSignup()
    {
        $model = Yii::createObject($this->signupModelClass);
        $event = $this->getFormEvent($model);

        $this->trigger(self::EVENT_BEFORE_SIGNUP, $event);

        $load = $model->load(Yii::$app->request->post());

        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;

            return ActiveForm::validate($model);
        }

        if ($load && ($user = $model->signup()) !== null) {
            $this->trigger(self::EVENT_AFTER_SIGNUP, $event);
            if (Yii::$app->getUser()->login($user)) {
                return $this->redirect(Yii::$app->getUser()->getReturnUrl());
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(Yii::$app->getHomeUrl());
        }

        $model = Yii::createObject($this->loginModelClass);
        $load = $model->load(Yii::$app->request->post());

        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;

            return ActiveForm::validate($model);
        }

        if ($load && $model->login()) {
            return $this->redirect(Yii::$app->getUser()->getReturnUrl());
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionIndex()
    {
        return $this->render('index', [
            'mainPage' => Yii::$app->settings->getAllBySection('mainPage'),
            'slides' => Slide::find()->all(),
            'producers' => Producer::find()->where(['in_menu' => 1])->all(),
            'categories' => Category::getPopularRoots(),
            'profitParts' => Part::getProfit(),
        ]);
    }
}
