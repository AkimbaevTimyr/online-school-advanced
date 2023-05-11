<?php

namespace frontend\controllers;

use common\models\CourseRegistrations;
use common\models\Courses;
use common\models\CourseSectionMaterials;
use common\models\CourseSections;
use common\models\StartScreen;
use Yii;
use yii\base\Controller;
use yii\filters\AccessControl;
use yii\helpers\Json;
use yii\helpers\VarDumper;

class CourseController extends Controller
{
    public $layout = 'main';

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

        $connection = Yii::$app->db;
        $command = $connection->createCommand('
               SELECT 
                    courses.id, 
                    courses.name, 
                    course_information.title, 
                    course_information.description, 
                    course_information.img, 
                    course_information.course_time, 
                    course_information.course_price, 
                    course_information.background_color, 
                    course_information.about_profession,
                    (SELECT COUNT(*) FROM course_sections WHERE course_id = :id) AS sections_count,
                    (SELECT COUNT(*) FROM course_sections_materials WHERE course_id = :id) AS sections_materials_count
                FROM courses
                JOIN course_information ON courses.id = course_information.course_id
                WHERE courses.id = :id
        ');
        $command->bindValue(':id', $id);
        $course = $command->queryAll();

        $sections = CourseSections::find()->where(['course_id' => $id])->all();

        return $this->render('course', [
            'sections' => $sections,
            'course' => $course[0]
        ]);
    }

    public function actionCourses(): string
    {
        $connection = Yii::$app->db;
        $command = $connection->createCommand('
            SELECT courses.id, courses.name, course_information.background_color, course_information.course_time, course_information.img
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
        $connection = Yii::$app->db;
        $command = $connection->createCommand('
            SELECT courses.id, courses.name, course_information.background_color, course_information.course_time, course_information.img
            FROM courses
            JOIN course_information ON courses.id = course_information.course_id
            LIMIT 3
        ');
        $courses = $command->queryAll();
        return $this->render('main', [
            'courses' => $courses,
        ]);
    }

    public function actionRegistration() {
        $model = new CourseRegistrations();


        $model->name = $_POST['name'];
        $model->phone_number = $_POST['phoneNumber'];
        $model->email = $_POST['email'];

        $model->save(false);
    }

}