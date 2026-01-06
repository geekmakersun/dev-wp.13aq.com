<?php
/**
 * 选择框字段类型
 *
 * 定义选择框字段的渲染和验证
 *
 * @package 极客wordpress主题
 */

/**
 * 渲染选择框字段
 *
 * @param array $field 字段配置
 * @param array $options 设置选项
 */
function geek_field_select($field, $options) {
    $value = isset($options[$field['id']]) ? $options[$field['id']] : (isset($field['default']) ? $field['default'] : '');
    $class = isset($field['class']) ? $field['class'] : '';
    
    echo '<select id="' . esc_attr($field['id']) . '" name="' . esc_attr($field['option_name']) . '[' . esc_attr($field['id']) . ']" class="' . esc_attr($class) . '">';
    
    if (isset($field['choices']) && is_array($field['choices'])) {
        foreach ($field['choices'] as $key => $label) {
            $selected = selected($value, $key, false);
            echo '<option value="' . esc_attr($key) . '" ' . $selected . '>' . esc_html($label) . '</option>';
        }
    }
    
    echo '</select>';
    
    if (isset($field['description'])) {
        echo '<p class="description">' . esc_html($field['description']) . '</p>';
    }
}
