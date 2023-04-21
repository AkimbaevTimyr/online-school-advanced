<?php

use backend\models\Attendance;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Посещение и оценки для ученика: ' . $student->name;
$this->params['breadcrumbs'][] = ['label' => 'Ученики', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    <h1><?= Html::encode($this->title) ?></h1>

<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success">
        <?= Yii::$app->session->getFlash('success') ?>
    </div>
<?php endif ?>

<?php $form = ActiveForm::begin(); ?>

    <table class="table">
        <thead>
            <tr>
                <th>Занятие</th>
                <th>Посещение</th>
                <th>Оценка</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lessons as $lesson): ?>
                <tr>
                    <td><?= Html::encode($lesson->name) ?></td>
                    <?= $form->field($attendance[$student->id], "student_id")->hiddenInput(['value' => $student->id])->label(false) ?>
                    <td><?= $form->field(isset($attendance[$lesson->id]) ? $attendance[$lesson->id] : new Attendance(), "present")->checkbox() ?></td>
                    <td><?= $form->field(isset($attendance[$lesson->id]) ? $attendance[$lesson->id] : new Attendance(), "grade")->textInput(['type' => 'number', 'min' => 1, 'max' => 5]) ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

<?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end(); ?>

