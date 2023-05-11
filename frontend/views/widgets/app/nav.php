<?php

use common\models\Courses;
use yii\bootstrap5\Html;

if(!Yii::$app->user->isGuest){
    $courseId = Yii::$app->user->identity->course;
    $course = Courses::findOne(['id' => $courseId]);
}

?>

<div class="sidebar-wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation" style="background-color: #293846; ">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element p-h-lg p-l-md">
                        <?= Html::a('Онлайн школа', ['app/main'])?>
                    </div>
                </li>
                <li>
                    <div class="dropdown">
                        <button onclick="myFunction()" class="dropbtn">Курсы</button>
                        <?php if($course !== null): ?>
                            <div id="myDropdown" class="dropdown-content">
                                <button class="dropdown-content-button p-0">
                                    <a href="/app/course-page/<?php echo Yii::$app->user->isGuest ? null : $course->id ?>"> <?= Yii::$app->user->isGuest ? null : $course->name ?></a>
                                </button><br />
                            </div>
                        <?php endif; ?>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>

