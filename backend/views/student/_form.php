<?php

use common\models\Courses;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Student $model */
/** @var yii\widgets\ActiveForm $form */

//get user course name
$courseId = $model->getOldAttribute('course');
$course = Courses::find()->where(['id'=> $courseId])->all();
$courseName = "";
if($course){
    $courseName = $course[0]->name;
}

?>

<div class="student-form w-75">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <label>Курс</label>

    <?php
        $options = ArrayHelper::map($courses, 'id', 'name');
    ?>

    <?= Html::dropDownList('select-course',null, $options, ['class' => 'form-control', 'prompt' => [
        'text' => "$courseName",  // название курса
        'options' => [
            'value' => "$courseId", //id курса
            'class' => 'prompt-class',
            'selected' => 'selected'
        ]
    ]]); ?>
    <br>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success w-auto']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
