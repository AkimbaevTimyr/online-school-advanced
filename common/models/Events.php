<?php

namespace common\models;

use yii\db\ActiveRecord;

class Events extends ActiveRecord
{
    public function rules()
    {
        return[
            [['title'], 'required'],
            [['description'], 'required'],
            [['course_id'], 'required'],
            [['created_date'], 'required'],
            [['created_date_end'], 'required'],
        ];
    }

    public static function tableName()
    {
        return 'events';
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Тема урока',
            'description' => 'Описание урока',
            'created_date' => 'Начало урока',
            'created_date_end' => 'Конец урока',
        ];
    }
}