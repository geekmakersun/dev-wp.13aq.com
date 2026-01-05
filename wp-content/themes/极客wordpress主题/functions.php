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
function geek_theme_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'geek-wp-theme' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'geek-wp-theme' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'geek_theme_widgets_init' );

/**
 * 加载主题样式
 */
function geek_theme_scripts() {
    // 加载主样式文件
    wp_enqueue_style( 'geek-theme-style', get_template_directory_uri() . '/assets/css/main.css' );
}
add_action( 'wp_enqueue_scripts', 'geek_theme_scripts' );
