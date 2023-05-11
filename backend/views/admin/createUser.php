<?php
    use yii\bootstrap5\ActiveForm;
    use yii\bootstrap5\Html;
    use yii\helpers\ArrayHelper;
?>

<div class="main-body" style="background-color: rgb(243, 243, 244);">
        <div class="w-50 ">
            <div class="col-md-12">
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="font-bold">Регистрация Аккаунта</h2>
                        </div>
                        <div class="col-md-12">
                            <div class="ibox-content">
                                <?php $form = ActiveForm::begin([
                                    'method' => "post",
                                    'id' => 'form-signup',
                                    'action' => '/admin/signup'
                                ]); ?>

                                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                                    <?= $form->field($model, 'email') ?>

                                    <?= $form->field($model, 'password')->passwordInput(); ?>

                                    <?= $form->field($model, 'name') ?>

                                    <?= $form->field($model, 'last_name') ?>

                                    <?= $form->field($model, 'phone_number') ?>

                                    <!-- курсы-->
                                    <label>Название курса</label>

                                    <?php  $options = ArrayHelper::map($courses, 'id', 'name'); ?>

                                    <?= Html::dropDownList('select-course',null, $options, ['class' => 'form-control']); ?>

                                    <br>

                                    <!-- роли -->
                                    <label>Роль пользователя</label>
                                    <?php  $options = ArrayHelper::map($roles, 'parent', 'parent')  ?>

                                    <?= Html::dropDownList('select-name', null, $options, ['class' => 'form-control']); ?>
                                    <br>

                                    <div class="form-group ">
                                        <?= Html::submitButton('Зарегистрировать', ['class' => 'btn btn-primary w-auto', 'name' => 'signup-button']) ?>
                                    </div>

                                <?php ActiveForm::end(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
