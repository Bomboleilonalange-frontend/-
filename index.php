<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <meta>
    <title>Document</title>
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="header-nav">
                <div>
                    <a href=""><img class="logo" src="img/logo.svg" alt=""></a>
                </div>
                <nav>
                    <ul class="nav-list">
                        <li><a href="#direction-link">Курсы</a></li>
                        <li><a href="#Master-link">Мастер классы</a></li>
                        <li><a href="#Photo-link">Фото</a></li>
                        <li><a href="#About-link">О нас</a></li>
                        <li><a href="#Reviews-link">Отзывы</a></li>
                        <li><a href="#Contacts-link">Контакты</a></li>
                    </ul>
                </nav>
                <div class="social">
                    <a href=""><img src="img/Telegram.svg" alt=""></a>
                    <a href=""><img src="img/VK.svg" alt=""></a>
                    <a href=""><img src="img/Whatsapp.svg" alt=""></a>
                </div>
                <div class="Phone">
                    <a href="tel:+7(969) 777-20-11">+7(969) 777-20-11</a>
                </div>
                <?php if (!empty($_SESSION['user_id'])) : ?>
                    <?php if ($_SESSION['status'] == 'admin') : ?>
                        <a class="" href="panel.php">Панель администратора</a>
                    <?php else : ?>
                        <a class="" href="cabinet.php">Личный кабинет</a>
                    <?php endif; ?>
                <?php else : ?>
                    <button class="Enter">Войти</button>
                <?php endif; ?>
            </div>
            <div class="header-lower">
                <div class="header-text">
                    <h1 class="header-heading">
                        Изостудия
                        <br>
                        Юные Дарования
                        <br>
                        Для детей и взрослых
                    </h1>
                    <p class="heading-text">Запишитесь на пробный урок
                        <br>
                        прямо сейчас
                    </p>
                    <div>
                        <button class="Record">Записаться</button>
                    </div>

                </div>
                <div class="header-img">
                    <picture>
                        <img class="header-picture" src="img/Девочка.png" alt="">
                    </picture>
                </div>
            </div>
        </div>
    </header>
    <main class="main">
        <div class="container">
            <section class="advantages">
                <div class="advantages-column">
                    <h2>Изостудия Юные Дарования это </h2>
                    <div class="advantages-cards">
                        <div class="advantages-card">
                            <img src="img/Преимущество1.jpg" alt="">
                            <h3>Пробный урок бесплатно</h3>
                            <!-- <p>Откройте для себя мир искусства, прежде чем принять решение, с нашим бесплатным пробным уроком, который позволит вам оценить качество и подход нашей студии.</p> -->
                        </div>


                        <div class="advantages-card">
                            <img src="img/Преимущество2.jpg" alt="">
                            <h3>Мастерство опытных наставников</h3>
                            <!-- <p>Наши педагоги - это опытные художники, которые поделятся с вами своими знаниями и помогут раскрыть ваш потенциал.</p> -->
                        </div>
                        <div class="advantages-card">
                            <img src="img/Преимущество3.jpg" alt="">
                            <h3>Учим с нуля детей с 3 лет и взрослых</h3>
                            <!-- <p>Неважно, начинаете ли вы с нуля или уже имеете опыт - наши курсы помогут вам развить и усовершенствовать ваши навыки.</p> -->
                        </div>
                        <div class="advantages-card">
                            <img src="img/Преимущество4.jpg" alt="">
                            <h3>Индивидуальный подход к каждому</h3>
                            <!-- <p>Мы верим, что каждый уникален, поэтому наши программы обучения адаптируются под индивидуальные потребности и цели каждого студента.</p> -->
                        </div>



                        <div class="advantages-card">
                            <img src="img/Преимущество5.jpg" alt="">
                            <h3>Игровая форма подачи материала</h3>
                            <!-- <p>Погрузитесь в творческую атмосферу, где каждый уголок наполнен искусством и вдохновением.</p> -->
                        </div>
                        <div class="advantages-card">
                            <img src="img/Преимущество6.jpg" alt="">
                            <h3>Цены, доступные каждому</h3>
                            <!-- <p>Мы стремимся сделать искусство доступным, поэтому предлагаем конкурентоспособные цены без ущерба для качества.</p> -->
                        </div>
                     

                        <div class="advantages-card">
                            <img src="img/Преимущество7.jpg" alt="">
                            <h3>Обучения новым техникам на каждом уроке</h3>
                            <!-- <p>С каждым уроком вы будете открывать новые горизонты и приобретать уникальные навыки и техники.</p> -->
                        </div>
                        <div class="advantages-card">
                            <img src="img/Преимущество8.jpg" alt="">
                            <h3>Участие в городских, всероссийских, международных конкурсках и выставках.</h3>
                            <!-- <p>Мы уверены в качестве наших услуг и готовы вернуть ваши средства, если вы не достигнете желаемых результатов.</p> -->
                        </div>

                        <div class="advantages-card">
                            <img src="img/Преимущество9.jpg" alt="">
                            <h3>Атмосфера творчества и вдохновения</h3>
                            <!-- <p>Забудьте о дополнительных расходах на материалы - мы обеспечим всем необходимым для вашего творчества.</p> -->
                        </div>





                    </div>
                </div>
            </section>
            <section class="direction">
                <div class="direction-column">
                    <h1 id="direction-link">Наши Курсы и Мастер классы</h1>
                    <div class="direction-cards">
                        <div class="card">
                            <img src="img/Дошкольники.jpg" alt="">
                            <h3 data-course="Групповые занятия для дошкольников">Групповые занятия для дошкольников</h3>
                            <p>5000 руб/месяц</p>
                            <ul>
                                <li>Возраст: 4-6 лет</li>
                                <li>Длительность: 45 минут</li>
                                <!-- <li>Материалы и Техники: акварель, пластилин</li> -->
                                <li>Расписание: среда и пятница, 16:00-16:45</li>
                                <li>Количество человек: до 10 в группе</li>
                            </ul>
                            <button class="Record2" id="courseButton">Записаться</button>
                        </div>

                        <div class="card">
                            <img src="img/Школьники.jpg" alt="">
                            <h3 data-course="Групповые занятия для школьников">Групповые занятия для школьников</h3>
                            <p>6500 руб/месяц</p>
                            <ul>
                                <li>Возраст: 7-14 лет</li>
                                <li>Длительность: 1 час</li>
                                <!-- <li>Материалы и Техники: графика, масло</li> -->
                                <li>Расписание: вторник и четверг, 17:00-18:00</li>
                                <li>Количество человек: до 10 в группе</li>
                            </ul>
                            <button class="Record2" id="courseButton">Записаться</button>
                        </div>

                        <div class="card">
                            <img src="img/Пленэры.jpg" alt="">
                            <h3 data-course="Плэнеры">Пленэры</h3>
                            <p>4500 руб/6 занятий</p>
                            <ul>
                                <li>Возраст: 15+ лет</li>
                                <li>Длительность: 1.5 часа</li>
                                <!-- <li>Материалы и Техники: смешанные медиа</li> -->
                                <li>Расписание: по субботам, 14:00-15:30</li>
                                <li>Количество человек: 6 в группе</li>
                            </ul>
                            <button class="Record2" id="courseButton">Записаться</button>
                        </div>

                        <div class="card">
                            <img src="img/Живопись_Школьники.jpg" alt="">
                            <h3 data-course="Академический рисунок и живопись для детей">Академический рисунок и живопись для детей</h3>
                            <p>6500 руб/месяц</p>
                            <ul>
                                <li>Возраст: 8-12 лет</li>
                                <li>Длительность: 1 час 15 минут</li>
                                <!-- <li>Материалы и Техники: уголь, масляная живопись</li> -->
                                <li>Расписание: понедельник и среда, 17:30-18:45</li>
                                <li>Количество человек: до 12 в группе</li>
                            </ul>
                            <button class="Record2">Записаться</button>
                        </div>

                        <div class="card">
                            <img src="img/Курс_Взрослые.jpg" alt="">
                            <h3  data-course="Курс живописи для взрослых">Курс живописи для взрослых</h3>
                            <p>8000 руб/8 занятий</p>
                            <ul>
                                <li>Возраст: 18+ лет</li>
                                <li>Длительность: 2 часа</li>
                                <!-- <li>Материалы и Техники: акрил, масло</li> -->
                                <li>Расписание: воскресенье, 11:00-13:00</li>
                                <li>Количество человек: до 15 в группе</li>
                            </ul>
                            <button class="Record2">Записаться</button>
                        </div>

                        <!-- <div class="card">
                            <img src="img/Фотка-заплаткаsvg.svg" alt="">
                            <h3  data-course="Курс живописи для взрослых">Актуальные мастер классы</h3>
                            <p>от 1500 руб</p>
                            <ul>
                                <li>Возраст: от 9 лет</li>
                                <li>Длительность: от 2 часов</li>
                                <li>Материалы и Техники: акрил, масло</li>
                                <li>Расписание: По выходным</li>
                                <li>Количество человек: до 10 в группе</li>
                            </ul>
                            <button class="Record2">Записаться</button>
                        </div> -->
                    </div>
                </div>
            </section>
            <section class="Master-Class">
                <div class="Master-column">
                    <h1 id="Master-link">Наши мастер классы</h1>
                    <div class="Master-Slider">
                        <button id="slider-button-left" class="slider-button"></button>
                        <div class="Slider-container">
                        </div>
                        <button id="slider-button-right" class="slider-button"></button>
                    </div>
                </div>
            </section>
            <section class="Photo">
                <div class="Photo-column">
                    <h1 id="Photo-link">Ученики и их творения</h1>
                    <div class="Photo-pagination">
                        <button data-category="student_works">Работы учеников</button>
                        <button data-category="course_photos">Фото с курсов и мастер классов</button>
                    </div>
                    <picture class="Photo-container">
                    </picture>
                </div>
            </section>
            <section id="About-link" class="About-us">
                <div class="about-author">
                    <div class="author-info">
                        <h1>Об основателе
                            Изостудии</h1>
                            <p class="about-aut">Я - Ковалёва Людмила Викторовна. Учитель начальных классов и изобразительного исскуства. <br>Умею учить рисовать!</p>
                        <!-- <p>Добрый день! Я руководитель и основатель Изостудии "Юные Дарования" - Ковалёва Людмила Викторовна. Закончила Брянский Государственный Педагогический Университет в 1999 году по специальности учитель начальных классов и учитель изобразительного искусства. С детства я очень любила рисовать, и поэтому свой профессиональный путь  связала с творчеством. -->
                        </p>
                        <ul>
                            <li>Закончила Брянский Государственный Педагогический Университет в 1999 году по специальности учитель начальных классов и учитель изобразительного искусства.</li>
                            <li>Опыт работы в профессии больше 24 лет</li>
                            <li>Финалист конкурса "Педагог года"</li>
                            <li>Педагог Высшей квалификационной категории</li>
                            <li>Реализую собственную программу обучения </li>
                            <li>Регулярно повышаю свою собственную квалификацию, имею помимо еще 2 высших образования: Педагог-организатор, Педагог дополнительного образования</li>
                        </ul>
                    </div>
                    <div class="author-photo">
                        <picture>
                            <img src="img/я 5.jpg" alt="">
                        </picture>
                    </div>
                </div>
                <div class="about-teachers">
                    <h1>Наши преподаватели</h1>
                    <div class="teachers-cards">
                        <div class="teachers-card">
                            <div class="keed">
                                <div class="p-b">
                                    <img src="img/я 4.jpg" alt="">
                                    <button class="View" data-category="teacher_painting1">Работы</button>
                                </div>
                                <div class="con">
                                    <h3>Ковалёва Людмила Викторовна</h3>
                                    <span>Основатель Изостудии, веду занятия по рисованию, художественному творчеству, лепке, мастер классы и курс живописи для взрослых. Учу техникам рисования гуашью, акварелью, акрилом, маслом, сухой и масляной пастелью.  </span>
                                </div>
                            </div>
                        </div>
                        <div class="teachers-card">
                            <div class="keed">
                                <div class="p-b">
                                    <img src="img/Препод2.jpg" alt="">
                                    <button class="View" data-category="teacher_painting2">Работы</button>
                                </div>
                                <div class="con">
                                    <h3>Трошина Татьяна Николаевна</h3>
                                    <span>Преподаватель Академического рисунка и Академической живописи, учит техникам рисования графитным карандашом, сухой и масляной пастелью, гуашью и акварелью имеет профессиональное художественное образование и опыт работы в художественных школах более 5 лет. </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="Reviews-link" class="Reviews">
                <div class="Rewiews-container">
                    <h1>Вот что о нас говорят</h1>
                    <div class="reviews-container" id="reviews-container"></div>
                    <form action="php/reviews.php" method="post" id="review-form">
                        <textarea id="review-text" name="review-text" placeholder="Оставьте ваш отзыв здесь..."></textarea>
                        <button type="submit">Отправить</button>
                    </form>
                </div>
            </section>
            <section class="Gift-sertificfates">
                <div class="sertificfate-container">
                    <img src="img/сертификат.jpg" alt="">
                    <div class="sertificfate-info">
                        <h3>Подарочные сертификаты</h3>
                        <p>Подарите своим близким или друзьям новые впечатления с нашими подарочными сертификатами</p>
                        <button class="sertificfate-button">Выбрать сертификат в подарок</button>
                    </div>
                </div>
            </section>
            <section class="FAQ">
                <div class="FAQ-container">
                    <h1>Все что вы хотели знать <br>
                        Но боялись спросить</h1>
                    <div class="QAs">
                        <div class="QA">
                            <button class="Question">
                                <span>Вопрос 1</span>
                                <span>Могу я прийти на курс или мастер класс если я никогда не рисовал(а)?</span>
                                <span class="icon">+</span>
                            </button>
                            <div class="Answer">
                                <span>Ответ</span>
                                <span>Да конечно! Все наши курсы и мастер классы построены таким образом что подойдут каждому как новичку так и профессионалу</span>
                            </div>
                        </div>
                        <div class="QA">
                            <button class="Question">
                                <span>Вопрос 2</span>
                                <span>Какие занятия вы предлагаете для развития творческих способностей?</span>
                                <span class="icon">+</span>
                            </button>
                            <div class="Answer">
                                <span>Ответ</span>
                                <span>Мы предлагаем широкий спектр занятий, включая рисование, лепку, аппликацию и многое другое, которые способствуют развитию творческих навыков и приносят удовольствие.</span>
                            </div>
                        </div>
                        <div class="QA">
                            <button class="Question">
                                <span>Вопрос 3</span>
                                <span>Как изостудия может помочь мне, если я хочу развить свои творческие способности?</span>
                                <span class="icon">+</span>
                            </button>
                            <div class="Answer">
                                <span>Ответ</span>
                                <span>Наша изостудия предлагает не только детские программы, но и курсы для взрослых, которые помогут вам открыть новые горизонты в творчестве и обеспечат поддержку единомышленников.</span>
                            </div>
                        </div>

                        <div class="QA">
                            <button class="Question">
                                <span>Вопрос 4</span>
                                <span>Как изостудия может помочь укрепить связь с моим ребенком?</span>
                                <span class="icon">+</span>
                            </button>
                            <div class="Answer">
                                <span>Ответ</span>
                                <span>Мы предлагаем совместные занятия для родителей и детей, которые не только способствуют развитию творческих навыков, но и укрепляют семейные узы.</span>
                            </div>
                        </div>

                        <div class="QA">
                            <button class="Question">
                                <span>Вопрос 5</span>
                                <span>Может ли мой ребенок заниматься в изостудии, если у него нет таланта к рисованию?</span>
                                <span class="icon">+</span>
                            </button>
                            <div class="Answer">
                                <span>Ответ</span>
                                <span>Талант - это то, что можно развить. Мы верим, что каждый ребенок может научиться рисовать и творить, если у него есть желание и подходящее руководство.</span>
                            </div>
                        </div>

                        <div class="QA">
                            <button class="Question">
                                <span>Вопрос 6</span>
                                <span>Есть ли у вас мастер-классы, которые помогут мне научиться чему-то новому?</span>
                                <span class="icon">+</span>
                            </button>
                            <div class="Answer">
                                <span>Ответ</span>
                                <span>Да, наши мастер-классы охватывают множество тем и направлений, позволяя каждому найти что-то новое и интересное для себя.</span>
                            </div>
                        </div>

                        <div class="QA">
                            <button class="Question">
                                <span>Вопрос 7</span>
                                <span>Как я могу поделиться своими творческими работами с другими?</span>
                                <span class="icon">+</span>
                            </button>
                            <div class="Answer">
                                <span>Ответ</span>
                                <span>У нас есть специальные платформы и мероприятия, где вы можете представить свои работы широкой аудитории и получить обратную связь.</span>
                            </div>
                        </div>

                        <div class="QA">
                            <button class="Question">
                                <span>Вопрос 8</span>
                                <span>Какие гарантии качества и безопасности вы предлагаете?</span>
                                <span class="icon">+</span>
                            </button>
                            <div class="Answer">
                                <span>Ответ</span>
                                <span>Мы гарантируем высокое качество обучения и соблюдение всех мер безопасности, чтобы вы могли чувствовать себя комфортно и защищенно.</span>
                            </div>
                        </div>

                        <div class="QA">
                            <button class="Question">
                                <span>Вопрос 9</span>
                                <span>Как вы создаете атмосферу творчества на мастер-классах?</span>
                                <span class="icon">+</span>
                            </button>
                            <div class="Answer">
                                <span>Ответ</span>
                                <span>Наши пространства специально организованы для вдохновения и творчества, а педагоги создают поддерживающую и позитивную обстановку.</span>
                            </div>
                        </div>

                        <div class="QA">
                            <button class="Question">
                                <span>Вопрос 10</span>
                                <span>Что делать, если я боюсь, что мне не удастся создать что-то стоящее?</span>
                                <span class="icon">+</span>
                            </button>
                            <div class="Answer">
                                <span>Ответ</span>
                                <span>Наши мастер-классы предназначены для людей всех уровней подготовки, и наши педагоги помогут вам раскрыть ваш потенциал.</span>
                            </div>
                        </div>
                        <div class="QA">
                            <button class="Question">
                                <span>Вопрос 11</span>
                                <span>Как производится оплата?</span>
                                <span class="icon">+</span>
                            </button>
                            <div class="Answer">
                                <span>Ответ</span>
                                <span>У нас есть 3 вида оплаты наших услуг: Наличными, Расчетный счет изостудии. </span>
                            </div>
                        </div>

                        <!-- Добавьте больше вопросов и ответов здесь -->
                    </div>
                </div>
            </section>

            <section id="Contacts-link" class="Contacts">
                <div class="Contacts-container">
                    <div class="Contacts-info">
                        <h1>Будем на связи</h1>
                        <div class="info-container">
                            <a>
                                <img src="img/phone-icon.svg" alt="">
                                +79671651255
                            </a>
                            <a>
                                <img src="img/map-icon.svg" alt="">
                                Г Подольск микрорайон Ново-Сырово улица Быковская дом 8
                            </a>
                            <a>
                                <img src="img/mail-icon.svg" alt="">
                                Email@gmail.com
                            </a>
                            <div class="Contacts-social">
                                <a href="">
                                    <img src="img/icons8-телеграмма-app 1.svg" alt="">
                                </a>
                                <a href="">
                                    <img src="img/icons8-vk 1.svg" alt="">
                                </a>
                                <a href="">
                                    <img src="img/icons8-whatsapp 1.svg" alt="">
                                </a>
                            </div>
                            <button class="Howtoget" data-category="HowToGet">Как пройти</button>
                        </div>
                    </div>
                    <div class="Contacts-map">
                        <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A0b475f0c595143776b01e8977ea98108779ac89e998c5b0a9a574a756882db19&amp;source=constructor" width="500" height="400" frameborder="0"></iframe>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <footer class="footer">
        <div class="container">
            <div class="footer-block">
                <div class="footer-block-one">
                    <a href=""><img class="logo" src="img/logo.svg" alt=""></a>
                    <h3>Изостудия <br>
                        для детей <br>
                        и взрослых</h3>
                    <p>© Copyright юные-дарования-подольск.рф 2024 <br>
                        ИП Ковалёва Людмила Викторовна/ИНН:322200218802/ОГРНИП:321508100238100
                    </p>
                </div>
                <div class="footer-block-two">
                    <h3>Подпишитесь на наши <br> соц-сети</h3>
                    <div class="footer-social">
                        <a href="">
                            <img src="img/icons8-телеграмма-app 1.svg" alt="">
                        </a>
                        <a href="">
                            <img src="img/icons8-vk 1.svg" alt="">
                        </a>
                        <a href="">
                            <img src="img/icons8-whatsapp 1.svg" alt="">
                        </a>
                    </div>
                </div>
                <div class="footer-block-three">
                    <a href="#direction-link">Курсы</a>
                    <a href="#Master-link">Мастер классы</a>
                    <a href="#Photo-link">Фото</a>
                    <a href="#About-link">О нас</a>
                    <a href="#Reviews-link">Отзывы</a>
                    <a href="#Contacts-link">Контакты</a>
                </div>
                <div class="footer-block-four">
                    <a>
                        +79671651255
                    </a>
                    <a>
                        Г Подольск микрорайон Ново-Сырово улица Быковская дом 8
                    </a>
                    <a>
                        Email@gmail.com
                    </a>
                    <button class="CallUs">Остались вопросы?</button>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="js/ScrollLink.js"></script>
    <script src="js/QuickForm.js"></script>
    <script src="js/RegAuth.js"></script>
    <script src="js/CM.js"></script>
    <script src="js/Slider.js"></script>
    <script src="js/Generate_image.js"></script>
    <script src="js/Generate_reviews.js"></script>
    <script src="js/FAQ.js"></script>
    <script src="js/CallMe.js"></script>
    <script src="js/LigthBox.js"></script>

</body>

</html>