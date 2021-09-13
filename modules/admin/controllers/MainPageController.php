<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use yii\base\DynamicModel;

class MainPageController extends Controller
{
    public function actionIndex()
    {
        $settings = Yii::$app->settings;

        $model = new DynamicModel(['block5Header', 'block5Content']);
        $model->addRule(['block5Header', 'block5Content'], 'safe');

        $model->block5Header = $settings->get('mainPage', 'block5Header');
        $model->block5Content = $settings->get('mainPage', 'block5Content');

        if ($model->load(Yii::$app->request->post())) {
            $settings->set('mainPage', 'block5Header', str_replace('&nbsp;', ' ', $model->block5Header));
            $settings->set('mainPage', 'block5Content', str_replace('&nbsp;', ' ', $model->block5Content));
            Yii::$app->session->setFlash('success', Yii::t('app', 'Saved!'));
            return $this->redirect(['index']);
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }
}
