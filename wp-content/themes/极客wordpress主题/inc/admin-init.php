<?php
/**
 * 后台管理初始化
 *
 * @package 极客wordpress主题
 */

/**
 * 后台管理初始化
 */
function geek_theme_admin_init()
{
    require_once get_template_directory() . '/admin/init.php';
}
add_action('after_setup_theme', 'geek_theme_admin_init');

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
