<?php
/**
 * 导航设置区域
 *
 * 定义导航设置的具体内容
 *
 * @package 极客wordpress主题
 */

/**
 * 渲染导航设置区域
 *
 * @param array $options 设置选项
 */
function geek_section_navigation($options) {
    $nav_style = $options['nav_style'] ?? 'default';
    ?>   <div class="form-field">
        <label for="geek_nav_style">导航样式</label>
        <select id="geek_nav_style" name="geek_theme_navigation[nav_style]">
            <option value="default" <?php selected($nav_style, 'default'); ?>>默认样式</option>
            <option value="minimal" <?php selected($nav_style, 'minimal'); ?>>极简样式</option>
            <option value="modern" <?php selected($nav_style, 'modern'); ?>>现代样式</option>
        </select>
        <p class="description">选择网站导航的显示样式。</p>
    </div>
    
    <div class="form-field">
        <label for="geek_nav_sticky">固定导航</label>
        <input type="checkbox" id="geek_nav_sticky" name="geek_theme_navigation[nav_sticky]" value="1" <?php checked($options['nav_sticky'] ?? '', '1'); ?>>
        <span>启用固定导航，滚动时导航栏保持在顶部</span>
        <p class="description">开启后，导航栏会在页面滚动时固定在浏览器顶部。</p>
    </div>
    
    <div class="form-field">
        <label for="geek_nav_transparent">透明导航</label>
        <input type="checkbox" id="geek_nav_transparent" name="geek_theme_navigation[nav_transparent]" value="1" <?php checked($options['nav_transparent'] ?? '', '1'); ?>>
        <span>启用透明导航，在页面顶部显示透明背景</span>
        <p class="description">开启后，导航栏会在页面顶部显示透明背景，滚动后变为实色。</p>
    </div>
    <?php
}
