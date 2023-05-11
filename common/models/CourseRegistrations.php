<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "course_registrations".
 *
 * @property int $id
 * @property string $name
 * @property int $phone_number
 * @property string $email
 */
class CourseRegistrations extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'course_registrations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'phone_number', 'email'], 'required'],
            [['phone_number'], 'integer'],
            [['name', 'email'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'phone_number' => 'Phone Number',
            'email' => 'Email',
        ];
    }
}
