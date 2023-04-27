<?php


?>

<div class="courses">
    <div class="courses-logo">
        Logo
    </div>
    <div class="courses-title">
        <h1>
            Все онлайн-курсы
        </h1>
        <div>
        </div>
    </div>
    <div class="courses-content">
        <div class="courses-list">
            <?php foreach ($courses  as $course):  ?>
                <div class="courses-list-item" style="background-color: <?php echo $course['background_color']; ?>">
                    <div>
                        <p class="courses-list-item-rubrics">
                            <a href="">Профессия</a>
                        </p>
                        <div class="courses-list-item-title">
                            <a href="<?= \yii\helpers\Url::to(['/course/course', 'name' => $course['name'], 'id' => $course['id']]) ?>"><b><?= $course['name'] ?>-разработчик</b></a>
                        </div>
                        <div class="courses-list-item-time">
                            <a href="<?php echo \yii\helpers\Url::to(['/course/course', 'id' => $course['id']]) ?>"><b><?= $course['course_time'] ?></b> месяцев</a>
                        </div>
                    </div>
                    <div>
                        <div class="courses-list-item-img">
                            <a href="<?php echo \yii\helpers\Url::to(['/course/course', 'id' => $course['id']]) ?>">
                                <img src="https://ms1.skillbox.kz/images/ac31605a3a3962baeb659495660ad874/thumb/w=88,h=88,q=80/course_logo/ae/59/27/ae5927027c42aead3016b68e21466c24.png">
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
