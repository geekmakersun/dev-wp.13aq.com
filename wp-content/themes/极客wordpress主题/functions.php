<?php

/**
 * 极客wordpress主题函数
 *
 * 极简的主题功能，便于二次开发
 *
 * @package Geek_WP_Theme
 */

// 防止直接访问该文件（安全规范）
if ( ! defined( 'ABSPATH' ) ) {
	 exit; // 退出程序
}

/**
 * 主题常量定义
 */
define( 'GEEK_THEME_VERSION', '1.0.0' );
define( 'GEEK_THEME_DIR', get_template_directory() );
define( 'GEEK_THEME_URI', get_template_directory_uri() );
define( 'GEEK_THEME_INC_DIR', GEEK_THEME_DIR . '/inc' );
define( 'GEEK_THEME_ASSETS_DIR', GEEK_THEME_DIR . '/assets' );
define( 'GEEK_THEME_ASSETS_URI', GEEK_THEME_URI . '/assets' );

/**
 * 设置主题支持
 */
function geek_theme_setup_supports() {
	// 基本主题支持
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	
	// 导航菜单
	register_nav_menus( array(
		'primary' => __( '主导航菜单', 'geek-wp-theme' ),
		'footer'  => __( '页脚菜单', 'geek-wp-theme' ),
	) );
	
	// HTML5 支持
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	
	// WooCommerce 支持（条件加载）
	if ( class_exists( 'WooCommerce' ) ) {
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
	}
}
add_action( 'after_setup_theme', 'geek_theme_setup_supports' );

/**
 * 直接加载主题核心模块
 * 优先保证样式和功能正常加载
 */

// 加载脚本和样式（必须优先加载）
if ( file_exists( GEEK_THEME_INC_DIR . '/theme-scripts.php' ) ) {
	require_once GEEK_THEME_INC_DIR . '/theme-scripts.php';
}

// 加载其他核心模块
if ( file_exists( GEEK_THEME_INC_DIR . '/admin-init.php' ) ) {
	require_once GEEK_THEME_INC_DIR . '/admin-init.php';
}

if ( file_exists( GEEK_THEME_INC_DIR . '/wordpress_function_modification.php' ) ) {
	require_once GEEK_THEME_INC_DIR . '/wordpress_function_modification.php';
}

if ( file_exists( GEEK_THEME_INC_DIR . '/header-menu.php' ) ) {
	require_once GEEK_THEME_INC_DIR . '/header-menu.php';
}

if ( file_exists( GEEK_THEME_INC_DIR . '/main-carousel.php' ) ) {
	require_once GEEK_THEME_INC_DIR . '/main-carousel.php';
}

if ( file_exists( GEEK_THEME_INC_DIR . '/disable-image-sizes.php' ) ) {
	require_once GEEK_THEME_INC_DIR . '/disable-image-sizes.php';
}

if ( file_exists( GEEK_THEME_INC_DIR . '/faq-post-type.php' ) ) {
	require_once GEEK_THEME_INC_DIR . '/faq-post-type.php';
}

if ( file_exists( GEEK_THEME_INC_DIR . '/media-library-show-image-names.php' ) ) {
	require_once GEEK_THEME_INC_DIR . '/media-library-show-image-names.php';
}


