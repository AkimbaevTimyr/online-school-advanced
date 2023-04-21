<?php

namespace frontend\controllers;

use common\models\Courses;
use common\models\CourseSections;
use common\models\StartScreen;
use yii\base\Controller;
use yii\filters\AccessControl;

class CourseController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['?'],
                'rules' => [
                    [
                        'actions' => ['?'],
                        'allow' => true,
                    ],
                    [
                        'actions' => [''],
                        'allow' => true,
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $id = $_GET['id'];

        if (!$id) {
            throw new \yii\web\NotFoundHttpException('Курс не найден');
        }

        $course = Courses::findOne(['id' => $id]);
        $courseInformation = StartScreen::findOne(['course_id' => $id]);
        $courseSections = CourseSections::find()->where(['course_id' => $id])->all();

        return $this->render('index', [
            'courseInformation' => $courseInformation,
            'courseSections' => $courseSections,
            'course' => $course,
            'sectionsCount' => count($courseSections)
        ]);
    }

    public  function actionMain(): string
    {
        $courses = Courses::find()->limit(3)->all();
        return $this->render('main', [
            'courses' => $courses
        ]);
    }

}