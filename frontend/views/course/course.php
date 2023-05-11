<?php

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Breadcrumbs;

?>

<div class="profession">
    <section class="profession-header profession-container">
        <div>
            <a href="/">
                <img src="/images/delta-image.jpg" alt="school-logo" width="54" height="54" />
            </a>
        </div>
        <div>
            Образовательная платформа
        </div>
    </section>
    <!--<div class="profession-breadcrumbs">
            <?php
    /*                echo Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        'homeLink' => [
                                'label' => 'Главная',
                                'url' => ['/']
                        ],
                        'itemTemplate' => "<li><i>{link}></i></li>"
                    ]);
                    $this->title = $courseInformation->title;
                    $this->params['breadcrumbs'][] = $this->title;

                */?>
        </div>-->
    <div class="content">
        <section class="start-screen-section profession-container">
            <br>
            <div class="start-screen-block" style="background-color: <?= $course["background_color"] ?>">
                <div>
                    <div class="start-screen-title">
                        <?php echo  $course['name'] ?>
                    </div>
                    <div class="start-screen-description">
                        <?php echo  $course['description'] ?>
                    </div>
                    <div class="start-screen-button">
                        <a href="#course-price-section" style="color: white" >Записаться на курс</a>
                    </div>
                </div>
                <div class="start-screen-img">
                    <img src="/uploads/<?php echo $course['img'] ?>">
                </div>
            </div>
            <ul class="start-screen-features">
                <li>
                    <strong class="start-screen-features-subtitle"> Занятия</strong><br>
                    <span class="start-screen-features-text ">3 раза в неделю</span>
                </li>
                <li>
                    <strong class="start-screen-features-subtitle "> Стоимость </strong><br>
                    <span class="start-screen-features-text ">
                            <?= number_format($course['course_price'], 0, '.', ' ');?>
                            ₸
                        </span>
                </li>
                <li>
                    <strong class="start-screen-features-subtitle "> Длительность </strong><br>
                    <span class="start-screen-features-text ">
                            <?php
                                echo Yii::$app->i18n->format('{n, plural, 
                                    =0{# месяцев} 
                                    one{# месяц} 
                                    =2{# месяцев}
                                    few{# месяца} 
                                    many{# месяцев} 
                                    other{# месяцев}
                                }', ['n' => $course['course_time']], 'ru_RU');
                            ?>

                    </span>
                </li>
            </ul>
        </section>
        <section class="about-profession profession-container ">
            <div class="about-profession-block">
                <h2 class="about-profession-title">О профессии</h2>
                <div style="width: 700px">
                    <div class="about-profession-desc">
                        <?php echo $course['about_profession'] ?>
                    </div>
                    <ul class="about-profession-list">
                        <li class="about-profession-list-item">
                            <b class="about-profession-list-item-subtitle "> 2 837 компании </b>
                            <p class="about-profession-list-item-desc"> сейчас ищут разработчиков </p>
                        </li>
                        <li class="about-profession-list-item">
                            <b class="about-profession-list-item-subtitle "> 500 000 ₸ </b>
                            <p class="about-profession-list-item-desc "> средняя зарплата PHP-разработчика </p>
                        </li>
                    </ul>
                </div>
            </div>
            <img src="/images/profession-image.jpg" width="350" height="350" />
        </section>
        <section class="profession-auditory-sections profession-container">
            <h2 class="profession-auditory-title"> Кому подойдёт этот курс </h2>
            <ul class="profession-auditory-list">
                <li class="profession-auditory-list-item">
                    <div class="profession-auditory-list-item-img">
                        <img src="/images/course-auditory-1.jpg">
                    </div>
                    <div>
                        <b class="profession-auditory-list-item-title">
                            Тем, кто хочет научиться программировать
                        </b>
                        <p class="profession-auditory-list-item-desc">
                            С нуля освоите язык программирования , получите помощь
                            и советы от опытных спикеров, попрактикуетесь на реальных задачах.
                            Напишете первые проекты для портфолио и поработаете в команде.
                        </p>
                    </div>
                </li>
                <li class="profession-auditory-list-item">
                    <div class="profession-auditory-list-item-img">
                        <img src="/images/course-auditory-2.jpg">
                    </div>
                    <div>
                        <b class="profession-auditory-list-item-title">
                            Начинающим разработчикам
                        </b>
                        <p class="profession-auditory-list-item-desc">
                            Структурируете имеющиеся знания, а кураторы
                            помогут разобраться с трудными для понимания темами и
                            порекомендуют дополнительную литературу. Научитесь эффективно
                            решать повседневные задачи программиста.
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
                <?php /*if(!empty($courseInformation->skills)): */?><!--
                        <?php /*$skills = explode("/", $courseInformation->skills) */?>
                        <?php /*foreach ($skills as $skill ):*/?>

                        <?php /*endforeach; */?>
                    --><?php /*endif; */?>
                <li class="universal-list-item">
                    <div class="wrap">
                        <div id="check-part-1" class="check-sign"></div>
                        <div id="check-part-2" class="check-sign"></div>
                    </div>
                    <div class="universal-list-item-title">
                        Программировать на PHP
                    </div>
                    <div class="universal-list-item-subtitle">
                        Пройдёте основы, без которых невозможно стать полноценным PHP-разработчиком: научитесь работать с переменными, типами данных, условиями, циклами, функциями. Узнаете, что такое рекурсия и область видимости.
                    </div>
                </li>
                <li class="universal-list-item">
                    <div class="wrap">
                        <div id="check-part-1" class="check-sign"></div>
                        <div id="check-part-2" class="check-sign"></div>
                    </div>
                    <div class="universal-list-item-subtitle">
                        Работать с файловой системой
                    </div>
                </li>
                <li class="universal-list-item">
                    <div class="wrap">
                        <div id="check-part-1" class="check-sign"></div>
                        <div id="check-part-2" class="check-sign"></div>
                    </div>
                    <div class="universal-list-item-subtitle">
                        Работать с базами данных
                    </div>
                </li>
                <li class="universal-list-item">
                    <div class="wrap">
                        <div id="check-part-1" class="check-sign"></div>
                        <div id="check-part-2" class="check-sign"></div>
                    </div>
                    <div class="universal-list-item-subtitle">
                        Находить ошибки в коде
                    </div>
                </li>
                <li class="universal-list-item">
                    <div class="wrap">
                        <div id="check-part-1" class="check-sign"></div>
                        <div id="check-part-2" class="check-sign"></div>
                    </div>
                    <div class="universal-list-item-subtitle">
                        Работе с системой контроля версий Git
                    </div>
                </li>
                <li class="universal-list-item">
                    <div class="wrap">
                        <div id="check-part-1" class="check-sign"></div>
                        <div id="check-part-2" class="check-sign"></div>
                    </div>
                    <div class="universal-list-item-subtitle">
                        Сборке, тестированию и развертыванию приложений
                    </div>
                </li>
            </ul>
        </section>
        <section class="course-program-section profession-container">
            <div class="course-program">
                <header class="course-program-header">
                    <h2 class="course-program-header-title">Содержание курса</h2>
                    <div>
                        <p class="course-program-header-desc">Вас ждут уроки и практика на основе реальных кейсов.</p>
                        <ul class="course-program-header-counts-list">
                            <li class="course-program-header-counts-item">
                                <b class="course-program-counts-item-number"><?php echo \Yii::t(
                                        'app',
                                        '{n, plural, =0{0 разделов} one{# раздел} few{# раздела} =4{4 раздела} many{# разделов} other{# разделов}}',
                                        ['n' => $course['sections_count']]
                                    ); ?></b>
                            </li>
                            <li class="course-program-header-counts-item">
                                <b class="course-program-counts-item-number"><?= $course['sections_materials_count'] ?></b> уроков
                            </li>
                        </ul>
                    </div>
                </header>
                <div class="course-program-block">
                    <!--<div class="course-program-block-intro">
                        <h3 class="course-program-block-intro-type">Основные курсы</h3>
                    </div>-->
                    <ul class="course-program-block-details">
                        <li class="course-program-block-details-item">
                            <div class="course-program-block-details-item-summary">
                                <p>
                                    <?php echo $course['name'] ?>
                                </p>
                                <div class="plus alt-plus">
                                </div>
                            </div>
                            <div class="course-program-block-details-item-content">
                                <ul>
                                    <?php foreach ($sections as $section): ?>
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
    <section class="course-price" style="background-color: <?= $course['background_color'] ?>;" name="course-price-section">
        <div class="price profession-container" >
            <div class="price-info">
                <div class="price-info-header">
                    <h2>Стоимость Курса</h2>
                </div>
                <div class="price-info-wrapper">
                    <!--<div class="price-timer-block">
                        <img src="https://248006.selcdn.ru/LandGen/July/july_percent_sign2.png" width="24" height="24">
                        <p>Скидка действует 1 день 17:10:19</p>
                    </div>-->
                    <div class="price-info-block">
                        <div class="price-info-block-prices">
                            <span><?= $course['course_price'] / $course['course_time'] ?></span>
                            <sup>₸/мес</sup>
                        </div>
                        <!--<div class="price-info-block-list">
                            Беспроцентная рассрочка — 24 месяца
                        </div>-->
                    </div>

                </div>
            </div>
            <div  id="course-price-section" class="price-consultation-info" >
                <form class="price-consultation-form"  id="price-consultation-form" onsubmit="register(event)" method="post" enctype="multipart/form-data" >
                    <h3 class="price-consultation-form-subtitle">
                        Записаться на курс или получить бесплатную консультацию
                    </h3>
                    <div class="price-consultation-form-contacts">
                        <div class="form-field">
                            <input class="form-field_input" name="name"  id="name" required>
                            <label class="form-field_label">Имя<label>
                        </div>
                        <div class="form-field">
                            <input class="form-field_input" name="phone_number" id="phone_number" required>
                            <label class="form-field_label">Телефон<label>
                        </div>
                        <div class="form-field">
                            <input class="form-field_input" name="email" id="email" required>
                            <label class="form-field_label">Электронная почта<label>
                        </div>
                        <br>
                        <button type="submit" style="background: none; border: none" ">
                        <div class="start-screen-button">
                            <div name="form_input">Записаться на курс</div>
                        </div>
                        </button>
                    </div>
                </form>
                <div class="price-info-thank" id="price-info-thank">
                    <div class="wrap">
                        <div id="check-part-1" class="check-sign"></div>
                        <div id="check-part-2" class="check-sign"></div>
                    </div>
                    <br/>
                    <h3>Cпасибо!</h3>
                    <div>Ваша заявка успешно принята</div>
                </div>
                <div class="price-info-thank price-info-error" id="price-info-error">
                    <div class="wrap">
                        <div id="check-part-1" class="check-sign"></div>
                        <div id="check-part-2" class="check-sign"></div>
                    </div>
                    <br/>
                    <h3>ОЙ!</h3>
                    <div>Что-то пошло не так, попробуйте отправить заявку позже</div>
                </div>
            </div>
        </div>
    </section>
    <div class="content" style="margin-bottom: 300px">
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

    function register (e) {
        e.preventDefault();

        let formData = new FormData();

        let name = $("#name").val();
        let phoneNumber = $("#phone_number").val();
        let email = $("#email").val();

        formData.append('name', name);
        formData.append('phoneNumber', phoneNumber);
        formData.append('email', email);

        const thank = document.getElementById('price-info-thank');
        const form = document.getElementById('price-consultation-form');
        const error = document.getElementById('price-info-error');

        $.ajax({
            url: `/course/registration`,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'text',
            success: function (data) {
                thank.style.display = 'flex';
                form.style.display = 'none';
            },
            error: function (xhr,error){
                error.style.display = 'flex';
                console.log(xhr, error)
            }
        })

    }

</script>







<!--<section class="work-section profession-container">-->
    <!--                <header class="work-section-header">-->
    <!--                    <div>-->
    <!--                        <h2 class="work-section-header-title">-->
    <!--                            Помощь с трудоустройством-->
    <!--                        </h2>-->
    <!--                        <p class="work-section-header-desc">-->
    <!--                            Вас ждёт индивидуальная поддержка нашего партнера — HR-специалиста. Вместе вы составите резюме, подготовите портфолио и разработаете карьерный план, который поможет найти работу быстрее. Сможете выбрать привлекательные вакансии и получите приоритет перед другими соискателями.-->
    <!--                        </p>-->
    <!--                    </div>-->
    <!--                    <div>-->
    <!--                        <img src="https://248006.selcdn.ru/LandGen/blocks/work/v4/center-xl_v2.webp">-->
    <!--                    </div>-->
    <!--                </header>-->
    <!--                <div class="work-expectations">-->
    <!--                    <h3 class="work-expectations-title">Чем вам поможет Центр карьеры:</h3>-->
    <!--                   <div id="my-slider" class="carousel slide" data-bs-ride="carousel">-->
    <!--                        <div class="carousel-inner">-->
    <!--                            <div class="carousel-item active">-->
    <!--                                <div class="container">-->
    <!--                                    <div class="row work-expectations-list">-->
    <!--                                        <div class="work-expectations-list-item">-->
    <!--                                            <div class="work-expectations-list-item-visible-info">-->
    <!--                                                <h5 class="card-title">Партнерские вакансии</h5>-->
    <!--                                                <p class="card-text">Порекомендуем вашу кандидатуру партнёрам</p>-->
    <!--                                            </div>-->
    <!--                                        </div>-->
    <!--                                        <div class="work-expectations-list-item">-->
    <!--                                            <div class="work-expectations-list-item-visible-info">-->
    <!--                                                <h5 class="card-title">Индивидуальный карьерный план</h5>-->
    <!--                                                <p class="card-text">Порекомендуем вашу кандидатуру партнёрам</p>-->
    <!--                                            </div>-->
    <!--                                        </div>-->
    <!--                                        <div class="work-expectations-list-item">-->
    <!--                                            <div class="work-expectations-list-item-visible-info">-->
    <!--                                                <h5 class="card-title">Партнерские вакансии</h5>-->
    <!--                                                <p class="card-text">Порекомендуем вашу кандидатуру партнёрам</p>-->
    <!--                                            </div>-->
    <!--                                        </div>-->
    <!--                                    </div>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                            <div class="carousel-item">-->
    <!--                                <div class="container">-->
    <!--                                    <div class="row work-expectations-list">-->
    <!--                                        <div class="work-expectations-list-item col-md-6">-->
    <!--                                            <div class="work-expectations-list-item-visible-info">-->
    <!--                                                <h5 class="card-title">Оформление портфолио</h5>-->
    <!--                                                <p class="card-text">Поможем эффектно представить ваши проекты</p>-->
    <!--                                            </div>-->
    <!--                                        </div>-->
    <!--                                        <div class="work-expectations-list-item col-md-6">-->
    <!--                                            <div class="work-expectations-list-item-visible-info">-->
    <!--                                                <h5 class="card-title">Партнерские вакансии</h5>-->
    <!--                                                <p class="card-text">Порекомендуем вашу кандидатуру партнёрам</p>-->
    <!--                                            </div>-->
    <!--                                        </div>-->
    <!--                                    </div>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                        <div class="carousel-control-container">-->
    <!--                            <button class="carousel-control-prev" type="button" data-bs-target="#my-slider" data-bs-slide="prev">-->
    <!--                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>-->
    <!--                                <span class="visually-hidden">Previous</span>-->
    <!--                            </button>-->
    <!--                            <button class="carousel-control-next" type="button" data-bs-target="#my-slider" data-bs-slide="next">-->
    <!--                                <span class="carousel-control-next-icon" aria-hidden="true"></span>-->
    <!--                                <span class="visually-hidden">Next</span>-->
    <!--                            </button>-->
    <!--                        </div>-->
    <!--                    </div>-->-->
    <!--                    <ul class="work-expectations-list">-->
    <!--                        <li class="work-expectations-list-item" style="background-color: #ffdf6e">-->
    <!--                            <div class="work-expectations-list-item-visible-info">-->
    <!--                                <div class="work-expectations-list-item-number">1</div>-->
    <!--                                <h4 class="work-expectations-list-item-subtitle">Индивидуальный карьерный план</h4>-->
    <!--                                <span class="work-expectations-list-item-subline">Расскажем, как начать и развивать карьеру</span>-->
    <!--                            </div>-->
    <!--                        </li>-->
    <!--                        <li class="work-expectations-list-item" style="background-color: #c3ebf0">-->
    <!--                            <div class="work-expectations-list-item-visible-info">-->
    <!--                                <div class="work-expectations-list-item-number">2</div>-->
    <!--                                <h4 class="work-expectations-list-item-subtitle">Индивидуальный карьерный план</h4>-->
    <!--                                <span class="work-expectations-list-item-subline">Расскажем, как начать и развивать карьеру</span>-->
    <!--                            </div>-->
    <!--                        </li>-->
    <!--                        <li class="work-expectations-list-item" style="background-color: #afdfb4">-->
    <!--                            <div class="work-expectations-list-item-visible-info">-->
    <!--                                <div class="work-expectations-list-item-number">3</div>-->
    <!--                                <h4 class="work-expectations-list-item-subtitle">Партнерские вакансии</h4>-->
    <!--                                <span class="work-expectations-list-item-subline">Порекомендуем вашу кандидатуру партнёрам</span>-->
    <!--                            </div>-->
    <!--                        </li>-->
    <!--                    </ul>-->
    <!--                </div>-->
    <!--                <div class="work-block">-->
    <!--                    <div class="work-block-left">-->
    <!--                        <div class="work-stats">-->
    <!--                            <p class="work-stats-student-count">-->
    <!--                                7000⁠+-->
    <!--                                пользователей Skillbox получили новую работу с 2019 года-->
    <!--                            </p>-->
    <!--                            <ul class="work-stats-list">-->
    <!--                                <li class="work-stats-list-item">-->
    <!--                                    500⁠+-->
    <!--                                    пользователей ежеквартально находят работу с помощью Центра карьеры-->
    <!--                                </li>-->
    <!--                                <li class="work-stats-list-item">-->
    <!--                                    1400⁠+-->
    <!--                                    пользователей Skillbox улучшили карьеру в 2022 году-->
    <!--                                </li>-->
    <!--                            </ul>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="work-block-right">-->
    <!--                        <h3 class="work-block-subtitle">-->
    <!--                            Почему пользователи Skillbox трудоустраиваются?-->
    <!--                        </h3>-->
    <!--                        <ul class="work-block-statements-list">-->
    <!--                            <li class="work-block-statements-list-item">-->
    <!--                                <h4 class="work-block-statements-item-title">-->
    <!--                                    Востребованные профессии-->
    <!--                                </h4>-->
    <!--                                <p class="work-block-statements-item-desc">-->
    <!--                                    Мы тщательно анализируем профессии, в которых помогаем с трудоустройством: опрашиваем специалистов, оцениваем вакансии, потребность в кандидатах и доступность профессии для новичков.-->
    <!--                                </p>-->
    <!--                            </li>-->
    <!--                            <li class="work-block-statements-list-item">-->
    <!--                                <h4 class="work-block-statements-item-title">-->
    <!--                                    Качественные знания-->
    <!--                                </h4>-->
    <!--                                <p class="work-block-statements-item-desc">-->
    <!--                                    Помогаем получить навыки, которые необходимы здесь и сейчас. Все спикеры — практикующие специалисты, а их знания востребованы на рынке.-->
    <!--                                </p>-->
    <!--                            </li>-->
    <!--                            <li class="work-block-statements-list-item">-->
    <!--                                <h4 class="work-block-statements-item-title">-->
    <!--                                    Поддержка на старте карьеры-->
    <!--                                </h4>-->
    <!--                                <p class="work-block-statements-item-desc">-->
    <!--                                    Наши консультанты контролируют каждый шаг на пути к вашей карьере. Они помогают избежать ошибок и спланировать профессиональный путь.-->
    <!--                                </p>-->
    <!--                            </li>-->
    <!--                        </ul>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </section>-->