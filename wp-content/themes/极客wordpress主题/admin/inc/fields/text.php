<?php
/**
 * 文本字段类型
 *
 * 定义文本字段的渲染和验证
 *
 * @package 极客wordpress主题
 */

/**
 * 渲染文本字段
 *
 * @param array $field 字段配置
 * @param array $options 设置选项
 */
function geek_field_text($field, $options) {
    $value = isset($options[$field['id']]) ? $options[$field['id']] : (isset($field['default']) ? $field['default'] : '');
    $class = isset($field['class']) ? $field['class'] : 'regular-text';
    
    echo '<input type="text" id="' . esc_attr($field['id']) . '" name="' . esc_attr($field['option_name']) . '[' . esc_attr($field['id']) . ']" value="' . esc_attr($value) . '" class="' . esc_attr($class) . '">';
    
    if (isset($field['description'])) {
        echo '<p class="description">' . esc_html($field['description']) . '</p>';
    }
}
