<?php

/**
 * WordPress函数修改
 *
 * 对WordPress核心函数进行修改，以符合主题需求
 *
 * @package 极客wordpress主题
 */

/**
 * 优化WordPress媒体库上传路径
 * 
 * @description 设置标准的媒体上传路径，避免路径配置问题
 * @since 1.0.0
 */
function optimize_media_upload_path()
{
    $upload_path = get_option('upload_path');

    // 如果是默认路径或未设置，则设置为标准路径
    if ($upload_path === 'wp-content/uploads' || $upload_path === null || $upload_path === '') {
        update_option('upload_path', WP_CONTENT_DIR . '/uploads');
    }
}
add_action('after_setup_theme', 'optimize_media_upload_path');

// 启用特色图片（文章/页面的缩略图功能）
add_theme_support('post-thumbnails');