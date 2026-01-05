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
 * 自定义后台管理页面标题
 * 
 * @description 移除后台标题中多余的WordPress标识，优化后台标题显示
 * @param string $admin_title 原始管理页面标题
 * @param string $title 页面标题
 * @return string 优化后的标题
 * @since 1.0.0
 */
function custom_admin_title($admin_title, $title)
{
    return $title . ' &lsaquo; ' . get_bloginfo('name');
}
add_filter('admin_title', 'custom_admin_title', 10, 2);

/**
 * 隐藏WordPress后台左上角logo
 * 
 * @description 移除后台顶部导航栏中的WordPress logo，提升定制化体验
 * @since 1.0.0
 */
function hidden_admin_bar_remove()
{
    global $wp_admin_bar;
    if (is_object($wp_admin_bar) && method_exists($wp_admin_bar, 'remove_menu')) {
        $wp_admin_bar->remove_menu('wp-logo');
    }
}
add_action('wp_before_admin_bar_render', 'hidden_admin_bar_remove', 0);

/**
 * 加载主题样式
 */
function geek_theme_scripts() {
    // 加载本地jQuery
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/node_modules/jquery/dist/jquery.min.js', array(), '3.7.1', true );
    
    // 加载本地UIKit CSS
    wp_enqueue_style( 'uikit', get_template_directory_uri() . '/assets/node_modules/uikit/dist/css/uikit.min.css', array(), '3.25.4' );
    
    // 加载本地UIKit JS
    wp_enqueue_script( 'uikit', get_template_directory_uri() . '/assets/node_modules/uikit/dist/js/uikit.min.js', array( 'jquery' ), '3.25.4', true );
    wp_enqueue_script( 'uikit-icons', get_template_directory_uri() . '/assets/node_modules/uikit/dist/js/uikit-icons.min.js', array( 'uikit' ), '3.25.4', true );
    
    // 加载主样式文件
    wp_enqueue_style( 'geek-theme-style', get_template_directory_uri() . '/assets/css/main.css' );
}
add_action( 'wp_enqueue_scripts', 'geek_theme_scripts' );

