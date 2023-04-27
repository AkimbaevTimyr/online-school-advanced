<?php

namespace backend\controllers;


use backend\models\Roles;
use common\models\Courses;
use common\models\CourseSectionMaterials;
use common\models\CourseSections;
use common\models\Events;
use common\models\Files;
use common\models\MaterialsLinks;
use common\models\SignupForm;
use common\models\StartScreen;
use common\models\User;
use DateTime;
use Yii;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii2fullcalendar\models\Event;

class AdminController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['main', 'create-app', 'app-list', 'app-page'],
                'rules' => [
                    [
                        'actions' => ['main', 'create-app', 'app-list', 'app-page'],
                        'allow' => true,
//                        'roles' => ['admin'],
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => [''],
                        'allow' => true,
                    ],
                ],
                'denyCallback' => function($rule, $action) {
                    return $this->redirect('/user/login');
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

    const PERMITTED_CHARS = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    static function generate_string($input, $strength = 16) {
        $input_length = strlen($input);
        $random_string = '';
        for($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }
        return $random_string;
    }

    public function actionCourse()
    {
        return $this->render('app');
    }


    public function actionCreateCourse()
    {
        return $this->render('createCourse');
    }

    public function actionMain(){
        return $this->render('main');
    }

    public function actionCreateUser()
    {

        $roles = Roles::find()->all();
        $courses = Courses::find()->all();
        $model = new SignupForm();
        $request = Yii::$app->request->post();

        if($model->load($request) && $model->validate() && $model->save()){
            $this->redirect(Yii::$app->request->referrer);
        }

        return $this->render('createUser',[
            'courses' => $courses,
            'model' => $model,
            'roles' => $roles
        ]);
    }

    public function actionUpload($id = 1)
    {
        $courses = Courses::find()->all();
        $files = new Files();
        $sectionItems = CourseSections::find()->where(['course_id' => $id])->all();

        if($files->load(Yii::$app->request->post()))
        {
            $file = UploadedFile::getInstance($files, 'file');
            $fileName = self::generate_string(self::PERMITTED_CHARS, 16);
            if(isset($file->size)){
                $file->saveAs(Yii::getAlias('@webroot').'/uploads/'.$fileName . "." . $file->extension);
            }
            $files->file = $fileName . "." . $file->extension;
            $files->save(false);
        }
        return $this->render('upload', [
            'courses' => $courses,
            'files' => $files,
            'sectionItems' => $sectionItems,
        ]);
    }

    public function actionCreate()
    {
        $courseModel = new Courses();
        if (Yii::$app->request->post()) {

            $course = Json::decode(Yii::$app->request->post('course'));
            $arr = Json::decode(Yii::$app->request->post('arr'));
            $courseInformation = Json::decode(Yii::$app->request->post('courseInformation'));

            $courseModel->id = $course['id'];
            $courseModel->name = $course['name'];
            $courseModel->save();

            $courseInfo = new StartScreen();
            $courseInfo->title = $course['name'];
            $courseInfo->course_id = $course['id'];
            $courseInfo->course_time =  $courseInformation['course_time'];
            $courseInfo->description = $courseInformation['course_description'];
            $courseInfo->about_profession = $courseInformation['about_profession'];
            $courseInfo->portfolio_projects = 2;
            $courseInfo->img = $_FILES["courseImg"]["name"];
            $courseInfo->save(false);

            if($_FILES){
                $tmp_name = $_FILES["courseImg"]["tmp_name"];
                move_uploaded_file($tmp_name, Yii::getAlias('@frontend/web/uploads/').$_FILES['courseImg']['name']);
                echo "Файлы загружены";
            }

            foreach($arr as $a){
                $model = new CourseSections();
                $model->name = $a[0]['name'];
                $model->course_id = $a[0]['course_id'];
                $model->course_sections_id = $a[0]['course_sections_id'];
                $model->save();
            }

            $course_materials_ids = [];
            foreach($arr as $a){
                for ($i = 1; $i <= count($a)-2; $i++) {
                    $course_materials_ids[] = $a[$i]['id'];
                    $model2 = new CourseSectionMaterials();
                    $model2->id = $a[$i]['id'];
                    $model2->name = $a[$i]['name'];
                    $model2->course_id = $a[$i]['course_id'];
                    $model2->course_sections_id = $a[$i]['course_sections_id'];
                    $model2->description = $a[$i]['description'];
                    $model2->save();
                }
            }

            if($_FILES)
            {
                foreach ($_FILES["file"]["error"] as $key => $error) {

                    $types = array(
                        'text/plain' => '.txt',
                        'application/pdf' => '.pdf',
                        'application/vnd.openxmlformats-officedocument.wordprocessingml.document' => '.docx'
                    );

                    if ($error == UPLOAD_ERR_OK) {
                        $fileName = self::generate_string(self::PERMITTED_CHARS, 16);
                        $tmp_name = $_FILES["file"]["tmp_name"][$key];
                        $modelFile = new Files();
                        $modelFile->course_id = $course['id'];
                        $modelFile->file = $fileName.$types[$_FILES['file']['type'][$key]];
                        move_uploaded_file($tmp_name, Yii::getAlias('@frontend/web/uploads/').$fileName.$types[$_FILES['file']['type'][$key]]);
                        $modelFile->course_sections_id = $course_materials_ids[$key];
                        $modelFile->save();
                    }
                }
                echo "Файлы загружены";
            }
        }
    }

    public function actionCourseList()
    {
        $model = Courses::find()->all();
        return $this->render('courseList',[
            'model' => $model,
        ]);
    }

    public function actionCoursePage(int $id)
    {
        $courseModel = new Courses();
        $sectionModel = new CourseSections();
        $sectionsMaterialsModel = new CourseSectionMaterials();

        $course = Courses::findOne($id);
        $sections = CourseSections::find()->where(['course_id' => $id])->all();
        $sectionsMaterials = CourseSectionMaterials::find()->where(['course_id' => $id])->all();

        $events = Events::find()->where(['course_id' => $id])->all();
        $tasks = [];

        foreach($events as $eve)
        {
            $event = new Event();
            $event->id = $eve->id;
            $event->title = $eve->title;
            $event->start = $eve->created_date;
            $event->end = $eve->created_date_end;
            $tasks[] = $event;
        }

        return $this->render('coursePage', [
            'course' => $course,
            'sections' => $sections,
            'sectionsMaterials' => $sectionsMaterials,
            'courseModel' => $courseModel,
            'sectionModel' => $sectionModel,
            'sectionsMaterialsModel' => $sectionsMaterialsModel,

            'course_materials' => $sections,
            'course_materials_items' => $sectionsMaterials,

            'events' => $tasks,
        ]);
    }


    public function actionEvent($date, $courseId)
    {
        $model = new Events();
        $model->created_date = $date;
        $model->course_id = $courseId;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect("/admin/course-page/{$courseId}");
        } else {
            return $this->renderAjax('/admin/event', [
                'model' => $model,
            ]);
        }
    }

    // рендерит страницу с кнопка редактирования и удаления события
    public function actionView($id)
    {
        $model = Events::findOne($id);

        return $this->renderAjax('/admin/view', [
            'model' => $model,
        ]);
    }

    //удаление события на календаре
    public function actionEventDelete($id)
    {
        $model = Events::findOne($id);
        $model->delete();
        $this->redirect(Yii::$app->request->referrer);
    }

    public function actionEventUpdate($id = null)
    {
        $eventId = Yii::$app->request->post('eventId');
        $start = Yii::$app->request->post('start');
        $end = Yii::$app->request->post('end');

        if(!empty($eventId)){
            $event = Events::findOne($eventId);
            $event->created_date = $start;
            $event->created_date_end = $end;
            if (!$event->save()) {
                throw new ServerErrorHttpException('Failed to update the event.');
            }
        }

        if(!empty($id)){
            $model = Events::findOne($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                $this->redirect(Yii::$app->request->referrer);
            } else {
                return $this->renderAjax('/admin/event', [
                    'model' => $model,
                ]);
            }
        }
    }

    // удаление курса из базы данных
    public function actionDeleteCourse($id)
    {
        $connection = Yii::$app->db;
        // транзакцию используем для того что бы если во время удаления данных из бд произойдет ошибки
        // то действие откатывает и удаленные данные возвращаются
        $transaction = $connection->beginTransaction();

        try{
            $connection->createCommand()->delete('course_files', ['course_id' => $id])->execute();

            $connection->createCommand()->delete('course_sections_materials', ['course_id' => $id])->execute();

            $connection->createCommand()->delete('course_sections', ['course_id' => $id])->execute();

            $connection->createCommand()->delete('courses', ['id' => $id])->execute();

            $transaction->commit();

            return $this->redirect(['/admin/course-list']);

        }catch (\Exception $e) {
            $transaction->rollBack();
            throw $e;
        }
    }


    public function actionCourseMaterials($id)
    {
        $materialsLink = new MaterialsLinks();
        $courses = Courses::find()->all();
        $courseMaterial = CourseSectionMaterials::findOne($id);
        $courseMaterialFile = Files::find()->where(['course_sections_id' => $id])->all();

        return $this->render('courseMaterials',[
            'courseMaterial' => $courseMaterial,
            'courseMaterialFile' => $courseMaterialFile,
            'courses' => $courses,
            'materialsLink' => $materialsLink,
        ]);
    }

    //добавить id для редиректа при добавлении ссылки у материала курса
    public function actionUpdateLink($link, $id)
    {
        $materialsLink = new MaterialsLinks();
        $materialsLink->link = $link;

        $materialsLink->course_materials_id = $id;
        $materialsLink->save();
        return $this->redirect("/admin/course-materials/{$id}");
    }


    public function actionUploadFile($id){

        if($_FILES){
            $fileName = str_replace(' ', '', $_FILES['file']['name']);
            $tmp_name = $_FILES["file"]["tmp_name"];
            move_uploaded_file($tmp_name, Yii::getAlias('@frontend/web/uploads/').$fileName);

            $modelFile = new Files();
            $modelFile->file = $fileName;
            $modelFile->course_sections_id = $id;
            $modelFile->save();
            echo "Файлы загружены";

            return $this->redirect("/admin/course-materials/{$id}");
        }
    }

    public function actionSignup()
    {
        $userRole = Yii::$app->request->post('select-name');

        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup($userRole)) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
        }
        return $this->redirect('/admin/create-user');
    }
}