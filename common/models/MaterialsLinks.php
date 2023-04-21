<?php

namespace common\models;

use yii\db\ActiveRecord;

class MaterialsLinks extends ActiveRecord
{
    public function rules()
    {
        return[
            [['link'], 'string'],
            [['course_materials_id'], 'required'],
        ];
    }

    public static function tableName()
    {
        return 'materials_links';
    }

    public function attributeLabels()
    {
        return [
            'link' => '',
        ];
    }
}