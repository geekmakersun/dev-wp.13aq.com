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
    
    // Navbar背景颜色
    add_settings_field(
        'geek_navbar_bg_color', // 字段ID
        '导航栏背景颜色',        // 标题
        'geek_navbar_bg_color_callback', // 回调
        'geek-theme-options',    // 页面
        'geek_general_section'   // 部分
    );
    
    // Navbar背景图片
    add_settings_field(
        'geek_navbar_bg_image', // 字段ID
        '导航栏背景图片',        // 标题
        'geek_navbar_bg_image_callback', // 回调
        'geek-theme-options',    // 页面
        'geek_general_section'   // 部分
    );
    
    // 订阅弹窗开关
    add_settings_field(
        'geek_newsletter_popup', // 字段ID
        '邮箱订阅弹窗',        // 标题
        'geek_newsletter_popup_callback', // 回调
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
        echo '<button type="button" class="button button-secondary delete-logo-button" style="margin-top: 5px;">删除LOGO</button>';
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
                multiple: false,
                library: {
                    type: 'image',
                    // 设置文件大小限制为2MB
                    uploadedTo: wp.media.view.settings.post.id
                }
            })
            .on('select', function() {
                var attachment = custom_uploader.state().get('selection').first().toJSON();
                $('#geek_logo').val(attachment.url);
                
                // 更新预览
                var preview = $('.logo-preview');
                if (preview.length > 0) {
                    preview.find('img').attr('src', attachment.url);
                    preview.show();
                } else {
                    $('.logo-upload-container').append('<div class="logo-preview" style="margin-top: 10px;"><img src="' + attachment.url + '" style="max-width: 200px; max-height: 100px;" alt="LOGO预览"><button type="button" class="button button-secondary delete-logo-button" style="margin-top: 5px;">删除LOGO</button></div>');
                }
            })
            .open();
        });
        
        // 删除LOGO功能
        $(document).on('click', '.delete-logo-button', function(e) {
            e.preventDefault();
            $('#geek_logo').val('');
            $('.logo-preview').hide();
        });
    });
    </script>
    <?php
}





/**
 * Navbar背景颜色字段回调
 */
function geek_navbar_bg_color_callback() {
    $options = get_option('geek_theme_general');
    $value = isset($options['navbar_bg_color']) ? $options['navbar_bg_color'] : '#ffffff';
    
    echo '<input type="color" id="geek_navbar_bg_color" name="geek_theme_general[navbar_bg_color]" value="' . esc_attr($value) . '" class="regular-text">';
    echo '<p class="description">设置导航栏的背景颜色，默认为白色。</p>';
}

/**
 * Navbar背景图片字段回调
 */
function geek_navbar_bg_image_callback() {
    $options = get_option('geek_theme_general');
    $bg_image_url = isset($options['navbar_bg_image']) ? $options['navbar_bg_image'] : '';
    
    echo '<div class="navbar-bg-image-upload-container">';
    echo '<input type="text" id="geek_navbar_bg_image" name="geek_theme_general[navbar_bg_image]" value="' . esc_attr($bg_image_url) . '" class="regular-text">';
    echo '<button type="button" class="button upload-navbar-bg-image-button">上传背景图片</button>';
    
    if (!empty($bg_image_url)) {
        echo '<div class="navbar-bg-image-preview" style="margin-top: 10px;">';
        echo '<img src="' . esc_url($bg_image_url) . '" style="max-width: 300px; max-height: 100px; object-fit: cover;" alt="导航栏背景图片预览">';
        echo '<button type="button" class="button button-secondary delete-navbar-bg-image-button" style="margin-top: 5px;">删除背景图片</button>';
        echo '</div>';
    }
    
    echo '</div>';
    
    // 添加jQuery上传脚本
    ?>
    <script type="text/javascript">
    jQuery(document).ready(function($) {
        $('.upload-navbar-bg-image-button').click(function(e) {
            e.preventDefault();
            
            var custom_uploader = wp.media({
                title: '选择导航栏背景图片',
                button: {
                    text: '使用此图片'
                },
                multiple: false
            })
            .on('select', function() {
                var attachment = custom_uploader.state().get('selection').first().toJSON();
                $('#geek_navbar_bg_image').val(attachment.url);
                
                // 更新预览
                var preview = $('.navbar-bg-image-preview');
                if (preview.length > 0) {
                    preview.find('img').attr('src', attachment.url);
                    preview.show();
                } else {
                    $('.navbar-bg-image-upload-container').append('<div class="navbar-bg-image-preview" style="margin-top: 10px;"><img src="' + attachment.url + '" style="max-width: 300px; max-height: 100px; object-fit: cover;" alt="导航栏背景图片预览"><button type="button" class="button button-secondary delete-navbar-bg-image-button" style="margin-top: 5px;">删除背景图片</button></div>');
                }
            })
            .open();
        });
        
        // 删除导航栏背景图片功能
        $(document).on('click', '.delete-navbar-bg-image-button', function(e) {
            e.preventDefault();
            $('#geek_navbar_bg_image').val('');
            $('.navbar-bg-image-preview').hide();
        });
    });
    </script>
    <?php
}

/**
 * 订阅弹窗开关字段回调
 */
function geek_newsletter_popup_callback() {
    $options = get_option('geek_theme_general');
    $is_enabled = isset($options['newsletter_popup']) ? $options['newsletter_popup'] : '1';
    
    echo '<input type="checkbox" id="geek_newsletter_popup" name="geek_theme_general[newsletter_popup]" value="1" ' . checked(1, $is_enabled, false) . '>';
    echo '<label for="geek_newsletter_popup" class="ml-2">启用邮箱订阅弹窗</label>';
    echo '<p class="description">勾选此项以在网站上显示邮箱订阅弹窗。</p>';
}




