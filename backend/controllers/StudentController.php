<?php

namespace backend\controllers;

use backend\models\Attendance;
use backend\models\Lesson;
use backend\models\Student;
use Yii;
use yii\base\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class StudentController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $students = Student::find()->all();

        return $this->render('index', [
            'students' => $students,
        ]);
    }

    public function actionAttendance($student_id = 1)
    {
        $student = Student::findOne($student_id);
        $lessons = Lesson::find()->all();
        $attendance = Attendance::find()->where(['student_id' => $student_id])->indexBy('lesson_id')->all();

        if (Yii::$app->request->isPost) {

            $post = Yii::$app->request->post();

            foreach ($post as $key => $value) {
                if (strpos($key, 'present_') !== false) {
                    $lesson_id = str_replace('present_', '', $key);
                    $attendance[$lesson_id]->present = $value;
                }
                if (strpos($key, 'grade_') !== false) {
                    $lesson_id = str_replace('grade_', '', $key);
                    $attendance[$lesson_id]->grade = $value;
                }
            }

            foreach ($attendance as $lesson_id => $attendance_item) {
                if ($attendance_item->validate()) {
                    $attendance_item->save(false);
                }
            }

            Yii::$app->session->setFlash('success', 'Посещение и оценки сохранены');
        }

        return $this->render('attendance', [
            'student' => $student,
            'lessons' => $lessons,
            'attendance' => $attendance,
        ]);
    }

}