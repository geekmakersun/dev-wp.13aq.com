<?php
/**
 * 设置API注册
 *
 * 注册主题设置选项和字段
 *
 * @package 极客wordpress主题
 */

/**
 * 初始化设置API
 */
function geek_admin_settings_init() {
    // 注册基本设置组（仅保留必要设置）
    register_setting(
        'geek_theme_general',   // 选项组
        'geek_theme_general',   // 选项名称
        'geek_sanitize_general_settings' // 验证回调
    );

    // 添加基本设置部分
    add_settings_section(
        'geek_general_section', // 部分ID
        '基本设置',           // 标题
        'geek_general_section_callback', // 回调
        'geek-theme-options'    // 页面
    );

    // --- 基本设置字段 ---  
    // 网站名称
    add_settings_field(
        'geek_site_name',      // 字段ID
        '网站名称',            // 标题
        'geek_site_name_callback', // 回调
        'geek-theme-options',    // 页面
        'geek_general_section'   // 部分
    );

    // LOGO上传
    add_settings_field(
        'geek_logo',           // 字段ID
        'LOGO',               // 标题
        'geek_logo_callback',  // 回调
        'geek-theme-options',    // 页面
        'geek_general_section'   // 部分
    );
}
add_action('admin_init', 'geek_admin_settings_init');

// --- 基本设置回调函数 ---

/**
 * 基本设置部分回调
 */
function geek_general_section_callback() {
    echo '<p>设置网站的基本信息。</p>';
}

/**
 * 网站名称字段回调
 */
function geek_site_name_callback() {
    $options = get_option('geek_theme_general');
    $value = isset($options['site_name']) ? $options['site_name'] : '';
    echo '<input type="text" id="geek_site_name" name="geek_theme_general[site_name]" value="' . esc_attr($value) . '" class="regular-text">';
}

/**
 * LOGO上传字段回调
 */
function geek_logo_callback() {
    $options = get_option('geek_theme_general');
    $logo_url = isset($options['logo']) ? $options['logo'] : '';
    
    echo '<div class="logo-upload-container">';
    echo '<input type="text" id="geek_logo" name="geek_theme_general[logo]" value="' . esc_attr($logo_url) . '" class="regular-text">';
    echo '<button type="button" class="button upload-logo-button">上传LOGO</button>';
    
    if (!empty($logo_url)) {
        echo '<div class="logo-preview" style="margin-top: 10px;">';
        echo '<img src="' . esc_url($logo_url) . '" style="max-width: 200px; max-height: 100px;" alt="LOGO预览">';
        echo '</div>';
    }
    
    echo '</div>';
    
    // 添加jQuery上传脚本
    ?>   <script type="text/javascript">
    jQuery(document).ready(function($) {
        $('.upload-logo-button').click(function(e) {
            e.preventDefault();
            
            var custom_uploader = wp.media({
                title: '选择LOGO',
                button: {
                    text: '使用此图片'
                },
                multiple: false
            })
            .on('select', function() {
                var attachment = custom_uploader.state().get('selection').first().toJSON();
                $('#geek_logo').val(attachment.url);
                
                // 更新预览
                var preview = $('.logo-preview');
                if (preview.length > 0) {
                    preview.find('img').attr('src', attachment.url);
                } else {
                    $('.logo-upload-container').append('<div class="logo-preview" style="margin-top: 10px;"><img src="' + attachment.url + '" style="max-width: 200px; max-height: 100px;" alt="LOGO预览"></div>');
                }
            })
            .open();
        });
    });
    </script>
    <?php
}
