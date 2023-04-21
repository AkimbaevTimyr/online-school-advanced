<?php

namespace backend\models;

class Student extends  \yii\db\ActiveRecord
{
    public function rules()
    {
        return[
            [['id'], 'required'],
            [['name'], 'required'],
        ];
    }

    public static function tableName()
    {
        return 'students';
    }
}