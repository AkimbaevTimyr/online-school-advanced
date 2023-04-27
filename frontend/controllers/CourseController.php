<?php

namespace frontend\controllers;

use common\models\Courses;
use common\models\CourseSections;
use common\models\StartScreen;
use Yii;
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

    public function actionCourse()
    {
        $id = $_GET['id'];

        if (!$id) {
            throw new \yii\web\NotFoundHttpException('Курс не найден');
        }

        $course = Courses::findOne(['id' => $id]);
        $courseInformation = StartScreen::findOne(['course_id' => $id]);
        $courseSections = CourseSections::find()->where(['course_id' => $id])->all();

        return $this->render('course', [
            'courseInformation' => $courseInformation,
            'courseSections' => $courseSections,
            'course' => $course,
            'sectionsCount' => count($courseSections)
        ]);
    }

    public function actionCourses(): string
    {
        $connection = Yii::$app->db;
        $command = $connection->createCommand('
            SELECT courses.id, courses.name, course_information.background_color, course_information.course_time
            FROM courses
            JOIN course_information ON courses.id = course_information.course_id
        ');
        $courses = $command->queryAll();
        return $this->render('courses',[
            'courses' => $courses
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