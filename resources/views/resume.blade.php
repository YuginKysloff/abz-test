@extends('layouts.app')

@section('head')
    @parent
    <link rel="stylesheet" href="{{ url('/css/resume.css') }}">
@endsection

@section('content')
    <div class="container theme-showcase" role="main">
        <div class="resume">
            <p class="resume__body">
            <p class="resume__title">Киселев Юрий Викторович</p>
            <p>Мужчина, 40 лет, родился
                <text>4</text>
                <text>января</text>
                <text>1977</text>
            </p>
            <br>
            <p>+380 (99) 7268566</p>
            <p>yuriy.kyselov@gmail.com<span class="info"> — предпочитаемый способ связи</span></p>
            <p>Skype: t0p01m</p><br>
            <p>Проживает: Донецк (Украина)</p>
            <p>Гражданство: Украина, есть разрешение на работу: Россия, Украина</p>
            <p>Готов к переезду: Москва, Санкт-Петербург, Киев, Днепр (Днепропетровск), Харьков, готов к
                командировкам</p>
            <p class="resume__block">Желаемая должность</p>
            <p class="resume__position">PHP-разработчик</p>
            <p>Информационные технологии, интернет, телеком</p>
            <ul>
                <li class="resume-specialization">Программирование, Разработка</li>
            </ul>
            <br>
            <p>
            <p>Занятость: полная занятость, частичная занятость</p>
            <p>График работы: полный день, сменный график, гибкий график, удаленная работа</p></p><p>Желательное время в
                пути до работы: не имеет значения</p>
            <p class="resume__block">Опыт работы — 9 лет 10 месяцев</p>
            <ul>
                <li class="resume-experience"><span class="resume-experience__company">BSPro</span>
                    <p class="info">Донецк (Украина), mozart.studio/</p>
                    <p class="bloko-form-hint">Июнь 2016 — Март 2017 10 месяцев</p>
                    <p class="resume-experience__position">PHP-разработчик</p>
                    <p>
                        <description>Разработка экономических игр (PHP, Laravel, MySQL, JQuery, AJAX, Git)</description>
                    </p>
                </li>
                <li class="resume-experience"><span class="resume-experience__company">Freelancer</span>
                    <p class="info">Иваново (Ивановская область), </p>
                    <p class="bloko-form-hint">Январь 2016 — Июнь 2016 6 месяцев</p>
                    <p class="resume-experience__position">Веб-разработчик</p>
                    <p>
                        <description>Разработка дизайна. Изготовление макета в Adobe Photoshop. Верстка HTML5, CSS3,
                            Bootstrap. Программирование PHP CodeIgniter, MySQL, JQuery.
                        </description>
                    </p>
                </li>
                <li class="resume-experience"><span class="resume-experience__company">Инвольта</span>
                    <p class="info">Иваново (Ивановская область), involta.ru/</p>
                    <p class="bloko-form-hint">Август 2015 — Декабрь 2015 5 месяцев</p>
                    <p class="resume-experience__position">PHP-разработчик</p>
                    <p>
                        <description>Полный цикл разработки веб-сайтов от дизайна до программирования движка и SEO
                            оптимизации с помощью PHP, MySQL, JQuery и Codeigniter, Bootstrap frameworks.
                        </description>
                    </p>
                </li>
                <li class="resume-experience"><span class="resume-experience__company">Компания SystemGroup</span>
                    <p class="info">Киев, systemgroup.com.ua</p>
                    <p class="bloko-form-hint">Август 2006 — Сентябрь 2014 8 лет 2 месяца</p>
                    <p class="resume-experience__position">Представитель сервиса в регионе</p>
                    <p>
                        <description>Продвижение продукции SystemGroup, организация ее продаж, инсталляций и сервисного
                            обслуживания.<br>- под моим руководством осуществлены продажи и инсталляции различных
                            решений в сфере автоматизации в супермаркетах:<br> - «METRO C&amp;C»; «Ашан»; «Практикер»;
                            «Цетробувь»; «Кари»; «Буквоед»; «Эпицентр» в разных городах страны;<br>- продажи и
                            инсталляции средств автоматизации в ресторанах и кафе;<br>- организация сервисного
                            обслуживания банкоматов и другого банковского оборудования.
                        </description>
                    </p>
                </li>
            </ul>
            <p class="resume__block">Образование</p>
            <ul>
                <li>Высшее</li>
                <li class="resume-education"><span class="resume-education__name">Донецкий национальный технический университет, Донецк (Украина)</span>
                    <p class="bloko-form-hint">1999</p></li>
                <p>Вычислительная техника, системы и сети, Специалист</p></ul>
            <p class="resume__block">Повышение квалификации, курсы</p>
            <ul>
                <li class="resume-education"><span class="resume-education__name">Основы Web UI разработки</span>
                    <p class="bloko-form-hint">2016</p></li>
                <p>Lviv IT School, Сертификат</p>
                <li class="resume-education"><span
                            class="resume-education__name">DEV203x Introduction to Bootstrap</span>
                    <p class="bloko-form-hint">2016</p></li>
                <p>Microsoft, Сертификат</p>
                <li class="resume-education"><span
                            class="resume-education__name">Создание веб-сайтов. Веб дизайн.</span>
                    <p class="bloko-form-hint">2015</p></li>
                <p>Учебный центр Интер, Сертификат</p>
                <li class="resume-education"><span class="resume-education__name">Learn HTML5 from W3C</span>
                    <p class="bloko-form-hint">2015</p></li>
                <p>W3C, Сертификат</p>
                <li class="resume-education"><span class="resume-education__name">Основной курс американского английского языка</span>
                    <p class="bloko-form-hint">2012</p></li>
                <p>American English Center, Сертификат</p></ul>
            <p class="resume__block">Ключевые навыки</p>
            <ul>
                <li class="resume-skils"><span class="bloko-form-hint">Знание языков</span>
                    <ul class="resume-skils__item">
                        <li>Русский<span class="info"> — родной</span></li>
                        <li>Английский<span class="info"> — могу проходить интервью</span></li>
                    </ul>
                </li>
            </ul>
            <p class="resume__block">Дополнительная информация</p>
            <ul>
                <li class="resume-skils"><span class="bloko-form-hint">Обо мне</span>
                    <p class="resume-skils__item">
                        <string>Энергичность, коммуникабельность, ответственность. Постоянно занимаюсь
                            самосовершенствованием и самообразованием.
                        </string>
                    </p>
                </li>
            </ul>
            </p>
        </div>
        <hr>
    </div>
@endsection