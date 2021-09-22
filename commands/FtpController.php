<?php
namespace app\commands;

use Yii;
use yii\console\Controller;
use yii\console\ExitCode;
use yii2mod\ftp\FtpClient;

class FtpController extends Controller
{
    public function actionGet1c()
    {
        $settings = Yii::$app->settings;
        $local_folder = $settings->get('ftp', 'local_folder');

        if (!file_exists($local_folder)) {
            mkdir($local_folder, 0777, true);
        }

        $ftp = new FtpClient();
        $ftp->connect($settings->get('ftp', 'url'));
        $ftp->login($settings->get('ftp', 'username'), $settings->get('ftp', 'password'));
        $ftp->pasv(true); // important passive mode!
        $ftp->getAll($settings->get('ftp', 'host_folder'), $local_folder);

        return ExitCode::OK;
    }
}
