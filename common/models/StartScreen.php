<?php

namespace common\models;

use yii\db\ActiveRecord;

class StartScreen extends ActiveRecord
{
    public function rules()
    {
        return[
            [['title'], 'required'],
            [['description'], 'required'],
            [['img'], 'required'],
            [['course_time'], 'required'],
            [['portfolio_projects'], 'required'],
            [['about_profession'], 'required'],
            [['skills'], 'required'],
            [['background_color'], 'required'],
            [['course_id'], 'required']
        ];
    }

    public static function tableName()
    {
        return 'course_information';
    }
}