<?php

/**
 * 加载主题样式和脚本
 */
function geek_theme_scripts() {
    // 确保常量已定义
    if ( ! defined( 'GEEK_THEME_ASSETS_URI' ) ) {
        define( 'GEEK_THEME_ASSETS_URI', get_template_directory_uri() . '/assets' );
    }
    
    // 从HTML模板加载jQuery
    wp_enqueue_script('jquery', GEEK_THEME_ASSETS_URI . '/vendor/jquery/jquery.min.js', array(), '3.6.0', true);

    // 从HTML模板加载Bootstrap CSS
    wp_enqueue_style('bootstrap-css', GEEK_THEME_ASSETS_URI . '/vendor/bootstrap/css/bootstrap.min.css', array(), '5.3.8');

    // 从HTML模板加载Fontawesome Icon CSS
    // wp_enqueue_style('fontawesome-css', get_template_directory_uri() . '/assets/vendor/fontawesome/css/all.min.css', array(), '6.0.0');
    // 改用Font Awesome Pro 5.13.0
    wp_enqueue_style('fontawesome-pro-css', GEEK_THEME_ASSETS_URI . '/css/fontawesome.min.css', array(), '5.13.0');
    
    // 加载Bootstrap Icons CSS
    wp_enqueue_style('bootstrap-icons-css', GEEK_THEME_ASSETS_URI . '/vendor/bootstrap-icons/bootstrap-icons.min.css', array(), '1.11.3');

    // 从HTML模板加载Magnific Popup CSS
    wp_enqueue_style('magnific-popup-css', GEEK_THEME_ASSETS_URI . '/vendor/magnific-popup/css/magnific-popup.min.css', array(), '1.1.0');

    // 从HTML模板加载Slick Slider CSS
    wp_enqueue_style('slick-slider-css', GEEK_THEME_ASSETS_URI . '/vendor/slick-slider/css/slick.min.css', array(), '1.8.1');

    // 加载Animate.css动画库
    wp_enqueue_style('animate-css', GEEK_THEME_ASSETS_URI . '/vendor/animate.css/animate.min.css', array(), '4.1.1');

    // 从HTML模板加载主题自定义CSS
    wp_enqueue_style(
        'geek-main-style',
        GEEK_THEME_ASSETS_URI . '/css/main.min.css',
        array('bootstrap-css'),
        '1.0.0',
        'all'
    );

    // 从HTML模板加载Slick Slider JS
    wp_enqueue_script('slick-slider-js', GEEK_THEME_ASSETS_URI . '/vendor/slick-slider/js/slick.min.js', array('jquery'), '1.8.1', true);

    // 从HTML模板加载Bootstrap JS
    wp_enqueue_script('bootstrap-js', GEEK_THEME_ASSETS_URI . '/vendor/bootstrap/js/bootstrap.bundle.min.js', array('jquery'), '5.3.8', true);

    // 从HTML模板加载Magnific Popup JS
    wp_enqueue_script('magnific-popup-js', GEEK_THEME_ASSETS_URI . '/vendor/magnific-popup/js/jquery.magnific-popup.min.js', array('jquery'), '1.1.0', true);

    // 从HTML模板加载Isotope Filter JS
    wp_enqueue_script('imagesloaded-js', GEEK_THEME_ASSETS_URI . '/vendor/imagesloaded/js/imagesloaded.pkgd.min.js', array('jquery'), '4.1.4', true);
    wp_enqueue_script('isotope-js', GEEK_THEME_ASSETS_URI . '/vendor/isotope/js/isotope.pkgd.min.js', array('jquery'), '3.0.6', true);

    // 从HTML模板加载Custom Carousel JS
    wp_enqueue_script('custom-carousel-js', GEEK_THEME_ASSETS_URI . '/vendor/custom-carousel/js/vscustom-carousel.min.js', array('jquery'), '1.0.0', true);

    // 从HTML模板加载Form JS
    wp_enqueue_script('form-js', GEEK_THEME_ASSETS_URI . '/js/ajax-mail.js', array('jquery'), '1.0.0', true);

    // 从HTML模板加载Main JS File
    wp_enqueue_script('geek-main-script', GEEK_THEME_ASSETS_URI . '/js/main.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'geek_theme_scripts');


