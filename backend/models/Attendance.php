<?php

namespace backend\models;
class Attendance extends \yii\db\ActiveRecord
{
    public $student_id;

    public function rules()
    {
        return[
            [['id'], 'required'],
            [['student_id'], 'required'],
            [['lesson_id'], 'required'],
            [['present'], 'required'],
            [['grade'], 'required'],
        ];
    }

    public static function tableName()
    {
        return 'attendance';
    }

    public function attributeLabels()
    {
        return [
            'present' => '',
        ];
    }
}