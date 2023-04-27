<?php

namespace common\components;

class MultiTableDbManager extends \yii\rbac\DbManager
{
    public function getUserTable($userModel)
    {
        if ($userModel instanceof \common\models\User) {
            return '{{%user}}';
        } elseif ($userModel instanceof \backend\models\Student) {
            return '{{%students}}';
        } else {
            throw new \Exception('Invalid user model.');
        }
    }
}