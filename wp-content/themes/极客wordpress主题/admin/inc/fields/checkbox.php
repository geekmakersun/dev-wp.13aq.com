<?php
/**
 * 复选框字段类型
 *
 * 定义复选框字段的渲染和验证
 *
 * @package 极客wordpress主题
 */

/**
 * 渲染复选框字段
 *
 * @param array $field 字段配置
 * @param array $options 设置选项
 */
function geek_field_checkbox($field, $options) {
    $value = isset($options[$field['id']]) ? $options[$field['id']] : (isset($field['default']) ? $field['default'] : '0');
    $checked = checked($value, '1', false);
    
    echo '<input type="checkbox" id="' . esc_attr($field['id']) . '" name="' . esc_attr($field['option_name']) . '[' . esc_attr($field['id']) . ']" value="1" ' . $checked . '>';
    echo '<label for="' . esc_attr($field['id']) . '"> ' . esc_html($field['label']) . '</label>';
    
    if (isset($field['description'])) {
        echo '<p class="description">' . esc_html($field['description']) . '</p>';
    }
}
