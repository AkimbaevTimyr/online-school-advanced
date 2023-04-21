<?php 
use yii\helpers\Html;

?>

    <div class="sidebar-wrapper">
        <div>
            <nav class="navbar-default navbar-static-side" role="navigation" style="background-color: #293846;">
                <div class="sidebar-collapse">
                    <ul class="nav metismenu" id="side-menu">
                        <li class="nav-header">
                            <div class="dropdown profile-element p-h-lg p-l-md">
                                <?= Html::a('Онлайн школа', ['app/main'])?>
                            </div>
                        </li>
                        <li >
                            <div class="dropdown">
                                <button onclick="myFunction()" class="dropbtn">Курсы</button>
                                <div id="myDropdown" class="dropdown-content">
                                    <?php foreach ($courses as $course): ?>
                                        <button class="dropdown-content-button" onclick="myCourseFunction(<?= $course->id ?>)"><?=  $course->name ?></button><br />
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="navbar-header" style="width: 100%">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0; height: 60px">
                <ul class="nav navbar-top-links navbar-right ">
                    <div style="margin-right: 30px; font-size:20px; display: flex; margin-right: 30px; color: rgba(0, 0, 0, 0.55); align-items: center; cursor: pointer" onclick="exitFunction()">Выйти</div>
                </ul>
            </nav>
            <div class="main-body-content" id="main-body-content">
            </div>
        </div>
    </div>

<script src="/js/app.js"></script>
