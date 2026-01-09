<?php

/**
 * 头部模板
 *
 * 包含HTML头部、导航栏等
 *
 * @package 极客wordpress主题
 */

// 防止直接访问该文件（安全规范）
if ( ! defined( 'ABSPATH' ) ) {
    exit; // 退出程序
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php wp_title(' - ', true, 'right'); ?><?php bloginfo('name'); ?></title>
    <meta name="author" content="<?php bloginfo('name'); ?>">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name="keywords" content="<?php bloginfo('name'); ?>" />
    <meta name="robots" content="INDEX,FOLLOW">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- 站点图标 - 通过WordPress后台设置 -->
    <?php wp_site_icon(); ?>

    <!--==============================
	 All CSS File
============================== -->
    <!-- Layerslider皮肤CSS重定向 -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/layerslider/skins/v6/skin.css">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!--[if lte IE 9]>
    	<p class="browserupgrade">您正在使用一个 <strong>过时</strong> 的浏览器。请 <a href="https://browsehappy.com/">升级您的浏览器</a> 以提高您的体验和安全性。</p>
  <![endif]-->

    <!--==============================
     预加载器
  ==============================-->
    <div class="preloader  ">
        <button class="vs-btn preloaderCls">取消预加载 </button>
        <div class="preloader-inner">
            <?php $geek_settings = get_option('geek_theme_general'); ?>
            <?php $logo_url = isset($geek_settings['logo']) ? $geek_settings['logo'] : get_template_directory_uri() . '/assets/img/logo.png'; ?>
            <?php $attachment_id = attachment_url_to_postid($logo_url); ?>
            <?php if ($attachment_id) : ?>
                <?php $logo_data = wp_get_attachment_image_src($attachment_id, array(200, 100)); // 限制尺寸为200x100 ?>
                <img src="<?php echo esc_url($logo_data[0]); ?>" alt="<?php bloginfo('name'); ?>" width="<?php echo $logo_data[1]; ?>" height="<?php echo $logo_data[2]; ?>">
            <?php else : ?>
                <img src="<?php echo esc_url($logo_url); ?>" alt="<?php bloginfo('name'); ?>" style="max-width: 200px; max-height: 100px;">
            <?php endif; ?>
            <span class="loader"></span>
        </div>
    </div>
    <?php geek_render_newsletter_popup(); ?>
    <!--==============================
    Mobile Menu
  ============================== -->
    <div class="vs-menu-wrapper">
        <div class="vs-menu-area text-center">
            <button class="vs-menu-toggle"><i class="fal fa-times"></i></button>
            <div class="mobile-logo">
                <a href="<?php echo home_url(); ?>">
                    <?php $geek_settings = get_option('geek_theme_general'); ?>
                    <?php $logo_url = isset($geek_settings['logo']) ? $geek_settings['logo'] : get_template_directory_uri() . '/assets/img/logo-mobile.png'; ?>
                    <?php $attachment_id = attachment_url_to_postid($logo_url); ?>
                    <?php if ($attachment_id) : ?>
                        <?php $logo_data = wp_get_attachment_image_src($attachment_id, array(150, 75)); // 限制尺寸为150x75 ?>
                        <img src="<?php echo esc_url($logo_data[0]); ?>" alt="<?php bloginfo('name'); ?>" width="<?php echo $logo_data[1]; ?>" height="<?php echo $logo_data[2]; ?>">
                    <?php else : ?>
                        <img src="<?php echo esc_url($logo_url); ?>" alt="<?php bloginfo('name'); ?>" style="max-width: 150px; max-height: 75px;">
                    <?php endif; ?>
                </a>
            </div>
            <div class="mobile-menu">
                <?php
                    $mobile_menu_args = array(
                        'theme_location'    => 'header-menu',
                        'depth'             => 2,
                        'container'         => false,
                        'menu_class'        => '',
                        'fallback_cb'       => '__return_false',
                        'add_li_class'      => '',
                        'link_class'        => ''
                    );
                    wp_nav_menu($mobile_menu_args);
                ?>
            </div>
        </div>
    </div>
    <!--==============================
        Header Area
    ==============================-->
    <header class="vs-header header-layout2">
        <div class="header-top-notice">今日特惠 <b>7折</b>。结束于
            <div class="notice-counter d-inline-block" data-offer-date="12/08/2023">
                <b><span class="day"></span>天 :</b>
                <b><span class="hour"></span>时 :</b>
                <b><span class="minute"></span>分 :</b>
                <b><span class="seconds"></span>秒</b>
            </div>
            赶快行动 <i class="far fa-long-arrow-alt-right"></i>
        </div>
        <div class="container">
            <div class="menu-top">
                <div class="row align-items-center justify-content-center justify-content-md-between gx-80">
                    <div class="col-auto">
                        <div class="row gx-50">
                            <div class="col-auto">
                                <div class="header-info">
                                    <div class="header-info_icon">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/call-icon.png" alt="图标">
                                    </div>
                                    <div class="media-body">
                                        <div class="header-info_link"><a href="tel:+1234567890" class="text-inherit">+123 456789 0</a></div>
                                        <span class="header-info_label">免费致电我们</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="header-info">
                                    <div class="header-info_icon">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/mail-icon.png" alt="图标">
                                    </div>
                                    <div class="media-body">
                                        <div class="header-info_link">免费配送</div>
                                        <span class="header-info_label">订单满$300.0</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm mt-20 mt-md-0">
                        <form action="#" class="header-form">
                            <input type="text" placeholder="产品搜索">
                            <button type="button">搜索</button>
                            <i class="far fa-search"></i>
                        </form>
                    </div>
                    <div class="col-auto  d-none d-lg-block">
                        <div class="header-top-links">
                            <ul>
                                <li>
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false">语言</a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                        <li>
                                            <a href="#">德语</a>
                                            <a href="#">法语</a>
                                            <a href="#">意大利语</a>
                                            <a href="#">拉脱维亚语</a>
                                            <a href="#">西班牙语</a>
                                            <a href="#">希腊语</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink2" data-bs-toggle="dropdown" aria-expanded="false">货币</a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink2">
                                        <li><a href="#">阿联酋迪拉姆</a></li>
                                        <li><a href="#">孟加拉塔卡</a></li>
                                        <li><a href="#">厄立特里亚纳克法</a></li>
                                        <li><a href="#">埃及镑</a></li>
                                        <li><a href="#">欧元</a></li>
                                        <li><a href="#">英镑</a></li>
                                        <li><a href="#">美元</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sticky-wrapper">
            <div class="sticky-active">
                <div class="container">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-4 col-sm-auto">
                            <div class="header-logo py-4 py-lg-0">
                                <a href="<?php echo home_url(); ?>">
                                    <?php $geek_settings = get_option('geek_theme_general'); ?>
                                    <?php $logo_url = isset($geek_settings['logo']) ? $geek_settings['logo'] : get_template_directory_uri() . '/assets/img/logo.png'; ?>
                                    <?php $attachment_id = attachment_url_to_postid($logo_url); ?>
                                    <?php if ($attachment_id) : ?>
                                        <?php $logo_data = wp_get_attachment_image_src($attachment_id, array(200, 100)); // 限制尺寸为200x100 ?>
                                        <img src="<?php echo esc_url($logo_data[0]); ?>" alt="<?php bloginfo('name'); ?>" width="<?php echo $logo_data[1]; ?>" height="<?php echo $logo_data[2]; ?>">
                                    <?php else : ?>
                                        <img src="<?php echo esc_url($logo_url); ?>" alt="<?php bloginfo('name'); ?>" style="max-width: 200px; max-height: 100px;">
                                    <?php endif; ?>
                                </a>
                            </div>
                        </div>
                        <div class="col-auto ms-md-auto ms-lg-0">
                            <nav class="main-menu menu-style2 d-none d-lg-block">
                                <?php
                                    $menu_args = array(
                                        'theme_location'    => 'header-menu',
                                        'depth'             => 2,
                                        'container'         => false,
                                        'menu_class'        => '',
                                        'fallback_cb'       => '__return_false',
                                        'add_li_class'      => '',
                                        'link_class'        => ''
                                    );
                                    wp_nav_menu($menu_args);
                                ?>
                            </nav>
                        </div>
                        <div class="col-auto">
                            <div class="header-buttons">
                                <a href="<?php echo home_url(); ?>/login"><i class="fal fa-user"></i></a>
                                <a href="#" class="has-badge"><i class="fal fa-heart"></i><span class="badge">0</span></a>
                                <div class="header-cart">
                                    <a href="<?php echo home_url(); ?>/cart" class="has-badge"><i class="fal fa-shopping-bag"></i><span class="badge">0</span></a>
                                    <div class="woocommerce widget_shopping_cart">
                                        <div class="widget_shopping_cart_content">
                                            <ul class="cart_list">
                                                <li class="mini_cart_item">
                                                    <a href="#" class="remove"><i class="far fa-times"></i></a>
                                                    <a href="<?php echo home_url(); ?>/shop-details" class="img"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/cart/cat-img-1.jpg" alt="购物车图片"></a>
                                                    <a href="<?php echo home_url(); ?>/shop-details" class="product-title">智能手表</a>
                                                    <span class="amount">$99.00</span>
                                                    <div class="quantity">
                                                        <button class="quantity-minus qut-btn"><i class="far fa-minus"></i></button>
                                                        <input type="number" class="qty-input" value="1" min="1" max="99">
                                                        <button class="quantity-plus qut-btn"><i class="far fa-plus"></i></button>
                                                    </div>
                                                    <div class="subtotal">
                                                        <span>小计:</span>
                                                        <span class="amount">$99.00</span>
                                                    </div>
                                                </li>
                                                <li class="mini_cart_item">
                                                    <a href="#" class="remove"><i class="far fa-times"></i></a>
                                                    <a href="<?php echo home_url(); ?>/shop-details" class="img"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/cart/cat-img-2.jpg" alt="购物车图片"></a>
                                                    <a href="<?php echo home_url(); ?>/shop-details" class="product-title">老板椅</a>
                                                    <span class="amount">$80.00</span>
                                                    <div class="quantity">
                                                        <button class="quantity-minus qut-btn"><i class="far fa-minus"></i></button>
                                                        <input type="number" class="qty-input" value="2" min="1" max="99">
                                                        <button class="quantity-plus qut-btn"><i class="far fa-plus"></i></button>
                                                    </div>
                                                    <div class="subtotal">
                                                        <span>小计:</span>
                                                        <span class="amount">$160.00</span>
                                                    </div>
                                                </li>
                                            </ul>
                                            <p class="total">
                                                <strong>小计:</strong>
                                                <span class="amount">$259.00</span>
                                            </p>
                                            <p class="buttons">
                                                <a href="<?php echo home_url(); ?>/cart" class="vs-btn">查看购物车</a>
                                                <a href="<?php echo home_url(); ?>/checkout" class="vs-btn checkout">结账</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto d-block d-lg-none">
                            <button class="vs-menu-toggle d-inline-block d-lg-none"><i class="fal fa-bars"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- 主要内容容器 -->
    <div id="content" class="site-content">