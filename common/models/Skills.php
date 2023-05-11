<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "skills".
 *
 * @property int $id
 * @property string $title
 * @property int $subtitle
 */
class Skills extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'skills';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'subtitle'], 'required'],
            [['subtitle'], 'integer'],
            [['title'], 'string', 'max' => 56],
            [['course_id'], 'required']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'subtitle' => 'Описание',
        ];
    }
}
