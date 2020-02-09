<?php


namespace app\commands;


use yii\console\Controller;

class RbacController extends Controller
{
    public function actionIndex()
    {
        $am = \Yii::$app->authManager;

        $permissionTaskCreate = $am->createPermission('TaskCreate');
        $permissionTaskUpdate = $am->createPermission('TaskUpdate');
        $permissionTaskDelete = $am->createPermission('TaskDelete');

        $am->add($permissionTaskCreate);
        $am->add($permissionTaskUpdate);
        $am->add($permissionTaskDelete);

        $admin = $am->createRole('admin');
        $moder = $am->createRole('moder');

        $am->add($admin);
        $am->add($moder);

        $am->addChild($admin, $permissionTaskCreate);
        $am->addChild($admin, $permissionTaskUpdate);
        $am->addChild($admin, $permissionTaskDelete);

        $am->addChild($moder, $permissionTaskCreate);
        $am->addChild($moder, $permissionTaskUpdate);

        $am->assign($admin, 1);
        $am->assign($moder, 2);
    }
}