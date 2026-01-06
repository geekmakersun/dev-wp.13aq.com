<?php
/**
 * 基本设置区域
 *
 * 定义基本设置的具体内容
 *
 * @package 极客wordpress主题
 */

/**
 * 渲染基本设置区域
 *
 * @param array $options 设置选项
 */
function geek_section_general($options) {
    ?>   <div class="form-field">
        <label for="geek_site_title">网站标题</label>
        <input type="text" id="geek_site_title" name="geek_theme_general[site_title]" value="<?php echo esc_attr($options['site_title'] ?? ''); ?>" class="regular-text">
        <p class="description">设置网站的标题，将显示在浏览器标签和搜索引擎结果中。</p>
    </div>
    
    <div class="form-field">
        <label for="geek_site_tagline">网站副标题</label>
        <input type="text" id="geek_site_tagline" name="geek_theme_general[site_tagline]" value="<?php echo esc_attr($options['site_tagline'] ?? ''); ?>" class="regular-text">
        <p class="description">设置网站的副标题，用于描述网站的主要内容或特色。</p>
    </div>
    
    <div class="form-field">
        <label for="geek_copyright">版权信息</label>
        <input type="text" id="geek_copyright" name="geek_theme_general[copyright]" value="<?php echo esc_attr($options['copyright'] ?? ''); ?>" class="regular-text">
        <p class="description">设置网站底部显示的版权信息。</p>
    </div>
    <?php
}
