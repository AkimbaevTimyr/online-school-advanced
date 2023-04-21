<?php

namespace common\models;

use yii\db\ActiveRecord;

class CourseSections extends ActiveRecord
{
    public function rules()
    {
        return[
            [['name'], 'required'],
            [['course_id'], 'required'],
            [['course_sections_id'], 'required'],
        ];
    }

    public static function tableName()
    {
        return 'course_sections';
    }

    public function attributeLabels()
    {
        return [
            'name' => '',
        ];
    }
}