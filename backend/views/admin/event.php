
<?php

use kartik\datetime\DateTimePicker;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use kartik\date\DatePicker;

use kartik\datetime\DateTimePickerAsset;

?>

<div class="branches-form">

    <?php $form = ActiveForm::begin(['id' => $model->formName()]); ?>

        <?= $form->field($model, 'title', ['options' => ['class' => 'black']])->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'description', ['options' => ['class' => 'black']])->textInput(['maxlength' => true]) ?>


            <?php

                echo $form->field($model, 'created_date')->widget(DateTimePicker::className(), [
                    'name' => 'datetime_400',
                    'options' => ['placeholder' => 'Начало урока...'],
                    'removeButton' => ['position' => 'append'],
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'yy-mm-dd hh:ii:ss'
                    ]
                ]);

                echo $form->field($model, 'created_date_end')->widget(DateTimePicker::className(), [
                    'name' => 'datetime_400',
                    'options' => ['placeholder' => 'Конец урока...'],
                    'removeButton' => ['position' => 'append'],
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'yy-mm-dd hh:ii:ss'
                    ]
                ]);

            ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'style' => "width: 100px"]) ?>
        </div>

    <?php ActiveForm::end(); ?>

</div>