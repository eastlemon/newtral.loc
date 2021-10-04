<?php

namespace app\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use app\models\forms\ResetPasswordForm;

class AccountController extends \yii\web\Controller
{
    public $identity;

    public function init()
    {
        parent::init();
        $this->identity = Yii::$app->user->identity;
    }

    public function actionIndex()
    {
        $resetPasswordForm = new ResetPasswordForm($this->identity);

        if ($resetPasswordForm->load(Yii::$app->request->post()) && $resetPasswordForm->resetPassword()) {
            Yii::$app->session->setFlash('success', Yii::t('app', 'Password has been updated.'));

            return $this->refresh();
        }

        $favoritesProvider = new ActiveDataProvider([
            'query' => $this->identity->getFavoriteParts(),
        ]);

        $trailersProvider = new ActiveDataProvider([
            'query' => $this->identity->getTrailers(),
        ]);

        return $this->render('index', [
            'identity' => $this->identity,
            'resetPasswordForm' => $resetPasswordForm,
            'favoritesProvider' => $favoritesProvider,
            'trailersProvider' => $trailersProvider,
        ]);
    }

    public function actionAppendTrailer()
    {
        return $this->render('append-trailer', [
            'identity' => $this->identity,
        ]);
    }
}
