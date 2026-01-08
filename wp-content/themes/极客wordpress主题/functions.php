<?php

/**
 * 极客wordpress主题函数
 *
 * 极简的主题功能，便于二次开发
 *
 * @package 极客wordpress主题
 */

// 防止直接访问该文件（安全规范）
if ( ! defined( 'ABSPATH' ) ) {
	exit; // 退出程序
}

/**
 * 后台管理初始化
 */
function geek_theme_admin_init()
{
    require_once get_template_directory() . '/admin/init.php';
}
add_action('after_setup_theme', 'geek_theme_admin_init');

/**
 * wordpress函数修改
 */
require_once get_template_directory() . '/inc/wordpress_function_modification.php';

/**
 * 加载主题样式和脚本
 */
require_once get_template_directory() . '/inc/theme-scripts.php';

/**
 * 引入导航菜单功能
 */
require_once get_template_directory() . '/inc/nav-menu.php';

/**
 * 引入主轮播图功能
 */
require_once get_template_directory() . '/inc/main-carousel.php';

/**
 * 引入产品自定义文章类型和分类法
 */
require_once get_template_directory() . '/inc/product-post-type.php';

