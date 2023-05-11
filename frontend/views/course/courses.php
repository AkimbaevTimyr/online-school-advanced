<?php

?>

<div class="courses">
    <div class="courses-logo">
        <div class="nav-logo">
            <a href="/">
                <img src="<?php Yii::getAlias("@webroot") ?>/images/delta-image.jpg" width="54" height="54" >
            </a>
        </div>
    </div>
    <div class="courses-title">
        <h1>
            Список Курсов
        </h1>
        <div>
        </div>
    </div>
    <div class="courses-content">
        <div class="courses-list">
            <?php foreach ($courses as $course):  ?>
                <div class="courses-list-item" style="background-color: <?php echo $course['background_color']; ?>">
                    <div>
                        <p class="courses-list-item-rubrics">
                            <a href="">Профессия</a>
                        </p>
                        <div class="courses-list-item-title">
                            <a href="<?= \yii\helpers\Url::to(['/course/course', 'name' => $course['name'], 'id' => $course['id']]) ?>"><b><?= $course['name'] ?></b></a>
                        </div>
                        <div class="courses-list-item-time">
                            <a href="<?= \yii\helpers\Url::to(['/course/course', 'name' => $course['name'], 'id' => $course['id']]) ?>"><b><?= $course['course_time'] ?></b> месяцев</a>
                        </div>
                    </div>
                    <div>
                        <div class="courses-list-item-img">
                            <a href="<?= \yii\helpers\Url::to(['/course/course', 'name' => $course['name'], 'id' => $course['id']]) ?>">
                                <img src="/uploads/<?php echo $course['img'] ?>" height="90px" width="90px">
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>


