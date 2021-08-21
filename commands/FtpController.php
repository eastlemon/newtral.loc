<?php
namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use yii2mod\ftp\FtpClient;

class FtpController extends Controller
{
    public function actionGet1c()
    {
        $settings = Yii::$app->settings;

        $ftp = new FtpClient();
        $ftp->connect($settings->get('ftp', 'url'));
        $ftp->login($settings->get('ftp', 'username'), $settings->get('ftp', 'password'));
        $ftp->pasv(true); // !important
        $ftp->getAll($settings->get('ftp', 'host_folder'), $settings->get('ftp', 'local_folder'));

        return ExitCode::OK;
    }
}
