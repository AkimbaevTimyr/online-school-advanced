<?php use yii\bootstrap5\ActiveForm;
    use yii\bootstrap5\Html;
    use yii\helpers\ArrayHelper;
?>

<div class="d-flex">

    <div>
        <?php  echo $this->render('sidebar'); ?>

    </div>

    <div class="main-body" style="background-color: rgb(243, 243, 244);">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0; height: 60px">
            <div class="navbar-header">
            </div>
            <ul class="nav navbar-top-links navbar-right ">
                <div style="margin-right: 30px; font-size:20px; display: flex; margin-right: 30px; color: rgba(0, 0, 0, 0.55); align-items: center; cursor: pointer" onclick="exitFunction()">Выйти</div>
            </ul>
        </nav>
        <div class="w-25 p-3">
            <div class="col-md-12 auth">
                <div class="ibox-content">
                    <?php
                    $form = ActiveForm::begin([
                        'action' => ['user/sign-up'],
                        'method' => 'post',
                        'class' => 'm-t',
                    ])
                    ?>
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" placeholder="Логин" required>
                        </div>
                        <div class="form-group m-b">
                            <input type="email" name="email" class="form-control" placeholder="Электронная почта" required>
                        </div>
                        <div class="form-group m-b">
                            <input type="password" name="password" class="form-control" placeholder="Пароль" required>
                        </div>
                        <div class="form-group m-b">
                            <input type="text" name="name" class="form-control" placeholder="Имя" required>
                        </div>
                        <div class="form-group m-b">
                            <input type="text" name="lastname" class="form-control" placeholder="Фамилия" required>
                        </div>
                        <div class="form-group m-b">
                            <input type="number" name="phoneNumber" class="form-control" placeholder="Номер телефона" required>
                        </div>
                        <button type="submit" class="btn btn-primary block full-width m-b">Регистрация</button>
                    <?php
                        ActiveForm::end();
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
