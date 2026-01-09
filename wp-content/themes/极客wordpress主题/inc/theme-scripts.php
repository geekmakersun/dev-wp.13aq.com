<?php

/**
 * 加载主题样式和脚本
 */
function geek_theme_scripts()
{
    // 从HTML模板加载jQuery
    wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/js/vendor/jquery-3.6.0.min.js', array(), '3.6.0', true);

    // 从HTML模板加载Bootstrap CSS
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '5.0.0');

    // 从HTML模板加载Fontawesome Icon CSS
    wp_enqueue_style('fontawesome-css', get_template_directory_uri() . '/assets/css/fontawesome.min.css', array(), '6.0.0');

    // 从HTML模板加载Layerslider CSS
    wp_enqueue_style('layerslider-css', get_template_directory_uri() . '/assets/css/layerslider.min.css', array(), '6.0.0');

    // 从HTML模板加载Magnific Popup CSS
    wp_enqueue_style('magnific-popup-css', get_template_directory_uri() . '/assets/css/magnific-popup.min.css', array(), '1.1.0');

    // 从HTML模板加载Slick Slider CSS
    wp_enqueue_style('slick-slider-css', get_template_directory_uri() . '/assets/css/slick.min.css', array(), '1.8.1');

    // 从HTML模板加载主题自定义CSS
    wp_enqueue_style(
        'geek-main-style',
        get_template_directory_uri() . '/assets/css/style.css',
        array('bootstrap-css'),
        '1.0.0',
        'all'
    );

    // 从HTML模板加载Slick Slider JS
    wp_enqueue_script('slick-slider-js', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), '1.8.1', true);

    // 从HTML模板加载Layerslider JS
    wp_enqueue_script('layerslider-utils-js', get_template_directory_uri() . '/assets/js/layerslider.utils.js', array('jquery'), '6.0.0', true);
    wp_enqueue_script('layerslider-transitions-js', get_template_directory_uri() . '/assets/js/layerslider.transitions.js', array('jquery'), '6.0.0', true);
    wp_enqueue_script('layerslider-main-js', get_template_directory_uri() . '/assets/js/layerslider.kreaturamedia.jquery.js', array('jquery'), '6.0.0', true);

    // 从HTML模板加载Bootstrap JS
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '5.0.0', true);

    // 从HTML模板加载Magnific Popup JS
    wp_enqueue_script('magnific-popup-js', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array('jquery'), '1.1.0', true);

    // 从HTML模板加载Isotope Filter JS
    wp_enqueue_script('imagesloaded-js', get_template_directory_uri() . '/assets/js/imagesloaded.pkgd.min.js', array('jquery'), '4.1.4', true);
    wp_enqueue_script('isotope-js', get_template_directory_uri() . '/assets/js/isotope.pkgd.min.js', array('jquery'), '3.0.6', true);

    // 从HTML模板加载Custom Carousel JS
    wp_enqueue_script('custom-carousel-js', get_template_directory_uri() . '/assets/js/vscustom-carousel.min.js', array('jquery'), '1.0.0', true);

    // 从HTML模板加载Form JS
    wp_enqueue_script('form-js', get_template_directory_uri() . '/assets/js/ajax-mail.js', array('jquery'), '1.0.0', true);

    // 从HTML模板加载Main JS File
    wp_enqueue_script('geek-main-script', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'geek_theme_scripts');
