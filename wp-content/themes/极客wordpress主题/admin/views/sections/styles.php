<?php
/**
 * 样式设置区域
 *
 * 定义样式设置的具体内容
 *
 * @package 极客wordpress主题
 */

/**
 * 渲染样式设置区域
 *
 * @param array $options 设置选项
 */
function geek_section_styles($options) {
    ?>   <div class="form-field">
        <label for="geek_primary_color">主题主色调</label>
        <div class="color-picker-container">
            <input type="color" id="geek_primary_color" name="geek_theme_styles[primary_color]" value="<?php echo esc_attr($options['primary_color'] ?? '#007bff'); ?>">
            <input type="text" id="geek_primary_color_hex" name="geek_theme_styles[primary_color_hex]" value="<?php echo esc_attr($options['primary_color'] ?? '#007bff'); ?>" class="regular-text" style="width: 100px; margin-left: 10px;">
        </div>
        <p class="description">设置主题的主要颜色，将应用于按钮、链接和强调元素。</p>
    </div>
    
    <div class="form-field">
        <label for="geek_secondary_color">主题次要颜色</label>
        <div class="color-picker-container">
            <input type="color" id="geek_secondary_color" name="geek_theme_styles[secondary_color]" value="<?php echo esc_attr($options['secondary_color'] ?? '#6c757d'); ?>">
            <input type="text" id="geek_secondary_color_hex" name="geek_theme_styles[secondary_color_hex]" value="<?php echo esc_attr($options['secondary_color'] ?? '#6c757d'); ?>" class="regular-text" style="width: 100px; margin-left: 10px;">
        </div>
        <p class="description">设置主题的次要颜色，用于辅助元素和次要强调。</p>
    </div>
    
    <div class="form-field">
        <label for="geek_font_family">字体选择</label>
        <select id="geek_font_family" name="geek_theme_styles[font_family]">
            <option value="system-ui" <?php selected($options['font_family'] ?? '', 'system-ui'); ?>>系统默认字体</option>
            <option value="Arial" <?php selected($options['font_family'] ?? '', 'Arial'); ?>>Arial</option>
            <option value="Helvetica" <?php selected($options['font_family'] ?? '', 'Helvetica'); ?>>Helvetica</option>
            <option value="Georgia" <?php selected($options['font_family'] ?? '', 'Georgia'); ?>>Georgia</option>
            <option value="Times New Roman" <?php selected($options['font_family'] ?? '', 'Times New Roman'); ?>>Times New Roman</option>
        </select>
        <p class="description">选择网站的主要字体。</p>
    </div>
    
    <div class="form-field">
        <label for="geek_custom_css">自定义CSS</label>
        <textarea id="geek_custom_css" name="geek_theme_styles[custom_css]" rows="10" class="large-text code"><?php echo esc_textarea($options['custom_css'] ?? ''); ?></textarea>
        <p class="description">添加自定义CSS代码，用于覆盖主题默认样式。</p>
    </div>
    <?php
}
