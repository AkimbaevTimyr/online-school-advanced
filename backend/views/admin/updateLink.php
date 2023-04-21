<?php use yii\helpers\Html;

    $form = \yii\bootstrap5\ActiveForm::begin([
        'id' => 'update-link-form',
        'action' => ['admin/update-link', 'id' => $courseMaterial->id],
    ]) ?>
    <div class="ibox-content d-flex">
        <?= $form->field($materialsLink, 'link')->textInput(['class' => "form-control"])->hint('Ссылка на внешний источник')?>
        <?= Html::submitButton('Загрузить', ['class' => 'btn btn-primary']) ?>
    </div>

<?php \yii\bootstrap5\ActiveForm::end() ?>