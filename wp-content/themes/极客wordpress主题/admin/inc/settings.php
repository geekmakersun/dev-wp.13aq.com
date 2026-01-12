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
    

    
    // --- 轮播图设置部分 ---  
    // 注册轮播图设置选项
    register_setting(
        'geek_theme_general',   // 选项组
        'geek_carousel_data',    // 选项名称
        'geek_sanitize_carousel_data' // 验证回调
    );

    // 添加轮播图设置字段
    add_settings_field(
        'geek_carousel',        // 字段ID
        '主轮播图设置',         // 标题
        'geek_carousel_callback', // 回调
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

// 在geek_admin_settings_init函数内部添加轮播图设置

/**
 * 轮播图设置字段回调
 */
function geek_carousel_callback() {
    // 获取当前轮播图数据
    $carousel_data = get_option('geek_carousel_data', array());
    
    echo '<div class="carousel-settings-container">';
    echo '<h3>轮播图管理</h3>';
    echo '<p>添加、编辑或删除轮播图图片。</p>';
    
    // 添加轮播图按钮
    echo '<button type="button" class="button button-primary add-carousel-item">添加轮播图</button>';
    
    // 轮播图列表容器
    echo '<div class="carousel-items-list" id="carousel-items-list">';
    
    // 渲染现有轮播图项
    if (!empty($carousel_data)) {
        foreach ($carousel_data as $index => $item) {
            render_carousel_item($index, $item);
        }
    } else {
        // 渲染一个空的轮播图项
        render_carousel_item(0, array(
            'image_url' => '',
            'title' => '',
            'description' => '',
            'button_text' => '',
            'button_link' => ''
        ));
    }
    
    echo '</div>';
    
    // 添加隐藏的输入字段来存储轮播图数量
    echo '<input type="hidden" id="carousel-item-count" name="carousel_item_count" value="' . count($carousel_data) . '">';
    
    // JavaScript 用于动态添加和删除轮播图项
    ?>   <script type="text/javascript">
    jQuery(document).ready(function($) {
        var itemCount = parseInt($('#carousel-item-count').val());
        
        // 添加轮播图项
        $('.add-carousel-item').click(function() {
            renderEmptyCarouselItem(itemCount);
            itemCount++;
            $('#carousel-item-count').val(itemCount);
        });
        
        // 删除轮播图项
        $(document).on('click', '.remove-carousel-item', function() {
            $(this).closest('.carousel-item-wrapper').remove();
            // 更新计数
            itemCount = $('.carousel-item-wrapper').length;
            $('#carousel-item-count').val(itemCount);
        });
        
        // 图片上传功能
        $(document).on('click', '.upload-carousel-image-button', function() {
            var button = $(this);
            var inputField = button.prev();
            var previewContainer = button.parent().find('.carousel-image-preview');
            
            var custom_uploader = wp.media({
                title: '选择轮播图',
                button: {
                    text: '使用此图片'
                },
                multiple: false
            })
            .on('select', function() {
                var attachment = custom_uploader.state().get('selection').first().toJSON();
                inputField.val(attachment.url);
                
                // 更新预览
                if (previewContainer.length > 0) {
                    previewContainer.find('img').attr('src', attachment.url);
                    previewContainer.show();
                } else {
                    button.parent().append('<div class="carousel-image-preview" style="margin-top: 10px;"><img src="' + attachment.url + '" style="max-width: 300px; max-height: 150px; object-fit: cover;" alt="轮播图预览"></div>');
                }
            })
            .open();
        });
        
        // 渲染空的轮播图项
        function renderEmptyCarouselItem(index) {
            var itemHtml = '<div class="carousel-item-wrapper" style="margin-top: 20px; padding: 15px; border: 1px solid #ddd; background: #f9f9f9;">';
            itemHtml += '<h4>轮播图 #' + (index + 1) + '</h4>';
            
            // 图片上传
            itemHtml += '<div style="margin-bottom: 10px;">';
            itemHtml += '<label>图片：</label><br>';
            itemHtml += '<input type="text" name="geek_carousel_data[' + index + '][image_url]" value="" class="regular-text" style="margin-bottom: 5px;">';
            itemHtml += '<button type="button" class="button upload-carousel-image-button">上传图片</button>';
            itemHtml += '</div>';
            
            // 标题
            itemHtml += '<div style="margin-bottom: 10px;">';
            itemHtml += '<label>标题：</label><br>';
            itemHtml += '<input type="text" name="geek_carousel_data[' + index + '][title]" value="" class="regular-text">';
            itemHtml += '</div>';
            
            // 描述
            itemHtml += '<div style="margin-bottom: 10px;">';
            itemHtml += '<label>描述：</label><br>';
            itemHtml += '<textarea name="geek_carousel_data[' + index + '][description]" rows="3" class="regular-text"></textarea>';
            itemHtml += '</div>';
            
            // 按钮文本
            itemHtml += '<div style="margin-bottom: 10px;">';
            itemHtml += '<label>按钮文本：</label><br>';
            itemHtml += '<input type="text" name="geek_carousel_data[' + index + '][button_text]" value="" class="regular-text">';
            itemHtml += '</div>';
            
            // 按钮链接
            itemHtml += '<div style="margin-bottom: 10px;">';
            itemHtml += '<label>按钮链接：</label><br>';
            itemHtml += '<input type="text" name="geek_carousel_data[' + index + '][button_link]" value="" class="regular-text">';
            itemHtml += '</div>';
            
            // 删除按钮
            itemHtml += '<button type="button" class="button button-secondary remove-carousel-item">删除</button>';
            itemHtml += '</div>';
            
            $('#carousel-items-list').append(itemHtml);
        }
    });
    </script>
    <?php
}

/**
 * 渲染单个轮播图项
 */
function render_carousel_item($index, $item) {
    echo '<div class="carousel-item-wrapper" style="margin-top: 20px; padding: 15px; border: 1px solid #ddd; background: #f9f9f9;">';
    echo '<h4>轮播图 #' . ($index + 1) . '</h4>';
    
    // 图片上传
    echo '<div style="margin-bottom: 10px;">';
    echo '<label>图片：</label><br>';
    echo '<input type="text" name="geek_carousel_data[' . $index . '][image_url]" value="' . esc_attr($item['image_url']) . '" class="regular-text" style="margin-bottom: 5px;">';
    echo '<button type="button" class="button upload-carousel-image-button">上传图片</button>';
    
    if (!empty($item['image_url'])) {
        echo '<div class="carousel-image-preview" style="margin-top: 10px;">';
        echo '<img src="' . esc_url($item['image_url']) . '" style="max-width: 300px; max-height: 150px; object-fit: cover;" alt="轮播图预览">';
        echo '</div>';
    }
    
    echo '</div>';
    
    // 标题
    echo '<div style="margin-bottom: 10px;">';
    echo '<label>标题：</label><br>';
    echo '<input type="text" name="geek_carousel_data[' . $index . '][title]" value="' . esc_attr($item['title']) . '" class="regular-text">';
    echo '</div>';
    
    // 描述
    echo '<div style="margin-bottom: 10px;">';
    echo '<label>描述：</label><br>';
    echo '<textarea name="geek_carousel_data[' . $index . '][description]" rows="3" class="regular-text">' . esc_textarea($item['description']) . '</textarea>';
    echo '</div>';
    
    // 按钮文本
    echo '<div style="margin-bottom: 10px;">';
    echo '<label>按钮文本：</label><br>';
    echo '<input type="text" name="geek_carousel_data[' . $index . '][button_text]" value="' . esc_attr($item['button_text']) . '" class="regular-text">';
    echo '</div>';
    
    // 按钮链接
    echo '<div style="margin-bottom: 10px;">';
    echo '<label>按钮链接：</label><br>';
    echo '<input type="text" name="geek_carousel_data[' . $index . '][button_link]" value="' . esc_attr($item['button_link']) . '" class="regular-text">';
    echo '</div>';
    
    // 删除按钮
    echo '<button type="button" class="button button-secondary remove-carousel-item">删除</button>';
    echo '</div>';
}

/**
 * 轮播图数据验证回调
 */
function geek_sanitize_carousel_data($input) {
    $sanitized_data = array();
    
    if (is_array($input)) {
        foreach ($input as $index => $item) {
            // 只保留有图片的轮播图项
            if (!empty($item['image_url'])) {
                $sanitized_data[] = array(
                    'image_url' => esc_url_raw($item['image_url']),
                    'title' => sanitize_text_field($item['title']),
                    'description' => sanitize_textarea_field($item['description']),
                    'button_text' => sanitize_text_field($item['button_text']),
                    'button_link' => esc_url_raw($item['button_link'])
                );
            }
        }
    }
    
    return $sanitized_data;
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
                } else {
                    $('.navbar-bg-image-upload-container').append('<div class="navbar-bg-image-preview" style="margin-top: 10px;"><img src="' + attachment.url + '" style="max-width: 300px; max-height: 100px; object-fit: cover;" alt="导航栏背景图片预览"></div>');
                }
            })
            .open();
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




