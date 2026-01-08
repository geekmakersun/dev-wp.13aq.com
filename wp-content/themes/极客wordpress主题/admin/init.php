<?php
/**
 * 后台管理初始化
 *
 * 加载所有后台管理功能模块
 *
 * @package 极客wordpress主题
 */

// 加载功能模块
require_once __DIR__ . '/inc/menus.php';
require_once __DIR__ . '/inc/settings.php';
require_once __DIR__ . '/inc/sanitize.php';
require_once __DIR__ . '/inc/batch-categories.php';

/**
 * 加载后台样式和脚本
 */
function geek_admin_scripts() {
    // 加载WordPress媒体上传器脚本和样式
    wp_enqueue_media();
    
    // 后台专用CSS
    wp_enqueue_style('geek-admin-style', get_template_directory_uri() . '/admin/assets/css/admin-style.css');
    // 后台专用JS
    wp_enqueue_script('geek-admin-script', get_template_directory_uri() . '/admin/assets/js/admin-script.js', array('jquery'), '1.0', true);
}
add_action('admin_enqueue_scripts', 'geek_admin_scripts');
