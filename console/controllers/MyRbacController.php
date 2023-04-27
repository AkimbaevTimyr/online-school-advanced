<?php

namespace controllers;

use yii\base\Controller;

class MyRbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        // $auth->removeAll();

        $user = $auth->createRole('user');
        $teacher = $auth->createRole('teacher');
        $admin = $auth->createRole('admin');

        $auth->add($user);
        $auth->add($teacher);
        $auth->add($admin);

        $viewAdminPage = $auth->createPermission('viewAdminPage');
        $viewAdminPage->description = 'Просмотр админ панели';

        $viewUserPage = $auth->createPermission('viewUserPage');
        $viewUserPage->description = 'Просмотр Страницы пользователя';

        $viewTeacherPage = $auth->createPermission('viewTeacherPage');
        $viewTeacherPage->description = 'Просмотр кабинета учителя';

        $auth->add($viewAdminPage);
        $auth->add($viewUserPage);
        $auth->add($viewTeacherPage);

        $auth->addChild($admin, $viewAdminPage);
        $auth->addChild($user, $viewUserPage);
        $auth->addChild($teacher, $viewTeacherPage);

        $auth->assign($admin, 1);
        $auth->assign($teacher, 2);
        $auth->assign($user, 3);

    }
}