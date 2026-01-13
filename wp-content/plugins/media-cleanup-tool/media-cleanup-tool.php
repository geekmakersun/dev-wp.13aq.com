<?php
/**
 * Plugin Name: 媒体清理工具
 * Plugin URI: https://example.com/media-cleanup-tool
 * Description: 扫描和删除没有使用的媒体图片，包括不同尺寸，并彻底禁用不同尺寸图片的生成。
 * Version: 1.0.0
 * Author: 孙柄晨
 * Author URI: https://example.com
 * Text Domain: media-cleanup-tool
 * Domain Path: /languages
 */

// 防止直接访问
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// 定义插件常量
define( 'MCT_VERSION', '1.0.0' );
define( 'MCT_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'MCT_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

// 加载文本域
function mct_load_textdomain() {
    load_plugin_textdomain( 'media-cleanup-tool', false, basename( dirname( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'mct_load_textdomain' );

// 加载插件类
require_once MCT_PLUGIN_DIR . 'includes/class-media-cleanup-tool.php';

// 激活插件
register_activation_hook( __FILE__, array( 'Media_Cleanup_Tool', 'activate' ) );

// 停用插件
register_deactivation_hook( __FILE__, array( 'Media_Cleanup_Tool', 'deactivate' ) );

// 初始化插件
function run_media_cleanup_tool() {
    $plugin = new Media_Cleanup_Tool();
    $plugin->run();
}

run_media_cleanup_tool();
