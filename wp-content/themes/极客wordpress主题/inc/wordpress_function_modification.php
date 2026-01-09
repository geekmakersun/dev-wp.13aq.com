<?php

/**
 * WordPress函数修改
 *
 * 对WordPress核心函数进行修改，以符合主题需求
 *
 * @package 极客wordpress主题
 */

/**
 * 优化WordPress媒体库上传路径
 * 
 * @description 设置标准的媒体上传路径，避免路径配置问题
 * @since 1.0.0
 */
function optimize_media_upload_path()
{
    $upload_path = get_option('upload_path');

    // 如果是默认路径或未设置，则设置为标准路径
    if ($upload_path === 'wp-content/uploads' || $upload_path === null || $upload_path === '') {
        update_option('upload_path', WP_CONTENT_DIR . '/uploads');
    }
}
add_action('after_setup_theme', 'optimize_media_upload_path');

// 启用特色图片（文章/页面的缩略图功能）
add_theme_support('post-thumbnails');

/**
 * 渲染订阅弹窗
 *
 * 根据后台设置决定是否显示订阅弹窗
 */
function geek_render_newsletter_popup() {
    // 获取主题设置
    $geek_settings = get_option('geek_theme_general');
    $is_enabled = isset($geek_settings['newsletter_popup']) ? $geek_settings['newsletter_popup'] : '1';
    
    // 如果禁用了订阅弹窗，则不渲染
    if ($is_enabled !== '1') {
        return;
    }
    
    // 渲染订阅弹窗HTML
    ?>
    <div class="popup-newsletter-active popup-newsletter-wrap show"> 
        <div class="popup-newsletter"> 
            <button class="popup-newsletter-closer"><i class="fal fa-times"></i></button> 
            <div class="newsletter-img"> 
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/banner/popup-banner-1.jpg" alt="横幅"> 
            </div> 
            <div class="newsletter-content"> 
                <span class="newsletter-subtitle">新闻订阅</span> 
                <h2 class="newsletter-title h3">率先了解</h2> 
                <p class="newsletter-text">注册邮箱获取我们的最新更新</p> 
                <input type="text" class="form-control" placeholder="您的邮箱地址"> 
                <button class="vs-btn style7">立即订阅</button> 
            </div> 
        </div> 
    </div>
    <?php
}

/**
 * 生成面包屑导航
 *
 * @return string 面包屑HTML
 */
function geek_get_breadcrumb() {
    $html = '';
    
    // 开始面包屑容器
    $html .= '<div class="breadcumb-wrapper" data-bg-src="' . get_template_directory_uri() . '/assets/img/breadcumb/bredcumb-1.png">';
    $html .= '<div class="container z-index-common">';
    
    // 页面标题
    $html .= '<div class="breadcumb-content">';
    $html .= '<h1 class="breadcumb-title">' . get_the_title() . '</h1>';
    $html .= '</div>';
    
    // 面包屑导航链接
    $html .= '<div class="breadcumb-menu-wrap">';
    $html .= '<ul class="breadcumb-menu">';
    
    // 首页链接
    $html .= '<li><a href="' . home_url() . '">首页</a></li>';
    
    // 当前页面链接
    $html .= '<li class="active">' . get_the_title() . '</li>';
    
    $html .= '</ul>';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</div>';
    
    return $html;
}