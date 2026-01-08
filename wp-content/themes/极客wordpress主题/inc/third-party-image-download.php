<?php

/**
 * 第三方图片下载功能
 *
 * 允许从第三方URL下载图片并设置为产品特色图片
 *
 * @package 极客wordpress主题
 */

// 防止直接访问该文件（安全规范）
if (! defined('ABSPATH')) {
    exit; // 退出程序
}

/**
 * 在产品编辑页面添加第三方图片下载元框
 */
function geek_add_third_party_image_metabox() {
    add_meta_box(
        'geek_third_party_image', // 元框ID
        __('第三方图片下载', 'geek-theme'), // 元框标题
        'geek_third_party_image_metabox_callback', // 回调函数
        'product', // 应用到产品文章类型
        'side', // 位置：侧边栏
        'high' // 优先级：高
    );
}
add_action('add_meta_boxes', 'geek_add_third_party_image_metabox');

/**
 * 第三方图片下载元框回调函数
 */
function geek_third_party_image_metabox_callback($post) {
    // 安全字段
    wp_nonce_field('geek_third_party_image_action', 'geek_third_party_image_nonce');
    
    ?>
    <div class="geek-third-party-image">
        <p>
            <label for="geek_third_party_image_url" style="display: block; margin-bottom: 8px;">
                <?php esc_html_e('图片URL：', 'geek-theme'); ?>
            </label>
            <input 
                type="url" 
                id="geek_third_party_image_url" 
                name="geek_third_party_image_url" 
                class="widefat" 
                placeholder="https://example.com/image.jpg"
            />
        </p>
        <p>
            <button 
                type="button" 
                id="geek_download_image_button" 
                class="button button-primary"
                style="width: 100%; margin-top: 4px;"
            >
                <?php esc_html_e('下载并设置为特色图片', 'geek-theme'); ?>
            </button>
        </p>
        
        <hr style="margin: 15px 0;" />
        
        <p>
            <button 
                type="button" 
                id="geek_download_content_images_button" 
                class="button button-secondary"
                style="width: 100%; margin-top: 4px;"
            >
                <?php esc_html_e('下载内容中外链图片到本地', 'geek-theme'); ?>
            </button>
        </p>
        <div id="geek_content_images_status" style="margin-top: 10px; font-weight: bold;"></div>
    </div>
    
    <script type="text/javascript">
    jQuery(document).ready(function($) {
        // 单个图片下载按钮
        $('#geek_download_image_button').click(function() {
            var imageUrl = $('#geek_third_party_image_url').val();
            var statusDiv = $('#geek_image_download_status');
            
            if (!imageUrl) {
                statusDiv.html('<span style="color: red;"><?php esc_html_e('请输入图片URL', 'geek-theme'); ?></span>');
                return;
            }
            
            statusDiv.html('<span style="color: blue;"><?php esc_html_e('正在下载图片...', 'geek-theme'); ?></span>');
            
            $.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'POST',
                data: {
                    action: 'geek_download_third_party_image',
                    image_url: imageUrl,
                    post_id: <?php echo $post->ID; ?>,
                    nonce: '<?php echo wp_create_nonce('geek_download_image_nonce'); ?>'
                },
                success: function(response) {
                    if (response.success) {
                        statusDiv.html('<span style="color: green;"><?php esc_html_e('图片下载成功！', 'geek-theme'); ?></span>');
                        // 刷新特色图片区域
                        if (response.data.thumbnail_html) {
                            var thumbnailDiv = $('#set-post-thumbnail-drag-drop, #set-post-thumbnail');
                            if (thumbnailDiv.length) {
                                // 移除旧的特色图片预览
                                $('.attachment-thumbnail', thumbnailDiv.parent()).remove();
                                $('.howto', thumbnailDiv.parent()).remove();
                                // 添加新的特色图片预览
                                thumbnailDiv.before(response.data.thumbnail_html);
                            }
                        }
                        // 清空输入框
                        $('#geek_third_party_image_url').val('');
                    } else {
                        statusDiv.html('<span style="color: red;">' + response.data.message + '</span>');
                    }
                },
                error: function() {
                    statusDiv.html('<span style="color: red;"><?php esc_html_e('下载失败，请重试', 'geek-theme'); ?></span>');
                }
            });
        });
        
        // 内容图片下载按钮
        $('#geek_download_content_images_button').click(function() {
            var statusDiv = $('#geek_content_images_status');
            statusDiv.html('<span style="color: blue;"><?php esc_html_e('正在提取并下载图片...', 'geek-theme'); ?></span>');
            
            $.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'POST',
                data: {
                    action: 'geek_download_content_images',
                    post_id: <?php echo $post->ID; ?>,
                    nonce: '<?php echo wp_create_nonce('geek_download_content_images_nonce'); ?>'
                },
                success: function(response) {
                    if (response.success) {
                        statusDiv.html('<span style="color: green;">' + response.data.message + '</span>');
                        // 重新加载编辑器内容
                        if (typeof tinyMCE !== 'undefined' && tinyMCE.activeEditor) {
                            tinyMCE.activeEditor.execCommand('mceSave');
                            // 延迟刷新内容
                            setTimeout(function() {
                                window.location.reload();
                            }, 1000);
                        } else {
                            window.location.reload();
                        }
                    } else {
                        statusDiv.html('<span style="color: red;">' + response.data.message + '</span>');
                    }
                },
                error: function() {
                    statusDiv.html('<span style="color: red;"><?php esc_html_e('下载失败，请重试', 'geek-theme'); ?></span>');
                }
            });
        });
    });
    </script>
    <?php
}

/**
 * AJAX处理函数：下载第三方图片
 */
function geek_download_third_party_image() {
    // 验证权限和nonce
    if (!current_user_can('edit_posts') || !wp_verify_nonce($_POST['nonce'], 'geek_download_image_nonce')) {
        wp_send_json_error(array('message' => __('权限不足', 'geek-theme')));
    }
    
    $image_url = isset($_POST['image_url']) ? esc_url_raw($_POST['image_url']) : '';
    $post_id = isset($_POST['post_id']) ? intval($_POST['post_id']) : 0;
    
    if (empty($image_url) || empty($post_id)) {
        wp_send_json_error(array('message' => __('参数错误', 'geek-theme')));
    }
    
    // 调用下载函数
    $result = geek_download_image_from_url($image_url, $post_id);
    
    if (is_wp_error($result)) {
        wp_send_json_error(array('message' => $result->get_error_message()));
    }
    
    // 获取新的特色图片HTML
    $thumbnail_html = '';
    if (has_post_thumbnail($post_id)) {
        $thumbnail_html = get_the_post_thumbnail($post_id, 'thumbnail');
    }
    
    wp_send_json_success(array(
        'attachment_id' => $result,
        'thumbnail_html' => $thumbnail_html
    ));
}
add_action('wp_ajax_geek_download_third_party_image', 'geek_download_third_party_image');

/**
 * AJAX处理函数：下载内容中的外链图片到本地
 */
function geek_download_content_images() {
    // 验证权限和nonce
    if (!current_user_can('edit_posts') || !wp_verify_nonce($_POST['nonce'], 'geek_download_content_images_nonce')) {
        wp_send_json_error(array('message' => __('权限不足', 'geek-theme')));
    }
    
    $post_id = isset($_POST['post_id']) ? intval($_POST['post_id']) : 0;
    
    if (empty($post_id)) {
        wp_send_json_error(array('message' => __('参数错误', 'geek-theme')));
    }
    
    // 获取文章内容
    $post = get_post($post_id);
    if (!$post) {
        wp_send_json_error(array('message' => __('文章不存在', 'geek-theme')));
    }
    
    $content = $post->post_content;
    
    // 提取内容中的图片URL
    $image_urls = geek_extract_image_urls_from_content($content);
    
    if (empty($image_urls)) {
        wp_send_json_error(array('message' => __('内容中未找到外链图片', 'geek-theme')));
    }
    
    // 下载图片并替换URL
    $replaced_count = 0;
    $failed_count = 0;
    
    foreach ($image_urls as $image_url) {
        // 跳过本地图片
        if (geek_is_local_image($image_url)) {
            continue;
        }
        
        // 下载图片，不设置为特色图片
        $attachment_id = geek_download_image_from_url($image_url, $post_id, false);
        
        if (!is_wp_error($attachment_id)) {
            // 获取本地图片URL
            $local_image_url = wp_get_attachment_url($attachment_id);
            
            if ($local_image_url) {
                // 替换内容中的图片URL
                $content = str_replace($image_url, $local_image_url, $content);
                $replaced_count++;
            }
        } else {
            $failed_count++;
        }
    }
    
    // 更新文章内容
    if ($replaced_count > 0) {
        wp_update_post(array(
            'ID' => $post_id,
            'post_content' => $content
        ));
    }
    
    wp_send_json_success(array(
        'message' => sprintf(__('处理完成：成功替换 %d 张图片，失败 %d 张', 'geek-theme'), $replaced_count, $failed_count)
    ));
}
add_action('wp_ajax_geek_download_content_images', 'geek_download_content_images');

/**
 * 从内容中提取图片URL
 */
function geek_extract_image_urls_from_content($content) {
    $image_urls = array();
    
    // 使用正则表达式提取img标签的src属性
    preg_match_all('/<img[^>]+src=["\']([^"\']+)["\'][^>]*>/i', $content, $matches);
    
    if (isset($matches[1]) && !empty($matches[1])) {
        $image_urls = $matches[1];
        // 去重
        $image_urls = array_unique($image_urls);
    }
    
    return $image_urls;
}

/**
 * 检查图片是否为本地图片
 */
function geek_is_local_image($image_url) {
    // 获取站点URL
    $site_url = home_url();
    $upload_base_url = wp_upload_dir()['baseurl'];
    
    // 检查是否包含站点URL或上传目录URL
    if (strpos($image_url, $site_url) !== false || strpos($image_url, $upload_base_url) !== false) {
        return true;
    }
    
    // 检查是否为相对路径
    if (strpos($image_url, 'http') !== 0) {
        return true;
    }
    
    return false;
}

/**
 * 从URL下载图片并返回附件ID
 */
function geek_download_image_from_url($image_url, $post_id = 0, $set_as_featured = true) {
    // 检查URL是否有效
    $valid_extensions = array('jpg', 'jpeg', 'png', 'gif', 'webp');
    $url_parts = parse_url($image_url);
    if (!isset($url_parts['scheme']) || !in_array($url_parts['scheme'], array('http', 'https'))) {
        return new WP_Error('invalid_url', __('无效的图片URL', 'geek-theme'));
    }
    
    // 检查文件扩展名
    $pathinfo = pathinfo($url_parts['path']);
    if (!isset($pathinfo['extension']) || !in_array(strtolower($pathinfo['extension']), $valid_extensions)) {
        return new WP_Error('invalid_extension', __('不支持的图片格式', 'geek-theme'));
    }
    
    // 获取文件名
    $filename = basename($url_parts['path']);
    
    // 设置超时时间
    $timeout = 30;
    
    // 获取WordPress上传目录
    $upload_dir = wp_upload_dir();
    
    // 确保上传目录存在且可写
    if (!file_exists($upload_dir['path'])) {
        if (!wp_mkdir_p($upload_dir['path'])) {
            return new WP_Error('dir_not_writable', __('上传目录不存在且无法创建', 'geek-theme'));
        }
    }
    
    // 检查目录是否可写
    if (!is_writable($upload_dir['path'])) {
        return new WP_Error('dir_not_writable', __('上传目录不可写', 'geek-theme'));
    }
    
    $upload_path = $upload_dir['path'] . '/' . $filename;
    
    // 使用WP_Http获取图片
    $http = new WP_Http();
    $response = $http->request($image_url, array(
        'timeout' => $timeout,
        'stream' => true,
        'filename' => $upload_path
    ));
    
    // 检查响应
    if (is_wp_error($response)) {
        return new WP_Error('download_failed', __('图片下载失败：' . $response['response']['code'], 'geek-theme'));
    }
    
    if ($response['response']['code'] != 200) {
        return new WP_Error('invalid_response', __('服务器返回错误：' . $response['response']['code'], 'geek-theme'));
    }
    
    // 确保文件存在
    if (!file_exists($upload_path)) {
        return new WP_Error('file_not_found', __('图片保存失败', 'geek-theme'));
    }
    
    // 检查文件大小
    $file_size = filesize($upload_path);
    if ($file_size < 100) {
        unlink($upload_path);
        return new WP_Error('file_too_small', __('图片文件太小', 'geek-theme'));
    }
    
    // 获取文件类型
    $file_type = wp_check_filetype($filename);
    if (!in_array($file_type['type'], array('image/jpeg', 'image/png', 'image/gif', 'image/webp'))) {
        unlink($upload_path);
        return new WP_Error('invalid_file_type', __('不支持的文件类型', 'geek-theme'));
    }
    
    // 准备附件数组
    $attachment = array(
        'post_mime_type' => $file_type['type'],
        'post_title' => sanitize_file_name(pathinfo($filename, PATHINFO_FILENAME)),
        'post_content' => '',
        'post_status' => 'inherit'
    );
    
    // 将文件添加到媒体库
    $attachment_id = wp_insert_attachment($attachment, $upload_path, $post_id);
    
    // 检查是否添加成功
    if (is_wp_error($attachment_id)) {
        unlink($upload_path);
        return $attachment_id;
    }
    
    // 生成附件元数据
    require_once(ABSPATH . 'wp-admin/includes/image.php');
    $attachment_data = wp_generate_attachment_metadata($attachment_id, $upload_path);
    wp_update_attachment_metadata($attachment_id, $attachment_data);
    
    // 设置为特色图片（仅当需要时）
    if ($post_id && $set_as_featured) {
        set_post_thumbnail($post_id, $attachment_id);
    }
    
    return $attachment_id;
}
