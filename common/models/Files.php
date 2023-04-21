<?php

namespace common\models;

use yii\base\Model;
use yii\db\ActiveRecord;

class Files extends ActiveRecord
{
    public function rules()
    {
        return[
            [['file'], 'string'],
            [['id'], 'number'],
            [['course_sections_id'], 'number'],
            [['course_id'], 'number']
        ];
    }

    public static function tableName()
    {
        return 'course_files';
    }

    public function attributeLabels()
    {
        return [
            'file' => '',
        ];
    }

    public function getFile(int $id){
        $file = Files::findOne(['course_sections_id' => $id]);
        return $file;
    }
}