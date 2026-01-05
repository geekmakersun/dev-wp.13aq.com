<?php

/**
 * 极客wordpress主题函数
 *
 * 极简的主题功能，便于二次开发
 *
 * @package 极客wordpress主题
 */

/**
 * 主题初始化
 */

/**
 * 注册侧边栏
 */
function geek_theme_widgets_init()
{
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'geek-wp-theme'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'geek-wp-theme'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'geek_theme_widgets_init');

/**
 * 加载主题样式和脚本
 */
function geek_theme_scripts()
{
    // 从vendor目录加载jQuery
    wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/vendor/jquery/jquery.min.js', array(), '3.7.1', true);

    // 从vendor目录加载Bootstrap CSS
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/vendor/bootstrap/css/bootstrap.min.css', array(), '5.3.8');

    // 从vendor目录加载Bootstrap JS
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/vendor/bootstrap/js/bootstrap.bundle.min.js', array('jquery'), '5.3.0', true);
}
add_action('wp_enqueue_scripts', 'geek_theme_scripts');
