<?php
/**
 * 头部模板
 *
 * 包含HTML头部、导航栏等
 *
 * @package 极客wordpress主题
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    
    <!-- 头部 -->
    <header id="masthead" class="site-header">
        <!-- 导航栏 -->
        <nav class="uk-navbar-container" uk-navbar>
            <div class="uk-container">
                <div class="uk-navbar-left">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="uk-navbar-item uk-logo uk-text-primary">
                        <span uk-icon="icon: book; ratio: 1.5"></span>
                        <span class="uk-margin-small-left uk-text-large"><?php bloginfo( 'name' ); ?></span>
                    </a>
                    <ul class="uk-navbar-nav uk-visible@m">
                        <li <?php if ( is_front_page() ) echo 'class="uk-active"'; ?>><a href="<?php echo esc_url( home_url( '/' ) ); ?>">首页</a></li>
                        <li><a href="#features">特性</a></li>
                        <li><a href="#plugins">插件</a></li>
                        <li><a href="#themes">主题</a></li>
                        <li><a href="#docs">文档</a></li>
                    </ul>
                </div>
                <div class="uk-navbar-right">
                    <div class="uk-navbar-item">
                        <div uk-search="target: .uk-search-input; animation: uk-animation-fade; duration: 200;">
                            <input class="uk-search-input" type="search" placeholder="搜索...">
                        </div>
                    </div>
                    <a class="uk-navbar-toggle uk-hidden@m" uk-toggle="target: #mobile-menu" uk-navbar-toggle-icon></a>
                </div>
            </div>
        </nav>
        
        <!-- 移动端菜单 -->
        <div id="mobile-menu" uk-offcanvas="flip: true; overlay: true;">
            <div class="uk-offcanvas-bar">
                <button class="uk-offcanvas-close" type="button" uk-close></button>
                <ul class="uk-nav uk-nav-primary uk-nav-center uk-margin-auto-vertical">
                    <li <?php if ( is_front_page() ) echo 'class="uk-active"'; ?>><a href="<?php echo esc_url( home_url( '/' ) ); ?>">首页</a></li>
                    <li><a href="#features">特性</a></li>
                    <li><a href="#plugins">插件</a></li>
                    <li><a href="#themes">主题</a></li>
                    <li><a href="#docs">文档</a></li>
                </ul>
            </div>
        </div>
    </header>
    
    <!-- 主要内容容器 -->
    <div id="content" class="site-content">
