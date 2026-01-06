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

    // LOGO - URL验证
    if (isset($input['logo'])) {
        $sanitized['logo'] = esc_url_raw($input['logo']);
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

    return $sanitized;
}
