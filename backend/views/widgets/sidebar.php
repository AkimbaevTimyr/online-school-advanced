<?php 
use yii\helpers\Html;
use yii\bootstrap5\Nav;
?>

<div class="sidebar-wrapper" style="height: 100%">
    <nav class="navbar-default navbar-static-side" style="" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element p-h-lg p-l-md">
                        <?= Html::a('Админ Панель', ['admin/main'])?>
                    </div>
                </li>
                <li>
                    <?= Html::a('Создать Курс', ['admin/create-course'] , ['style' => 'font-size: 16px'])?>
                </li>
                <li>
                    <?= Html::a('Список Курсов', ['admin/course-list'] , ['style' => 'font-size: 16px'])?>
                </li>
                <li>
                    <?= Html::a('Список Студентов', ['student/index'] , ['style' => 'font-size: 16px'])?>
                </li>
            </ul>
        </div>
    </nav>
</div>





