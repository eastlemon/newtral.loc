<?php

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use yii\rbac\DbManager;

class RoleController extends Controller
{
    public function actionCreateDefaults()
    {
        $authManager = new DbManager();

        $user = $authManager->createRole('user');
        $admin = $authManager->createRole('admin');

        $authManager->add($user);
        $authManager->add($admin);

        return ExitCode::OK;
    }

    public function actionAssign($role, $user_id)
    {
        $authManager = new DbManager();

        $role = $authManager->getRole($role);
        $authManager->assign($role, $user_id);

        return ExitCode::OK;
    }

    public function actionRevoke($role, $user_id)
    {
        $authManager = new DbManager();

        $role = $authManager->getRole($role);
        $authManager->revoke($role, $user_id);

        return ExitCode::OK;
    }

    public function actionAddChild($role, $child)
    {
        $authManager = new DbManager();

        $role = $authManager->getRole($role);
        $child = $authManager->getRole($child);
        $authManager->addChild($role, $child);

        return ExitCode::OK;
    }

    public function actionRemoveChild($role, $child)
    {
        $authManager = new DbManager();

        $role = $authManager->getRole($role);
        $child = $authManager->getRole($child);
        $authManager->removeChild($role, $child);

        return ExitCode::OK;
    }
}
