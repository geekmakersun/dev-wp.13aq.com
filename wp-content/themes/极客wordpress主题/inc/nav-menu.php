<?php
/**
 * 导航菜单功能
 *
 * 处理主题的导航菜单相关功能
 *
 * @package 极客wordpress主题
 */

/**
 * 注册自定义菜单位置
 */
function custom_theme_setup() {
    register_nav_menus( array(
        'header-menu' => __( '顶部菜单', 'geek-wp-theme' ),
        'footer-menu' => __( '页脚菜单', 'geek-wp-theme' ),
    ) );
}
add_action( 'after_setup_theme', 'custom_theme_setup' );

/**
 * 为导航菜单添加自定义类
 */
function geek_theme_nav_menu_args( $args ) {
    return $args;
}

/**
 * 为菜单项添加自定义类
 */
function geek_theme_add_li_class( $classes, $item, $args, $depth ) {
    if ( isset( $args->add_li_class ) ) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'geek_theme_add_li_class', 10, 4 );

/**
 * 为菜单项链接添加自定义类
 */
function geek_theme_add_link_class( $atts, $item, $args ) {
    if ( isset( $args->link_class ) ) {
        $atts['class'] = $args->link_class;
    }
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'geek_theme_add_link_class', 10, 3 );

/**
 * 处理下拉菜单样式
 */
function geek_theme_nav_menu_item_class( $classes, $item, $args, $depth ) {
    if ( $args->theme_location == 'header-menu' ) {
        if ( in_array( 'menu-item-has-children', $classes ) ) {
            $classes[] = 'dropdown';
        }
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'geek_theme_nav_menu_item_class', 15, 4 );

/**
 * 处理下拉菜单链接样式
 */
function geek_theme_nav_menu_link_class( $atts, $item, $args ) {
    if ( $args->theme_location == 'header-menu' ) {
        $item_classes = $item->classes;
        if ( in_array( 'menu-item-has-children', $item_classes ) ) {
            $atts['class'] = 'nav-link dropdown-toggle';
            $atts['role'] = 'button';
            $atts['data-bs-toggle'] = 'dropdown';
            $atts['aria-expanded'] = 'false';
        }
    }
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'geek_theme_nav_menu_link_class', 15, 3 );
