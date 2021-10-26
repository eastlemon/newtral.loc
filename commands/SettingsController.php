<?php

namespace app\commands;

use Yii;
use yii\console\Controller;
use yii\console\ExitCode;

class SettingsController extends Controller
{
    protected $settings;

    public function init()
    {
        parent::init();
        $this->settings = Yii::$app->settings;
    }

    public function actionSetDefaults()
    {
        $this->settings->set('mainPage', 'phone', '8 (800) 777-55-42');
        $this->settings->set('mainPage', 'workTime', 'с 8:00 до 18:00');
        $this->settings->set('mainPage', 'email', 'sales@tralrf.ru');
        $this->settings->set('mainPage', 'whatsapp_link', 'https://wa.me/79991573044?text=Здравствуйте!');
        $this->settings->set('mainPage', 'telegram-link', 'https://t.me/@groupname');
        $this->settings->set('mainPage', 'viber-link', 'https://invite.viber.com/?g=Q3T13DRP_Udst0cCR8_4QJUJ20D2-6E7');
        $this->settings->set('mainPage', 'startYear', '2004');
        $this->settings->set('mainPage', 'copyrightText', 'Все права защищены');

        $this->settings->set('ftp', 'url', 'tralrf.ru');
        $this->settings->set('ftp', 'username', 'tral2_skladupload');
        $this->settings->set('ftp', 'password', 'V9Bmby63kG');
        $this->settings->set('ftp', 'host_folder', '/');
        $this->settings->set('ftp', 'local_folder', 'web/uploads/1c');

        return ExitCode::OK;
    }
}
