<?php

namespace frontend\controllers;

use common\models\Courses;
use common\models\CourseSectionMaterials;
use common\models\CourseSections;
use common\models\Events;
use common\models\Files;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\Pagination;


class AppController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['main', 'education'],
                'rules' => [
                    [
                        'actions' => ['main', 'education'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => [''],
                        'allow' => true,
                    ],
                ],
                'denyCallback' => function($rule, $action) {
                    Yii::$app->response->redirect(['user/index']);
                },
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }



    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }


    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAttendance()
    {
        $query = Students::find();

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $students = $query->offset($pagination->offset)
            ->limit($pagination->limit)->all();

        return $this->render('attendance', [
            'students' => $students,
            'pagination' => $pagination,
        ]);
    }


    public function actionMain()
    {
        $model = new Courses();
        $query = Courses::find()->all();

        return $this->render('main', [
            'model' => $model,
            'courses' => $query,
        ]);
    }

    public function actionRegistration()
    {
        return $this->render('registration');
    }


    public function actionCourse(int $id)
    {

        $courses = Courses::find()->all();
        $course_materials = CourseSections::find()->where(['course_id' => $id])->all();
        $course_materials_items = CourseSectionMaterials::find()->where(['course_id' => $id])->all();
        $course_files = Files::find()->all();
        $sectionsCount = count($course_materials);
        $sectionMaterialsCount = count($course_materials_items);

        $events = Events::find()->where(['course_id'=> $id])->all();
        $tasks = [];

        foreach($events as $eve)
        {
            $event = new \yii2fullcalendar\models\Event();
            $event->id = $eve->id;
            $event->title = $eve->title;
            $event->start = $eve->created_date;
            $event->end = $eve->created_date_end;
            $tasks[] = $event;
        }

        $item = Courses::findOne($id);

        return $this->render('course',[
            'course' => $item,
            'events' => $tasks,
            'course_materials' => $course_materials,
            'course_materials_items' => $course_materials_items,
            'course_files' => $course_files,
            'courses' => $courses,
            'sectionsCount' => $sectionsCount,
            'sectionMaterialsCount' => $sectionMaterialsCount
        ]);

    }

    public function actionDownloadFile(int $id)
    {
        $model = new Files();
        $file = $model->getFile($id);

        $storagePath = Yii::getAlias('@webroot').'/uploads/';

        if (!preg_match('/^[a-z0-9]+\.[a-z0-9]+$/i', $file->file) || !is_file("$storagePath/$file->file")) {
            throw new \yii\web\NotFoundHttpException('The file does not exists.');
        }
        return Yii::$app->response->sendFile("$storagePath/$file->file", $file->file);
    }

    public function actionCourseMaterials($id)
    {
        $courses = Courses::find()->all();
        $courseMaterial = CourseSectionMaterials::findOne($id);
        $courseMaterialFile = Files::find()->where(['course_sections_id' => $id])->all();
        $link = $courseMaterial->getLink($id);
        return $this->render('courseMaterials',[
            'courseMaterial' => $courseMaterial,
            'courseMaterialFile' => $courseMaterialFile,
            'courses' => $courses,
            'link' => $link,
        ]);
    }
}