<?php
/**
* Template Name: Main Page Template
*
* @package Vkonnektu
 */

get_header();
?>

<div class="main-page">

    <div class="first-section">
        <div class="slides">
            <div class="slide slide-active">
                <img src="/wp-content/themes/vkonnektu/img/house.jpg" alt="">
                <img id="door" src="/wp-content/themes/vkonnektu/img/door_sensor.svg"
                    data-tippy-content="Дверной датчик SD800 обеспечивает сигнализацию об открытии/закрытии двери, окна или форточки с контролем повышенной вибрации (стук, попытка взлома)">
                <img id="lights" src="/wp-content/themes/vkonnektu/img/lights.svg"
                    data-tippy-content="Управляйте освещением с помощью модулей SL800 или SR800">
                <img id="webcam" src="/wp-content/themes/vkonnektu/img/webcam.svg" data-tippy-placement="left-start"
                    data-tippy-content="Уличная 2Мп IP видеокамера VKU-G14 обеспечит безопасность Вашего дома. Камера имеет датчик движения, который при срабатывании отправляет тревогу пользователю в приложение и фотоснимок события на e-mail">
                <img id="relay" src="/wp-content/themes/vkonnektu/img/single_relay.svg" data-tippy-placement="top"
                    data-tippy-content="Одноканальное реле SR800 отвечает за автоматичекое и дистанционное управление гаражными воротами">
            </div>
            <div class="slide">
                <img src="/wp-content/themes/vkonnektu/img/kitchen.jpg" data-tippy-content="">
                <img id="smoke" src="/wp-content/themes/vkonnektu/img/smoke.svg" data-tippy-placement="bottom"
                    data-tippy-content="Датчик дыма SS800 сигнализирует о задымленности помещений, предупреждая звуковыми сигналами об опасности пожара и отравления угарными газами, присылает уведомления в приложении и запускает пользовательсике сценарии">
                <img id="plug" src="/wp-content/themes/vkonnektu/img/plug.svg"
                    data-tippy-content="Умная розетка SP800 позволяет управлять любыми потребителями с заявленной мощностью потребления до 2.5 кВ">
                <img id="hub" src="/wp-content/themes/vkonnektu/img/hub.svg" data-tippy-placement="left-start"
                    data-tippy-content="Центр управления Smart Hub SH800 производит коммутацию и управление всеми устройствами и датчиками умного дома экосистемы VKU по протоколу ZigBee">
                <img id="multisensor" src="/wp-content/themes/vkonnektu/img/multisensor.svg"
                    data-tippy-placement="bottom"
                    data-tippy-content="Многофункциональный датчик SM800 сочетает в себе датчик температуры и влажности окружающего воздуха, датчик освещенности и датчик движения. Оснащен датчиком демонтажа для оповещения о несанкционированном снятии устройства с крепления">
            </div>
            <div class="slide">
                <img src="/wp-content/themes/vkonnektu/img/yard.jpg" data-tippy-content="">
                <img id="water" src="/wp-content/themes/vkonnektu/img/water.svg" data-tippy-placement="top"
                    data-tippy-content="Автоматизируйте полив участка с помощью реле SR800 или умных розеток SP800">
                <img id="webcam-2" src="/wp-content/themes/vkonnektu/img/webcam.svg" data-tippy-placement="bottom"
                    data-tippy-content="Видеокамера VKU-G14 обеспечивает безопасность Вашей придомовой территории, имеет ночной режим работы, угол обзора 100°, детектор движения и разрешение Full HD 1080р">
                <img id="lights-2" src="/wp-content/themes/vkonnektu/img/lights.svg"
                    data-tippy-content="Управляйте освещением с помощью модулей SL800 или SR800">
            </div>
        </div>
        <div class="slider-pagination">
            <span class="bullet bullet-active"></span>
            <span class="bullet"></span>
            <span class="bullet"></span>
        </div>
        <div class="first-slide-text">
            <h1>Умный дом с VKU</h1>
            <p>позволит с комфортом управлять домашней техникой, создавать уют и обеспечивать безопасность своих родных
                и близких</p>
        </div>
    </div>

    <div class="second-section">
        <h1>Экосистема VKU</h1>
        <div class="ecosystem">
            <div class="eco-description">
                <img src="/wp-content/themes/vkonnektu/img/leakage.svg" alt="">
                <p>Останавливает потоп</p>
            </div>
            <div class="eco-description">
                <img src="/wp-content/themes/vkonnektu/img/fire.svg" alt="">
                <p>Предотвращает пожар</p>
            </div>
            <div class="eco-description">
                <img src="/wp-content/themes/vkonnektu/img/video.svg" alt="">
                <p>Наблюдает за домом</p>
            </div>
            <div class="eco-description">
                <img src="/wp-content/themes/vkonnektu/img/plug-2.svg" alt="">
                <p>Контролирует приборы</p>
            </div>
        </div>
        <img id="eco-hub" src="/wp-content/themes/vkonnektu/img/eco-hub.png" alt="">
    </div>

    <div class="third-section">
        <div class="hub-description">
            <h1>Центр управления - сердце умного дома</h1>
            <p>Центр управления производит коммутацию и управление всеми устройствами и датчиками умного дома экосистемы
                VKU по протоколу ZigBee</p>
        </div>
        <img id="hub-devices" src="/wp-content/themes/vkonnektu/img/hub-devices.png" alt="">
    </div>

    <div class="fourth-section">
        <h1>Всегда стабильная сеть ZigBee</h1>
        <div uk-grid>
            <div class="uk-width-1-2">
                <img id="zb-img" src="/wp-content/themes/vkonnektu/img/wifi-range.jpg" alt="">
            </div>
            <div class="uk-width-1-2 zb-desc">
                <p> Устройства VKU образуют между собой сеть ZigBee, в которой умные розетки, реле, датчики дыма и
                    модули управления по ИК являются усилителями сигнала и увеличивают диапазон действия устройств. Сеть
                    ZigBee использует специальные алгоритмы, обеспечивающие бесперебойную связь между устройствами и
                    центром управления. </p>
                <div class="zb-switch">
                    <div id="zb-wifi" class="zb-active">
                        WiFi
                    </div>
                    <div id="zb-zigbee">
                        ZigBee
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="fifth-section">
        <h1>Управление домом через приложение VKU</h1>
        <div uk-grid>
            <div class="uk-width-1-2">
                <div class="app-download">
                    <img src="/wp-content/themes/vkonnektu/img/gplay.svg" alt="">
                    <img src="/wp-content/themes/vkonnektu/img/appstore.svg" alt="">
                </div>
                <div class="app-desc">

                    <ul id="app-switcher" class="uk-switcher uk-margin">
                        <li>Управляйте умным домом VKU даже за тысячи километров от дома</li>
                        <li>Просматривайте статусы датчиков и дистанционно включайте оборудование</li>
                        <li>Настраивайте сценарии взаимодействия устройств</li>
                    </ul>

                    <div id="app-bullets"
                        uk-switcher="animation: uk-animation-slide-top-small; toggle: > *; connect:#app-switcher">
                        <a href=""></a>
                        <a href=""></a>
                        <a href=""></a>
                    </div>

                </div>
                <img id="img-alice" src="/wp-content/themes/vkonnektu/img/alice.jpg" alt="">
            </div>
            <div class="uk-width-1-2 app-phone-div">
                <div class="app-screens">
                    <img class="app-screen" src="/wp-content/themes/vkonnektu/img/screen-1.jpg" alt="">
                    <img class="app-screen uk-hidden" src="/wp-content/themes/vkonnektu/img/screen-2.jpg" alt="">
                    <img class="app-screen uk-hidden" src="/wp-content/themes/vkonnektu/img/screen-3.jpg" alt="">
                    <img id="app-phone" src="/wp-content/themes/vkonnektu/img/phone-frame.png" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="sixth-section">
        <h1>Ваши возможности с VKU</h1>
        <div uk-grid>
            <div class="uk-width-2-5">
                <div class="st-description">
                    <h1>Управление</h1>
                    <p>Безграничное количество настраиваемых сценариев по управлению устройствами</p>
                </div>
            </div>
            <div class="st-slides uk-width-3-5">
                <div class="st-slide">
                    <div uk-grid>
                        <div class="uk-width-1-2">
                            <div class="st-desc">
                                <h1>Климат</h1>
                                <p>Задайте температуру или уровень влажности, при которой сработает
                                    многофункциональный
                                    датчик и запустит сценарии по включению увлажнителя, осушителя, кондиционера
                                </p>
                            </div>
                        </div>
                        <div class="uk-width-1-2 st-img">
                            <div class="st-image"
                                style="background-image: url(/wp-content/themes/vkonnektu/img/main/psb/humidifier.jpg); background-position: 17%;">
                                <img src="/wp-content/themes/vkonnektu/img/main/psb/temp.svg">
                            </div>
                        </div>
                    </div>
                    <div class="st-combo">
                        <div class="st-combo-item">
                            <img src="/wp-content/themes/vkonnektu/img/main/psb/multis.jpg" alt="">
                            <p>Многофункциональный датчик</p>
                        </div>
                        <span>+</span>
                        <div class="st-combo-item">
                            <img src="/wp-content/themes/vkonnektu/img/main/psb/plug.jpg" alt="">
                            <p>Умная розетка</p>
                        </div>
                    </div>
                </div>

                <div class="st-slide">
                    <div uk-grid>
                        <div class="uk-width-1-2">
                            <div class="st-desc">
                                <h1>Мультимедиа</h1>
                                <p>Запускайте сценарии по одновременному включению акустики, телевизора, мультимедийных
                                    устройств и выключению света</p>
                            </div>
                        </div>
                        <div class="uk-width-1-2 st-img">
                            <div class="st-image"
                                style="background-image: url(/wp-content/themes/vkonnektu/img/main/psb/multimedia.jpg); background-position: 65% 39%; background-size: 149%;">
                                <img src="/wp-content/themes/vkonnektu/img/main/psb/multimedia.svg">
                            </div>
                        </div>
                    </div>
                    <div class="st-combo">
                        <div class="st-combo-item">
                            <img src="/wp-content/themes/vkonnektu/img/main/psb/plug.jpg" alt="">
                            <p>Умная розетка</p>
                        </div>
                        <span>+</span>
                        <div class="st-combo-item">
                            <img src="/wp-content/themes/vkonnektu/img/main/psb/ir.jpg" alt="">
                            <p>Модуль управления по ИК</p>
                        </div>
                        <span>+</span>
                        <div class="st-combo-item">
                            <img src="/wp-content/themes/vkonnektu/img/main/psb/relay.jpg" alt="">
                            <p>Модуль управления освещением</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>





        <div uk-grid>
            <div class="uk-width-2-5">
                <div class="st-description">
                    <h1>Освещение</h1>
                    <p>Управляйте освещением в одно нажатие через приложение или с помощью голосового помощника</p>
                </div>
            </div>
            <div class="st-slides uk-width-3-5">
                <div class="st-slide">
                    <div uk-grid>
                        <div class="uk-width-1-2">
                            <div class="st-desc">
                                <h1>Дома</h1>
                                <p>Управляйте освещением в одно нажатие через приложение или с помощью голосового помощника</p>
                            </div>
                        </div>
                        <div class="uk-width-1-2 st-img">
                            <div class="st-image"
                                style="background-image: url(/wp-content/themes/vkonnektu/img/main/psb/home.jpg);">
                                <img src="/wp-content/themes/vkonnektu/img/main/psb/light.svg">
                            </div>
                        </div>
                    </div>
                    <div class="st-combo">
                        <div class="st-combo-item">
                            <img src="/wp-content/themes/vkonnektu/img/main/psb/alice.jpg" alt="">
                            <p>Голосовой помощник</p>
                        </div>
                        <span>+</span>
                        <div class="st-combo-item">
                            <img src="/wp-content/themes/vkonnektu/img/main/psb/relay.jpg" alt="">
                            <p>Модуль управления освещением</p>
                        </div>
                    </div>
                </div>

                <div class="st-slide">
                    <div uk-grid>
                        <div class="uk-width-1-2">
                            <div class="st-desc">
                                <h1>В офисе</h1>
                                <p>Датчик освещенности запускает сценарии по включению освещения в тех или иных помещениях в определенное время суток</p>
                            </div>
                        </div>
                        <div class="uk-width-1-2 st-img">
                            <div class="st-image"
                                style="background-image: url(/wp-content/themes/vkonnektu/img/main/psb/office.jpg); background-position: 14% 52%; background-size: 180%;">
                                <img src="/wp-content/themes/vkonnektu/img/main/psb/light2.svg">
                            </div>
                        </div>
                    </div>
                    <div class="st-combo">
                        <div class="st-combo-item">
                            <img src="/wp-content/themes/vkonnektu/img/main/psb/multis.jpg" alt="">
                            <p>Многофункциональный датчик</p>
                        </div>
                        <span>+</span>
                        <div class="st-combo-item">
                            <img src="/wp-content/themes/vkonnektu/img/main/psb/relay.jpg" alt="">
                            <p>Модуль управления освещением</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>



        <div uk-grid>
            <div class="uk-width-2-5">
                <div class="st-description">
                    <h1>Безопасность</h1>
                    <p>Обеспечьте безопасность своих родных и близких</p>
                </div>
            </div>
            <div class="st-slides uk-width-3-5">
                <div class="st-slide">
                    <div uk-grid>
                        <div class="uk-width-1-2">
                            <div class="st-desc">
                                <h1>Защита от взлома</h1>
                                <p>Датчик открытия двери и камера с автослежением оповестят Вас о нежеланных гостях, сохранят видео происшествия и запустят сценарии безопасности</p>
                            </div>
                        </div>
                        <div class="uk-width-1-2 st-img">
                            <div class="st-image"
                                style="background-image: url(/wp-content/themes/vkonnektu/img/main/psb/rob.jpg); background-position: 95%;">
                                <img src="/wp-content/themes/vkonnektu/img/main/psb/rob.svg">
                            </div>
                        </div>
                    </div>
                    <div class="st-combo">
                        <div class="st-combo-item">
                            <img src="/wp-content/themes/vkonnektu/img/main/psb/door.jpg" alt="">
                            <p>Датчик окрытия двери</p>
                        </div>
                        <span>+</span>
                        <div class="st-combo-item">
                            <img src="/wp-content/themes/vkonnektu/img/main/psb/g14.jpg" alt="">
                            <p>Камера G14 с автослежением</p>
                        </div>
                    </div>
                </div>

                <div class="st-slide">
                    <div uk-grid>
                        <div class="uk-width-1-2">
                            <div class="st-desc">
                                <h1>Защита от происшествий</h1>
                                <p>Датчики дыма и протечки воды оповестят Вас в нужный момент и защитят от непредвиденных ситуаций, а умные розетки отключат проблемные потребители при перегрузке </p>
                            </div>
                        </div>
                        <div class="uk-width-1-2 st-img">
                            <div class="st-image"
                                style="background-image: url(/wp-content/themes/vkonnektu/img/main/psb/kitchen.jpg); background-position: 53%;">
                                <img src="/wp-content/themes/vkonnektu/img/main/psb/safety.svg">
                            </div>
                        </div>
                    </div>
                    <div class="st-combo">
                        <div class="st-combo-item">
                            <img src="/wp-content/themes/vkonnektu/img/main/psb/smoke.jpg" alt="">
                            <p>Датчик дыма</p>
                        </div>
                        <span>+</span>
                        <div class="st-combo-item">
                            <img src="/wp-content/themes/vkonnektu/img/main/psb/leakage.jpg" alt="">
                            <p>Датчик протечки</p>
                        </div>
                        <span>+</span>
                        <div class="st-combo-item">
                            <img src="/wp-content/themes/vkonnektu/img/main/psb/plug.jpg" alt="">
                            <p>Умная розетка</p>
                        </div>
                    </div>
                </div>


            </div>
        </div>


        <!-- <div class="st-nav-wrapper">
            <div class="st-bottom-nav">
                <p>Управление</p>
                <p>Освещение</p>
                <p>Безопасность</p>
            </div>
        </div> -->
    </div>

</div>

<script src="/wp-content/themes/vkonnektu/js/popper.min.js"></script>
<script src="/wp-content/themes/vkonnektu/js/tippy.min.js"></script>
<script src="/wp-content/themes/vkonnektu/js/main.js"></script>

<?php
get_footer();