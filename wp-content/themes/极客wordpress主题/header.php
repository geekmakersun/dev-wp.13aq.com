<?php

/**
 * 头部模板
 *
 * 包含HTML头部、导航栏等
 *
 * @package 极客wordpress主题
 */

// 获取主题设置
$geek_settings = get_option('geek_theme_general');
$site_name = isset($geek_settings['site_name']) ? $geek_settings['site_name'] : get_bloginfo('name');
$logo_url = isset($geek_settings['logo']) ? $geek_settings['logo'] : '';
$navbar_bg_color = isset($geek_settings['navbar_bg_color']) ? $geek_settings['navbar_bg_color'] : '#ffffff';
$navbar_bg_image = isset($geek_settings['navbar_bg_image']) ? $geek_settings['navbar_bg_image'] : '';

// 生成navbar样式
$navbar_style = 'background-color: ' . $navbar_bg_color . ';';
if (!empty($navbar_bg_image)) {
    $navbar_style .= ' background-image: url(' . esc_url($navbar_bg_image) . ');';
    $navbar_style .= ' background-size: cover;';
    $navbar_style .= ' background-position: center;';
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo esc_html($site_name); ?> - <?php bloginfo('description'); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- 头部 -->
    <header id="mainHeader" class="mainHeader position-relative">
        <nav class="position-fixed navbar navbar-expand-lg navbar-light w-100 shadow-sm" style="<?php echo esc_attr($navbar_style); ?>">
            <div class="container">
                <!-- Logo -->
                <a class="navbar-brand" href="<?php echo home_url(); ?>" title="<?php echo esc_attr($site_name); ?>">
                    <?php if (!empty($logo_url)) : ?>
                        <img alt="<?php echo esc_attr($site_name); ?>" class="h-10" src="<?php echo esc_url($logo_url); ?>" title="<?php echo esc_attr($site_name); ?>">
                    <?php else : ?>
                        <span><?php echo esc_html($site_name); ?></span>
                    <?php endif; ?>
                </a>

                <!-- 移动端菜单按钮 -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#headerMenu" aria-controls="mainNavbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- 导航菜单 -->
                <div class="collapse navbar-collapse justify-content-center" id="headerMenu">
                    <?php
                    // 调用导航菜单
                    geek_theme_output_header_menu();
                    ?>
                </div>

                <!-- 右侧功能区 -->
                <div class="d-flex align-items-center gap-3">
                    <!-- 搜索按钮 -->
                    <div  data-modal-target="mainSearch" data-modal-toggle="mainSearch" class="">
                       <i class="bi bi-search"></i>
                    </div>

                    <!-- 语言切换 -->
                    <a href="http://www.ZhiShengsa.com/" class="d-flex align-items-center">
                        <img alt="网站语言按钮" src="http://www.startgate.com.cn/static/zhisheng/icon/网站语言按钮.png?v1" class="h-6">
                    </a>
                </div>
            </div>
        </nav>
    </header>


    <!-- 主要内容容器 -->
    <div id="content" class="site-content">