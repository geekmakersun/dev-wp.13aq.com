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

    return $sanitized;
}
