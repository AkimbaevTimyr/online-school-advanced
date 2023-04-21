<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

?>

<div id="wrapper">
    <div class="loginColumns animated fadeInDown">
        <div class="row">
            <div class="col-md-6">
                <h2 class="font-bold">Регистрация Аккаунта</h2>
                <p>
                    Учитесь основам программирования
                </p>
            </div>
            <div class="col-md-6 auth">
                <div class="ibox-content">
                    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                        <?= $form->field($model, 'email') ?>

                        <?= $form->field($model, 'password')->passwordInput() ?>

                        <div class="form-group">
                            <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                        </div>

                    <?php ActiveForm::end(); ?>
                </div>
                <div class="ibox-content auth-bottom">
                    Уже есть аккаунт? <a href="/user/login">Войти</a>
                </div>
            </div>
        </div>
        <hr/>
    </div>
</div>
