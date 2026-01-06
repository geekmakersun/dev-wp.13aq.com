<?php
/**
 * 文本域字段类型
 *
 * 定义文本域字段的渲染和验证
 *
 * @package 极客wordpress主题
 */

/**
 * 渲染文本域字段
 *
 * @param array $field 字段配置
 * @param array $options 设置选项
 */
function geek_field_textarea($field, $options) {
    $value = isset($options[$field['id']]) ? $options[$field['id']] : (isset($field['default']) ? $field['default'] : '');
    $rows = isset($field['rows']) ? $field['rows'] : 5;
    $class = isset($field['class']) ? $field['class'] : 'regular-text';
    
    echo '<textarea id="' . esc_attr($field['id']) . '" name="' . esc_attr($field['option_name']) . '[' . esc_attr($field['id']) . ']" rows="' . esc_attr($rows) . '" class="' . esc_attr($class) . '">' . esc_textarea($value) . '</textarea>';
    
    if (isset($field['description'])) {
        echo '<p class="description">' . esc_html($field['description']) . '</p>';
    }
}
