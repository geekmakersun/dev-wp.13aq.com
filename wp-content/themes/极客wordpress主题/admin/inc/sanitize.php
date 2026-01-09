<?php
/**
 * 数据验证函数
 *
 * 验证和清理主题设置字段的数据
 *
 * @package 极客wordpress主题
 */

/**
 * 验证基本设置
 *
 * @param array $input 输入数据
 * @return array 验证后的数据
 */
function geek_sanitize_general_settings($input) {
    $sanitized = array();

    // 网站名称 - 文本验证
    if (isset($input['site_name'])) {
        $sanitized['site_name'] = sanitize_text_field($input['site_name']);
    }

    // LOGO - URL验证和大小限制
    if (isset($input['logo']) && !empty($input['logo'])) {
        // 获取附件ID
        $logo_url = esc_url_raw($input['logo']);
        $attachment_id = attachment_url_to_postid($logo_url);
        
        // 如果是有效的附件
        if ($attachment_id) {
            // 获取附件元数据
            $metadata = wp_get_attachment_metadata($attachment_id);
            $file_path = get_attached_file($attachment_id);
            
            // 检查文件大小（限制为2MB）
            $max_size = 2 * 1024 * 1024; // 2MB
            if (file_exists($file_path) && filesize($file_path) <= $max_size) {
                $sanitized['logo'] = $logo_url;
            }
        } else {
            // 外部URL或无效附件，只验证URL格式
            $sanitized['logo'] = $logo_url;
        }
    }

    // Navbar背景颜色 - 颜色值验证
    if (isset($input['navbar_bg_color'])) {
        // 验证颜色值格式
        if (preg_match('/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/', $input['navbar_bg_color'])) {
            $sanitized['navbar_bg_color'] = $input['navbar_bg_color'];
        } else {
            $sanitized['navbar_bg_color'] = '#ffffff'; // 默认白色
        }
    }

    // Navbar背景图片 - URL验证
    if (isset($input['navbar_bg_image'])) {
        $sanitized['navbar_bg_image'] = esc_url_raw($input['navbar_bg_image']);
    }

    // 订阅弹窗开关 - 复选框验证
    if (isset($input['newsletter_popup'])) {
        $sanitized['newsletter_popup'] = sanitize_text_field($input['newsletter_popup']);
    } else {
        // 当取消勾选时，明确保存为0或不保存，以表示关闭状态
        $sanitized['newsletter_popup'] = '0';
    }
    


    return $sanitized;
}
