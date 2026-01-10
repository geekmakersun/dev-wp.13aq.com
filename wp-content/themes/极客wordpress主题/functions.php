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
 * 引入后台管理初始化
 */
require_once get_template_directory() . '/inc/admin-init.php';

/**
 * wordpress函数修改
 */
require_once get_template_directory() . '/inc/wordpress_function_modification.php';

/**
 * 加载主题样式和脚本
 */
require_once get_template_directory() . '/inc/theme-scripts.php';

/**
 * 引入头部菜单功能
 */
require_once get_template_directory() . '/inc/header-menu.php';

/**
 * 引入主轮播图功能
 */
require_once get_template_directory() . '/inc/main-carousel.php';

/**
 * 引入产品自定义文章类型和分类法
 */
require_once get_template_directory() . '/inc/product-post-type.php';

/**
 * 引入第三方图片下载功能
 */
require_once get_template_directory() . '/inc/third-party-image-download.php';

/**
 * 引入图片尺寸管理功能
 */
require_once get_template_directory() . '/inc/disable-image-sizes.php';

/**
 * 引入FAQ自定义文章类型和分类法
 */
require_once get_template_directory() . '/inc/faq-post-type.php';

/**
 * 引入媒体库图片显示名称功能
 */
require_once get_template_directory() . '/inc/media-library-show-image-names.php';