<div class="main-page">
    <?php echo $this->render('/widgets/navigation'); ?>
    <section class="main-page-banner-section main-page-wrapper">
        <div class="banner">
            <div>
                <h1 class="banner-title">
                    Станьте востребованным специалистом
                </h1>
            </div>
            <div>
                <div class="banner-img" >
                    <img src="https://skillbox.kz/landing-assets/20/6c/cbd88d4d5554fcb8ec0530262a0a.png">
                </div>
            </div>
        </div>
    </section>
<!--    <section class="main-page-reasons-section main-page-wrapper">-->
<!--        <div class="reasons">-->
<!--            <div class="reasons-title">-->
<!--                Почему выбирают Нас-->
<!--            </div>-->
<!--            <div class="reasons-list">-->
<!--                <div class="reasons-list-item">-->
<!--                    Единственная Школа программирования в Семее от практиков.-->
<!--                    50% теории, 50% практики - реальные задачи от рынка.-->
<!--                </div>-->
<!--                <div class="reasons-list-item">-->
<!--                    Лучшие учащиеся курса могут получить джоб-оффер на работу в компании-партнере школы в любой момент обучения.-->
<!--                </div>-->
<!--                <div class="reasons-list-item">-->
<!--                    Для обучающихся воссоздаются условия, максимально приближенные к процессам реальной разработки в IT.-->
<!--                </div>-->
<!--                <div class="reasons-list-item">-->
<!--                    В процессе обучения студенты имеют возможность работы с реальными данными .-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </section>-->
    <section class="main-page-professions main-page-wrapper">
        <div class="team">
            <h2 class="team-header">
                Команда
            </h2>
            <ul class="team-composition-list">
                <li class="team-composition-list-item">
                    <div class="team-composition-list-item-img">
                        <img src="/images/teachers/teacher-1.png">
                    </div>
                    <h1 class="team-composition-list-item-name">
                        Khalilov Shamil
                    </h1>
                    <div class="team-composition-list-item-description">
                        Technical Director. A specialist with extensive experience in the field of Web development, data science. Professional skills in server and network administration, working with BIG DATA.
                        Chairman of the State Attestation Commission of the SHAKARIM UNIVERSITY
                    </div>
                </li>
                <li class="team-composition-list-item">
                    <div class="team-composition-list-item-img">
                        <img src="/images/teachers/teacher-2.jpg">
                    </div>
                    <div class="team-composition-list-item-name">
                        Токтаров Бауыржан
                    </div>
                    <div class="team-composition-list-item-description">
                        Team lead, Python-developer. Обширные знания в области мониторинга и парсинга новостных сайтов и социальных сетей. Анализ данных, настройка и применение поисковых движков.
                    </div>
                </li>
                <li class="team-composition-list-item">
                    <div class="team-composition-list-item-img">
                        <img src="/images/teachers/teacher-3.jpg">
                    </div>
                    <div class="team-composition-list-item-name">
                        Каримов Ривкат
                    </div>
                    <div class="team-composition-list-item-description">
                        Python-developer, специалист в области парсинга социальных сетей, в частности таких как instagram, telegram, ВКонтакте. Знание django, а так же различных FRONTEND фреймворков.
                    </div>
                </li>
                <li class="team-composition-list-item">
                    <div class="team-composition-list-item-img">
                        <img src="/images/teachers/teacher-4.png">
                    </div>
                    <div class="team-composition-list-item-name">
                        Советбеков Мади
                    </div>
                    <div class="team-composition-list-item-description">
                        Специалист в области парсинга социальных сетей, data science. Опытный Python-developer. Обширные знания в работе сетевых протоколов.
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <section class="main-page-professions main-page-wrapper">
        <div class="professions">
            <div class="professions-header">
                <div class="professions-header-img">
                    <img src="https://skillbox.kz/landing-assets/78/f6/5e191ae142ede1c06c2c2a3be404.svg">
                </div>
                <div class="professions-header-title">
                    Востребованные IT-профессии
                </div>
                <div class="professions-header-desc">
                    Топовые курсы для старта в IT. Вы сможете стать специалистом с нуля,<br />
                    собрать портфолио и начать карьеру через несколько месяцев.
                </div>
            </div>
            <div class="professions-content">
                <div class="professions-list">
                    <?php foreach ($courses  as $course):  ?>
                        <div class="professions-list-item" style="background-color: <?php echo $course['background_color']; ?> ">
                            <div>
                                <p class="professions-list-item-rubrics">
                                   <a href="">Профессия</a>
                                </p>
                                <div class="professions-list-item-title">
                                    <a href='<?= \yii\helpers\Url::to(['/course/course', 'name' => $course['name'], 'id' => $course['id']]) ?>'><b><?= $course['name'] ?></b></a>
                                </div>
                                <div class="professions-list-item-time">
                                    <a href="<?php echo \yii\helpers\Url::to(['/course/course', 'id' => $course['id']]) ?>"><b><?= $course['course_time'] ?></b> месяцев</a>
                                </div>
                            </div>
                            <div>
                                <div class="professions-list-item-img">
                                    <a href="<?php echo \yii\helpers\Url::to(['/course/course', 'id' => $course['id']]) ?>">
                                        <img src="/uploads/<?php echo $course['img'] ?>">
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="profession-button">
                <div>
                    <a href="/courses" class="white">Смотреть всё</a>
                </div>
            </div>
        </div>
    </section>
    <section class="main-page-experience main-page-wrapper"  >
        <div class="experience">
            <h2 class="experience-title">
            <h2 class="experience-title">
                Опыт
            </h2>
            <div class="experience-description">
                Несмотря на то, что Delta Education является новой школой программирования, с обучением людей навыкам программирования мы имеем дело не первый год.
                С 2014 года мы занимаемся обучением программированию на базе действующей IT-компании - главным партнером Школы.
                <br>
                <br>
                За эти года десятки молодых ребят, пройдя обучение, трудоустривались и росли профессионально, сейчас они работают в различных IT-компаниях как в Казахстане, так и зарубежом, таких как “iMAS GROUP” (Нур-Султан, Семей), “Documentolog” (Нур-Султан), “SQVER” (Санкт-Петербург), “Emotions Group” (Алматы), “KazAeroSpace” (Нур-Султан)(Прага) и другие.
            </div>
            <ul class="experience-list">
                <li class="experience-list-item">
                    <img src="https://deltaeducation.info/media/images/logos/foreign/imas_logo.png"/>
                </li>
                <li class="experience-list-item">
                    <img src="https://deltaeducation.info/media/images/logos/foreign/yii2.png"/>
                </li>
                <li class="experience-list-item">
                    <img src="https://deltaeducation.info/media/images/logos/foreign/emotions_fill.png"/>
                </li>
                <li class="experience-list-item">
                    <img src="https://deltaeducation.info/media/images/logos/foreign/aero.jpeg"/>
                </li>
                <li class="experience-list-item">
                    <img src="https://deltaeducation.info/media/images/logos/foreign/logo_allzora-cz_1.png"/>
                </li>
            </ul>
        </div>
    </section>
</div>


<script type="text/javascript">
    function redirectToCourse(id) {
        var url = "<?= \yii\helpers\Url::toRoute(['course/index', 'name' => $course['name'], 'id' => '__ID__']) ?>";
        url = url.replace('__ID__', id);
        window.location.href = url;
    }
</script>