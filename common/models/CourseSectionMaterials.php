<?php

namespace common\models;

use yii\db\ActiveRecord;

class CourseSectionMaterials extends ActiveRecord
{
    public function rules()
    {
        return[
            [['id'], 'number'],
            [['name'], 'required'],
            [['course_id'], 'required'],
            [['course_sections_id'], 'required'],
            [['description'], 'required'],
        ];
    }

    public static function tableName()
    {
        return 'course_sections_materials';
    }

    public function attributeLabels()
    {
        return [
            'name' => '',
        ];
    }

    public function getLink($id)
    {
        return MaterialsLinks::findOne(['course_materials_id' => $id]);
    }
}