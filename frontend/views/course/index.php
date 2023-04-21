

<div class="profession">
        <div class="content">
            <section class="start-screen-section profession-container">
                <br>
                <div class="start-screen-block" style="background-color: <?= $courseInformation->background_color ?>">
                    <div>
                        <div class="start-screen-title">
                            <?php echo  $courseInformation->title ?>
                        </div>
                        <div class="start-screen-description">
                            <?php echo  $courseInformation->description ?>
                        </div>
                        <div class="start-screen-button">
                            <a href="#course-price-section" style="color: white" >Записаться на курс</a>
                        </div>
                    </div>
                    <div class="start-screen-img">
                        <img src="/uploads/<?php echo $courseInformation->img ?>">
                    </div>
                </div>
                <ul class="start-screen-features">
                    <li>
                        <strong class="start-screen-features-subtitle"> Программа </strong><br>
                        <span class="start-screen-features-text "> из 2 курсов</span>
                    </li>
                    <li>
                        <strong class="start-screen-features-subtitle "> Стажировка </strong><br>
                        <span class="start-screen-features-text "> в команде, под руководством тимлида </span>
                    </li>
                    <li>
                        <strong class="start-screen-features-subtitle "> <?php echo $courseInformation->portfolio_projects ?> проекта </strong><br>
                        <span class="start-screen-features-text "> в портфолио </span>
                    </li>
                    <li>
                        <strong class="start-screen-features-subtitle "> Длительность </strong><br>
                        <span class="start-screen-features-text "><?php echo $courseInformation->course_time ?> месяцев </span>
                    </li>
                </ul>
            </section>
            <section class="about-profession profession-container">
                <h2 class="about-profession-title">О профессии</h2>
                <p class="about-profession-desc">
                    <?php echo $courseInformation->about_profession; ?>
                </p>
                <ul class="about-profession-list">
                    <li class="about-profession-list-item">
                        <b class="about-profession-list-item-subtitle "> 2 837 компании </b>
                        <p class="about-profession-list-item-desc"> сейчас ищут PHP-разработчиков </p>
                    </li>
                    <li class="about-profession-list-item">
                        <b class="about-profession-list-item-subtitle "> 1 200$ </b>
                        <p class="about-profession-list-item-desc "> средняя зарплата PHP-разработчика </p>
                    </li>
                </ul>
            </section>
            <section class="profession-auditory-sections profession-container">
                <h2 class="profession-auditory-title"> Кому подойдёт этот курс </h2>
                <ul class="profession-auditory-list">
                    <li class="profession-auditory-list-item">
                        <div class="profession-auditory-list-item-img">
                            <img src="https://248006.selcdn.ru/LandGen/desktop_2_b4782595d4ffad7b2ecfc8400c85a592e03025e5.webp">
                        </div>
                        <div>
                            <b class="profession-auditory-list-item-title">
                                Тем, кто хочет научиться программировать
                            </b>
                            <p class="profession-auditory-list-item-desc">
                                С нуля освоите язык программирования <b><?= $course->name; ?></b>, получите помощь
                                и советы от опытных спикеров, попрактикуетесь на реальных задачах.
                                Напишете первые проекты для портфолио и поработаете в команде.
                            </p>
                        </div>
                    </li>
                    <li class="profession-auditory-list-item">
                        <div class="profession-auditory-list-item-img">
                            <img src="https://248006.selcdn.ru/LandGen/desktop_2_8cd6e5c42746f20a62e91b241dd16aaa8740d94e.webp">
                        </div>
                        <div>
                            <b class="profession-auditory-list-item-title">
                                Начинающим разработчикам
                            </b>
                            <p class="profession-auditory-list-item-desc">
                                Структурируете имеющиеся знания, а кураторы
                                помогут разобраться с трудными для понимания темами и
                                порекомендуют дополнительную литературу. Научитесь эффективно
                                решать повседневные для <b><?= $course->name; ?></b>-программиста задачи.
                            </p>
                        </div>
                    </li>
                </ul>
            </section>
            <section class="universal-list profession-container">
                <div class="universal-list-title">
                    Чему вы научитесь
                </div>
                <ul class="universal-list-list">
                    <?php if(!empty($courseInformation->skills)): ?>
                        <?php $skills = explode("/", $courseInformation->skills) ?>
                        <?php foreach ($skills as $skill ):?>
                            <li class="universal-list-item">
                                <div class="wrap">
                                    <div id="check-part-1" class="check-sign"></div>
                                    <div id="check-part-2" class="check-sign"></div>
                                </div>
                                <div class="universal-list-item-subtitle">
                                    <?php echo $skill?>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </section>
            <section class="work-section profession-container">
                <header class="work-section-header">
                    <div>
                        <h2 class="work-section-header-title">
                            Помощь с трудоустройством
                        </h2>
                        <p class="work-section-header-desc">
                            Вас ждёт индивидуальная поддержка нашего партнера — HR-специалиста. Вместе вы составите резюме, подготовите портфолио и разработаете карьерный план, который поможет найти работу быстрее. Сможете выбрать привлекательные вакансии и получите приоритет перед другими соискателями.
                        </p>
                    </div>
                    <div>
                        <img src="https://248006.selcdn.ru/LandGen/blocks/work/v4/center-xl_v2.webp">
                    </div>
                </header>
                <div class="work-expectations">
                    <h3 class="work-expectations-title">Чем вам поможет Центр карьеры:</h3>
                   <!-- <div id="my-slider" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="container">
                                    <div class="row work-expectations-list">
                                        <div class="work-expectations-list-item">
                                            <div class="work-expectations-list-item-visible-info">
                                                <h5 class="card-title">Партнерские вакансии</h5>
                                                <p class="card-text">Порекомендуем вашу кандидатуру партнёрам</p>
                                            </div>
                                        </div>
                                        <div class="work-expectations-list-item">
                                            <div class="work-expectations-list-item-visible-info">
                                                <h5 class="card-title">Индивидуальный карьерный план</h5>
                                                <p class="card-text">Порекомендуем вашу кандидатуру партнёрам</p>
                                            </div>
                                        </div>
                                        <div class="work-expectations-list-item">
                                            <div class="work-expectations-list-item-visible-info">
                                                <h5 class="card-title">Партнерские вакансии</h5>
                                                <p class="card-text">Порекомендуем вашу кандидатуру партнёрам</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="container">
                                    <div class="row work-expectations-list">
                                        <div class="work-expectations-list-item col-md-6">
                                            <div class="work-expectations-list-item-visible-info">
                                                <h5 class="card-title">Оформление портфолио</h5>
                                                <p class="card-text">Поможем эффектно представить ваши проекты</p>
                                            </div>
                                        </div>
                                        <div class="work-expectations-list-item col-md-6">
                                            <div class="work-expectations-list-item-visible-info">
                                                <h5 class="card-title">Партнерские вакансии</h5>
                                                <p class="card-text">Порекомендуем вашу кандидатуру партнёрам</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-control-container">
                            <button class="carousel-control-prev" type="button" data-bs-target="#my-slider" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#my-slider" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>-->
                    <ul class="work-expectations-list">
                        <li class="work-expectations-list-item" style="background-color: #c3ebf0">
                            <div class="work-expectations-list-item-visible-info">
                                <h4 class="work-expectations-list-item-subtitle">Индивидуальный карьерный план</h4>
                                <span class="work-expectations-list-item-subline">Расскажем, как начать и развивать карьеру</span>
                            </div>
                        </li>
                        <li class="work-expectations-list-item" style="background-color: #c3ebf0">
                            <div class="work-expectations-list-item-visible-info">
                                <h4 class="work-expectations-list-item-subtitle">Индивидуальный карьерный план</h4>
                                <span class="work-expectations-list-item-subline">Расскажем, как начать и развивать карьеру</span>
                            </div>
                        </li>
                        <li class="work-expectations-list-item" style="background-color: #afdfb4">
                            <div class="work-expectations-list-item-visible-info">
                                <h4 class="work-expectations-list-item-subtitle">Партнерские вакансии</h4>
                                <span class="work-expectations-list-item-subline">Порекомендуем вашу кандидатуру партнёрам</span>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="work-block">
                    <div class="work-block-left">
                        <div class="work-stats">
                            <p class="work-stats-student-count">
                                7000⁠+
                                пользователей Skillbox получили новую работу с 2019 года
                            </p>
                            <ul class="work-stats-list">
                                <li class="work-stats-list-item">
                                    500⁠+
                                    пользователей ежеквартально находят работу с помощью Центра карьеры
                                </li>
                                <li class="work-stats-list-item">
                                    1400⁠+
                                    пользователей Skillbox улучшили карьеру в 2022 году
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="work-block-right">
                        <h3 class="work-block-subtitle">
                            Почему пользователи Skillbox трудоустраиваются?
                        </h3>
                        <ul class="work-block-statements-list">
                            <li class="work-block-statements-list-item">
                                <h4 class="work-block-statements-item-title">
                                    Востребованные профессии
                                </h4>
                                <p class="work-block-statements-item-desc">
                                    Мы тщательно анализируем профессии, в которых помогаем с трудоустройством: опрашиваем специалистов, оцениваем вакансии, потребность в кандидатах и доступность профессии для новичков.
                                </p>
                            </li>
                            <li class="work-block-statements-list-item">
                                <h4 class="work-block-statements-item-title">
                                    Качественные знания
                                </h4>
                                <p class="work-block-statements-item-desc">
                                    Помогаем получить навыки, которые необходимы здесь и сейчас. Все спикеры — практикующие специалисты, а их знания востребованы на рынке.
                                </p>
                            </li>
                            <li class="work-block-statements-list-item">
                                <h4 class="work-block-statements-item-title">
                                    Поддержка на старте карьеры
                                </h4>
                                <p class="work-block-statements-item-desc">
                                    Наши консультанты контролируют каждый шаг на пути к вашей карьере. Они помогают избежать ошибок и спланировать профессиональный путь.
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
            <section class="course-program-section profession-container">
                <div class="course-program">
                    <header class="course-program-header">
                        <h2 class="course-program-header-title">Содержание курса</h2>
                        <div>
                            <p class="course-program-header-desc">Вас ждут вебинары и практика на основе реальных кейсов.</p>
                            <ul class="course-program-header-counts-list">
                                <li class="course-program-header-counts-item">
                                    <b class="course-program-counts-item-number"><?php echo \Yii::t(
                                            'app',
                                            '{n, plural, =0{0 разделов} one{# раздел} few{# раздела} =4{4 раздела} many{# разделов} other{# разделов}}',
                                            ['n' => $sectionsCount]
                                        ); ?></b>
                                </li>
                                <li class="course-program-header-counts-item">
                                    <b class="course-program-counts-item-number">209</b> видеоматериалов
                                </li>
                            </ul>
                        </div>
                    </header>
                    <div class="course-program-block">
                        <div class="course-program-block-intro">
                            <h3 class="course-program-block-intro-type">Основные курсы</h3>
                        </div>
                        <ul class="course-program-block-details">
                            <li class="course-program-block-details-item">
                                <div class="course-program-block-details-item-summary">
                                    <p>
                                        <?php echo $course->name; ?>
                                    </p>
                                    <div class="plus alt-plus">

                                    </div>
                                </div>
                                <div class="course-program-block-details-item-content">
                                    <ul>
                                        <?php foreach ($courseSections as $section): ?>
                                            <li class="course-program-block-details-list">
                                                <?php echo $section->name; ?>.
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
        </div>
        <section class="course-price" style="background-color: <?= $courseInformation->background_color ?>;" name="course-price-section">
        <div class="price profession-container" >
            <div class="price-info">
                <div class="price-info-header">
                    <h2>Стоимость обучения</h2>
                </div>
                <div class="price-info-wrapper">
                    <div class="price-timer-block">
                        <img src="https://248006.selcdn.ru/LandGen/July/july_percent_sign2.png" width="24" height="24">
                        <p>Скидка действует 1 день 17:10:19</p>
                    </div>
                    <div class="price-info-block">
                        <div class="price-info-block-prices">
                            <span>25 993</span>
                            <sup>₸/мес</sup>
                        </div>
                        <div class="price-info-block-list">
                            Беспроцентная рассрочка — 24 месяца
                        </div>
                    </div>

                </div>
            </div>
            <div class="price-consultation-info">
                <form class="price-consultation-form" >
                    <h3 class="price-consultation-form-subtitle">
                        Записаться на курс или получить бесплатную консультацию
                    </h3>
                    <div class="price-consultation-form-contacts">
                        <div class="form-field">
                            <input class="form-field_input">
                            <label class="form-field_label">Имя<label>
                        </div>
                        <div class="form-field">
                            <input class="form-field_input">
                            <label class="form-field_label">Телефон<label>
                        </div>
                        <div class="form-field">
                            <input class="form-field_input">
                            <label class="form-field_label">Электронная почта<label>
                        </div>
                        <br>
                        <button type="submit" style="background: none; border: none">
                            <div class="start-screen-button">
                                <a name="form_input">Записаться на курс</a>
                            </div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
        <div class="content">
            <section class="course-experts-section profession-container">
                <div class="course-experts">
                    <h2 class="course-experts-title">Эксперты</h2>
                    <div class="course-experts-teachers-list">
                        <article class="teacher">
                            <div class="teacher-photo">
                                <img src="/images/teachers/teacher-2.jpg">
                            </div>
                            <div class="teacher-info">
                                <div class="teacher-info-name">
                                    Халилов Шамиль
                                </div>
                                <div class="teacher-work">
                                    Технический директор.
                                </div>
                                <p class="teacher-desc">
                                    Технический директор. Специалист с огромным стажем в области Web - разработки, data science. Профессиональные навыки администрирования серверов и сетей, работа с BIG DATA.
                                    Председатель государственной аттестационной комиссии университета “SHAKARIM UNIVERSITY”
                                </p>
                            </div>
                        </article>
                        <article class="teacher">
                            <div class="teacher-photo">
                                <img src="/images/teachers/teacher-1.png">
                            </div>
                            <div class="teacher-info">
                                <div class="teacher-info-name">
                                    Токтаров Бауыржан
                                </div>
                                <div class="teacher-work">
                                    Team lead, Python-developer.
                                </div>
                                <p class="teacher-desc">
                                    Обширные знания в области мониторинга и парсинга новостных сайтов и социальных сетей. Анализ данных, настройка и применение поисковых движков.
                                </p>
                            </div>
                        </article>
                    </div>
                </div>
            </section>
        </div>
        <section class="bottom-section profession-container">
            <div class="bottom">
                <div class="bottom-top-mainInfo">
                    <div class="bottom-contacts">
                        <div class="bottom-contacts-phone">
                            +7 771 302 02 20
                        </div>
                        <div class="bottom-contacts-contactCenter">
                            Контактный центр
                        </div>
                        <div class="bottom-contacts-email">
                            hello@skillbox.kz
                        </div>
                        <div class="bottom-contacts-socials">
                            <a href="#">
                                <img src="https://skillbox.kz/assets/img/socials/facebook.svg">
                            </a>
                            <a href="#">
                                <img src="https://skillbox.kz/assets/img/socials/facebook.svg">
                            </a>
                            <a href="#">
                                <img src="https://skillbox.kz/assets/img/socials/facebook.svg">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="bottom-info">
                    <div class="bottom-info-topItem">
                        <a href="#">Публичный договор</a>
                    </div>
                    <div class="bottom-info-topItem">
                        <a href="#">Политика конфиденциальности</a>
                    </div>
                </div>
                <div class="bottom-legal">
                    <div class="bottom-legal-topItem">
                        Delta Education
                    </div>
                    <div class="bottom-legal-topItem">
                        Республика Казахстан,  город Семей, улица Гагарина 32
                    </div>
                </div>
            </div>
        </section>
</div>





<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript">

    const plusButton = document.querySelectorAll(".plus");

    for(let i=0; i<= plusButton.length; i++){
        plusButton[i].addEventListener("click", function(){
            const block = document.querySelectorAll('.course-program-block-details-item-content');
            const computedStyle = window.getComputedStyle(block[i]);  /*получаем все css свойства элемента*/
            if(computedStyle.display == "none"){
                block[i].style.display = "block";
                plusButton[i].style.backgroundSize =  "50% 2px,0px 50%";
            }else{
                block[i].style.display = "none";
                plusButton[i].style.backgroundSize =  "50% 2px,2px 50%";
            }
        })
    }



</script>