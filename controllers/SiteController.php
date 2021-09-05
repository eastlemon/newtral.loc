<?php

namespace app\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii2mod\rbac\filters\AccessControl;
use yii2mod\user\traits\EventTrait;
use app\modules\cms\models\CmsModel;
use app\models\forms\ContactForm;
use app\models\forms\ResetPasswordForm;
use app\models\Slide;

class SiteController extends Controller
{
    use EventTrait;

    const EVENT_BEFORE_SIGNUP = 'beforeSignup';
    const EVENT_AFTER_SIGNUP = 'afterSignup';

    public $loginModelClass = 'yii2mod\user\models\LoginForm';
    public $signupModelClass = 'yii2mod\user\models\SignupForm';

    public $commentWidgetParams = [];

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
                    'page' => ['get', 'post'],
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
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
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
            'page' => [
                'class' => 'app\modules\cms\actions\PageAction',
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
            'slides' => Slide::find()->all(),
        ]);
    }

    public function actionContact()
    {
        $model = new ContactForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->contact(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', Yii::t('app', 'Thank you for contacting us. We will respond to you as soon as possible.'));
            } else {
                Yii::$app->session->setFlash('error', Yii::t('app', 'There was an error sending email.'));
            }

            return $this->refresh();
        }

        if (!$cmsModel = (new CmsModel)->findPage('site/contact')) {
            throw new NotFoundHttpException(Yii::t('yii2mod.cms', 'The requested page does not exist.'));
        }

        return $this->render('contact', [
            'model' => $model,
            'cmsModel' => $cmsModel,
            'commentWidgetParams' => $this->commentWidgetParams,
        ]);
    }

    public function actionAccount()
    {
        $resetPasswordForm = new ResetPasswordForm(Yii::$app->user->identity);

        if ($resetPasswordForm->load(Yii::$app->request->post()) && $resetPasswordForm->resetPassword()) {
            Yii::$app->session->setFlash('success', Yii::t('app', 'Password has been updated.'));

            return $this->refresh();
        }

        return $this->render('account', [
            'resetPasswordForm' => $resetPasswordForm,
        ]);
    }
}