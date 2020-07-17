<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Vkonnektu
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div id="page" class="site">

        <header id="masthead" class="site-header">
            <div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky">
                <nav class="uk-navbar-container">
                    <div class="uk-container">
                        <div uk-navbar class="uk-navbar">

                            <div class="uk-navbar-left">
                                <ul class="uk-navbar-nav">
                                    <li>
                                        <a class="logo-a" href="/">
                                            <img src="/wp-content/themes/vkonnektu/img/logo.png" alt="VKonnektU"
                                                class="logo">
                                        </a>
                                    </li>
                                    <li class="hide-nav">
                                        <a href="" class="menu-catalog-a">Каталог</a>
                                        <div id="catalog" class="uk-navbar-dropdown">

                                            <div class="uk-margin-medium-top">
                                                <ul class="uk-flex-center nav-categories"
                                                    uk-tab="animation: uk-animation-fade">
                                                    <li class="uk-active"><a href="#">Управление</a></li>
                                                    <li><a href="#">Наблюдение</a></li>
                                                    <li><a href="#">Освещение и автоматика</a></li>
                                                    <li><a href="#">Датчики</a></li>
                                                </ul>


                                                <ul class="uk-switcher nav-switcher">
                                                    <div uk-grid class="uk-flex uk-flex-center">
                                                        <a href="/product/smart-hub-sh800/">
                                                            <div class="nav-item uk-transition-toggle" tabindex="0">
                                                                <img class="uk-transition-scale-up uk-transition-opaque"
                                                                    src="/wp-content/themes/vkonnektu/img/hub_nav.jpg"
                                                                    alt="Smart Hub">
                                                                <h5>Центр управления <br> Smart Hub SH800</h5>
                                                            </div>
                                                        </a>
                                                        <a href="/product/ir-transmitter-si800/">
                                                            <div class="nav-item uk-transition-toggle" tabindex="0">
                                                                <img class="uk-transition-scale-up uk-transition-opaque"
                                                                    src="/wp-content/themes/vkonnektu/img/ir_nav.jpg"
                                                                    alt="IR Transmitter">
                                                                <h5>Модуль управления <br> по инфракрасному каналу SI800
                                                                </h5>
                                                            </div>
                                                        </a>
                                                    </div>

                                                    <div uk-grid class="uk-flex uk-flex-center">
                                                        <a href="/product/outdoor-cam-vku-g14/">
                                                            <div class="nav-item uk-transition-toggle" tabindex="0">
                                                                <img class="uk-transition-scale-up uk-transition-opaque"
                                                                    src="/wp-content/themes/vkonnektu/img/g14_nav.jpg"
                                                                    alt="G14 Camera">
                                                                <h5>Уличная 2Мп IP видеокамера <br> VKU-G14</h5>
                                                            </div>
                                                        </a>
                                                        <a href="/product/indoor-cam-with-auto-tracking-g7mini/">
                                                            <div class="nav-item uk-transition-toggle" tabindex="0">
                                                                <img class="uk-transition-scale-up uk-transition-opaque"
                                                                    src="/wp-content/themes/vkonnektu/img/g7_nav.jpg"
                                                                    alt="G7 Camera">
                                                                <h5>Комнатная 2Мп IP видеокамера <br> с автослежением
                                                                    VKU-G7mini</h5>
                                                            </div>
                                                        </a>
                                                    </div>

                                                    <div uk-grid class="uk-flex uk-flex-center">
                                                        <a href="/product/smart-plug-sp800/">
                                                            <div class="nav-item uk-transition-toggle" tabindex="0">
                                                                <img class="uk-transition-scale-up uk-transition-opaque"
                                                                    src="/wp-content/themes/vkonnektu/img/plug_nav.jpg"
                                                                    alt="Smart Plug">
                                                                <h5>Умная розетка SP800</h5>
                                                            </div>
                                                        </a>
                                                        <a href="/product/single-relay-sr800/">
                                                            <div class="nav-item uk-transition-toggle" tabindex="0">
                                                                <img class="uk-transition-scale-up uk-transition-opaque"
                                                                    src="/wp-content/themes/vkonnektu/img/relay_s_nav.jpg"
                                                                    alt="Single Relay">
                                                                <h5>Одноканальное реле SR800</h5>
                                                            </div>
                                                        </a>
                                                        <a href="/product/two-channel-dimmer-module-sl800/">
                                                            <div class="nav-item uk-transition-toggle" tabindex="0">
                                                                <img class="uk-transition-scale-up uk-transition-opaque"
                                                                    src="/wp-content/themes/vkonnektu/img/relay_d_nav.jpg"
                                                                    alt="Two channel Dimmer Module">
                                                                <h5>Двухканальный модуль <br> управления освещением
                                                                    SL800</h5>
                                                            </div>
                                                        </a>
                                                    </div>

                                                    <div class="sensors uk-flex uk-flex-center uk-child-width-1-2@s uk-child-width-1-4@m"
                                                        uk-grid>
                                                        <a href="/product/multisensor-sm800/">
                                                            <div class="nav-item uk-transition-toggle" tabindex="0">
                                                                <img class="uk-transition-scale-up uk-transition-opaque"
                                                                    src="/wp-content/themes/vkonnektu/img/msensor_nav.jpg"
                                                                    alt="Multisensor">
                                                                <h5>Многофункциональный датчик SM800</h5>
                                                            </div>
                                                        </a>
                                                        <a href="/product/water-leakage-sensor-sw800/">
                                                            <div class="nav-item uk-transition-toggle" tabindex="0">
                                                                <img class="uk-transition-scale-up uk-transition-opaque"
                                                                    src="/wp-content/themes/vkonnektu/img/lsensor_nav.jpg"
                                                                    alt="Water Leakage Sensor">
                                                                <h5>Датчик протечки <br> SW800</h5>
                                                            </div>
                                                        </a>
                                                        <a href="/product/door-sensor-sd800/">
                                                            <div class="nav-item uk-transition-toggle" tabindex="0">
                                                                <img class="uk-transition-scale-up uk-transition-opaque"
                                                                    src="/wp-content/themes/vkonnektu/img/dsensor_nav.jpg"
                                                                    alt="Door Sensor">
                                                                <h5>Дверной датчик <br> SD800</h5>
                                                            </div>
                                                        </a>
                                                        <a href="/product/smoke-sensor-ss800/">
                                                            <div class="nav-item uk-transition-toggle" tabindex="0">
                                                                <img class="uk-transition-scale-up uk-transition-opaque"
                                                                    src="/wp-content/themes/vkonnektu/img/ssensor_nav.jpg"
                                                                    alt="Smoke Sensor">
                                                                <h5>Датчик дыма <br> SS800</h5>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </ul>



                                            </div>

                                        </div>
                                    </li>
                                    <!-- <li class="hide-nav"><a href="#">Приложение</a></li> -->
                                    <li class="hide-nav"><a href="/integration">Интеграция</a></li>
                                    <li class="hide-nav"><a href="/premium">Премиум</a></li>
                                    <li class="hide-nav"><a href="/about">О нас</a></li>
                                </ul>
                            </div>

                            <div class="uk-navbar-right">
                                <ul class="uk-navbar-nav">
                                    <!-- <li class="hide-nav"><a href="#">RU | EN</a></li> -->
                                    <li>
                                        <!-- Cart start
									!!You should edit this element here and in functions.php!! -->
                                        <?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

										$count = WC()->cart->cart_contents_count;
										?>
                                        <a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>"
                                            title="<?php _e( 'Просмотр корзины' ); ?>">
                                            <img src="/wp-content/themes/vkonnektu/img/new/cart.svg" alt="Cart">
                                            <span class="cart-count">
                                                <?php 
													if ( $count > 0 ) {
														?>
                                                <span
                                                    class="cart-contents-count"><?php echo esc_html( $count ); ?></span>
                                                <?php
													}
												?>
                                            </span>
                                        </a>
                                        <?php } ?>
                                        <!-- Cart end -->
                                    </li>
                                </ul>
                            </div>

                            <div class="ham-div">
                                <span id="ham-nav" uk-icon="icon: table; ratio: 1.3"
                                    uk-toggle="target: #offcanvas-nav"></span>
                                <span id="close-nav" class="uk-hidden" uk-icon="icon: close; ratio: 1.3"
                                    uk-toggle="target: #offcanvas-nav"></span>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>


            <!-- Mobile nav -->
            <div id="offcanvas-nav" uk-offcanvas="mode:none" class="uk-animation-fade">
                <div class="uk-offcanvas-bar">

                    <ul class="uk-nav-default uk-nav-parent-icon" uk-nav>

                        <li><a href="#">Главная</a></li>
                        <li class="uk-parent">
                            <a href="#">Каталог <img class="cat-chevron-left"
                                    src="/wp-content/themes/vkonnektu/img/chevron-left.svg" alt=""> </a>

                            <ul class="uk-nav-sub uk-nav-parent-icon" uk-nav>

                                <li class="uk-parent">
                                    <a href="#">Управление <img class="cat-chevron-left"
                                            src="/wp-content/themes/vkonnektu/img/chevron-left.svg" alt=""> </a>
                                    <ul class="uk-nav-sub">
                                        <li>
                                            <a href="/product/smart-hub-sh800/">
                                                <div class="uk-flex uk-flex-middle">
                                                    <img class="uk-transition-scale-up uk-transition-opaque"
                                                        src="/wp-content/themes/vkonnektu/img/hub_nav.jpg"
                                                        alt="Smart Hub">
                                                    <span>Центр управления Smart Hub SH800</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/product/ir-transmitter-si800/">
                                                <div class="uk-flex uk-flex-middle">
                                                    <img class="uk-transition-scale-up uk-transition-opaque"
                                                        src="/wp-content/themes/vkonnektu/img/ir_nav.jpg"
                                                        alt="IR Transmitter">
                                                    <span>Модуль управления по инфракрасному каналу SI800</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="uk-parent">
                                    <a href="#">Наблюдение <img class="cat-chevron-left"
                                            src="/wp-content/themes/vkonnektu/img/chevron-left.svg" alt=""> </a>
                                    <ul class="uk-nav-sub">
                                        <li>
                                            <a href="/product/outdoor-cam-vku-g14/">
                                                <div class="uk-flex uk-flex-middle">
                                                    <img class="uk-transition-scale-up uk-transition-opaque"
                                                        src="/wp-content/themes/vkonnektu/img/g14_nav.jpg"
                                                        alt="G14 Camera">
                                                    <span>Уличная 2Мп IP видеокамера VKU-G14</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/product/indoor-cam-with-auto-tracking-g7mini/">
                                                <div class="uk-flex uk-flex-middle">
                                                    <img class="uk-transition-scale-up uk-transition-opaque"
                                                        src="/wp-content/themes/vkonnektu/img/g7_nav.jpg"
                                                        alt="G7 Camera">
                                                    <span>Комнатная 2Мп IP видеокамера с автослежением VKU-G7mini</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="uk-parent">
                                    <a href="#">Освещение и автоматика <img class="cat-chevron-left"
                                            src="/wp-content/themes/vkonnektu/img/chevron-left.svg" alt=""> </a>
                                    <ul class="uk-nav-sub">
                                        <li>
                                            <a href="/product/smart-plug-sp800/">
                                                <div class="uk-flex uk-flex-middle">
                                                    <img class="uk-transition-scale-up uk-transition-opaque"
                                                        src="/wp-content/themes/vkonnektu/img/plug_nav.jpg"
                                                        alt="Smart Plug">
                                                    <span>Умная розетка SP800</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/product/single-relay-sr800/">
                                                <div class="uk-flex uk-flex-middle">
                                                    <img class="uk-transition-scale-up uk-transition-opaque"
                                                        src="/wp-content/themes/vkonnektu/img/relay_s_nav.jpg"
                                                        alt="Single Relay">
                                                    <span>Одноканальное реле SR800</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/product/two-channel-dimmer-module-sl800/">
                                                <div class="uk-flex uk-flex-middle">
                                                    <img class="uk-transition-scale-up uk-transition-opaque"
                                                        src="/wp-content/themes/vkonnektu/img/relay_d_nav.jpg"
                                                        alt="Two channel Dimmer Module">
                                                    <span>Двухканальный модуль управления освещением SL800</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="uk-parent">
                                    <a href="#">Датчики <img class="cat-chevron-left"
                                            src="/wp-content/themes/vkonnektu/img/chevron-left.svg" alt=""> </a>
                                    <ul class="uk-nav-sub">
                                        <li>
                                            <a href="/product/multisensor-sm800/">
                                                <div class="uk-flex uk-flex-middle">
                                                    <img class="uk-transition-scale-up uk-transition-opaque"
                                                        src="/wp-content/themes/vkonnektu/img/msensor_nav.jpg"
                                                        alt="Multisensor">
                                                    <span>Многофункциональный датчик SM800</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/product/water-leakage-sensor-sw800/">
                                                <div class="uk-flex uk-flex-middle">
                                                    <img class="uk-transition-scale-up uk-transition-opaque"
                                                        src="/wp-content/themes/vkonnektu/img/lsensor_nav.jpg"
                                                        alt="Water Leakage Sensor">
                                                    <span>Датчик протечки SW800</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/product/door-sensor-sd800/">
                                                <div class="uk-flex uk-flex-middle">
                                                    <img class="uk-transition-scale-up uk-transition-opaque"
                                                        src="/wp-content/themes/vkonnektu/img/dsensor_nav.jpg"
                                                        alt="Door Sensor">
                                                    <span>Дверной датчик SD800</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/product/smoke-sensor-ss800/">
                                                <div class="uk-flex uk-flex-middle">
                                                    <img class="uk-transition-scale-up uk-transition-opaque"
                                                        src="/wp-content/themes/vkonnektu/img/ssensor_nav.jpg"
                                                        alt="Smoke Sensor">
                                                    <span>Датчик дыма SS800</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>

                        </li>
                        <!-- <li><a href="#">Приложение</a></li> -->
                        <li><a href="/integration">Интеграция</a></li>
                        <li><a href="/premium">Премиум</a></li>
                        <li><a href="/about">О нас</a></li>
                        <!-- <li><a href="#">RU | EN</a></li> -->
                    </ul>

                </div>
            </div>
            <!-- Mobile nav -->

        </header><!-- #masthead -->

        <div id="content" class="site-content">