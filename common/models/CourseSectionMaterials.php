<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "course_sections_materials".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $course_id
 * @property int|null $course_sections_id
 * @property string|null $description
 */
class CourseSectionMaterials extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'course_sections_materials';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description'],  'required'],
            [['course_id', 'course_sections_id'], 'integer'],
            [['name'], 'string', 'max' => 50,],
            [['description'], 'string', 'max' => 1000, ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'course_id' => 'Course ID',
            'course_sections_id' => 'Course Sections ID',
            'description' => 'Описание',
        ];
    }

    public function getLink($id) {
        return MaterialsLinks::findAll(['course_materials_id' => $id]);
    }

}
