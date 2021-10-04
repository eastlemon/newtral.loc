<?php

namespace app\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use app\modules\cms\models\CmsModel;
use app\models\forms\ContactForm;
use app\models\forms\ResetPasswordForm;
use app\models\OldSemitrailer;
use yii\data\ActiveDataProvider;

class PageController extends \yii\web\Controller
{
    public $commentWidgetParams = [];

    public function actions(): array
    {
        return [
            /*'parts-catalog' => [
                'class' => 'app\modules\cms\actions\PageAction',
                'pageId' => 7,
            ],*/
            /*'about' => [
                'class' => 'app\modules\cms\actions\PageAction',
                'pageId' => 6,
            ],*/
            'news' => [
                'class' => 'app\modules\cms\actions\PageAction',
                'pageId' => 5,
            ],
            'delivery' => [
                'class' => 'app\modules\cms\actions\PageAction',
                'pageId' => 4,
            ],
            /*'contact' => [
                'class' => 'app\modules\cms\actions\PageAction',
                'pageId' => 3,
            ],*/
        ];
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

        if (!$cmsModel = CmsModel::findPage('page/contact')) {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }

        return $this->render('contact', [
            'model' => $model,
            'cmsModel' => $cmsModel,
            'commentWidgetParams' => $this->commentWidgetParams,
            'coordinates' => [55.18587456663644, 61.28186085449207],
        ]);
    }

    public function actionAbout()
    {
        if (!$cmsModel = CmsModel::findPage('page/about')) {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }

        return $this->render('about', [
            'cmsModel' => $cmsModel,
            'commentWidgetParams' => $this->commentWidgetParams,
        ]);
    }
}
