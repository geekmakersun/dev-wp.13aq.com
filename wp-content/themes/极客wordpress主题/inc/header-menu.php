<?php

/**
 * 头部菜单功能
 *
 * 处理主题的头部导航菜单相关功能
 *
 * @package 极客wordpress主题
 */

/**
 * 注册头部菜单位置
 */
function geek_theme_register_menus()
{
    register_nav_menus(array(
        'header-menu' => __('顶部菜单', 'geek-wp-theme'),
    ));
}
add_action('after_setup_theme', 'geek_theme_register_menus');

/**
 * 为菜单项添加自定义类
 *
 * @param array $classes 菜单项当前类数组
 * @param object $item 菜单项对象
 * @param array $args 菜单参数
 * @param int $depth 菜单深度
 * @return array 更新后的菜单项类数组
 */
function geek_theme_add_li_class($classes, $item, $args, $depth)
{
    if (isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }

    // 为有子菜单的项添加 dropdown 类
    if (in_array('menu-item-has-children', $classes)) {
        $classes[] = 'dropdown';
    }

    return $classes;
}
add_filter('nav_menu_css_class', 'geek_theme_add_li_class', 10, 4);

/**
 * 为子菜单添加自定义类
 *
 * @param string $classes 子菜单当前类
 * @param object $args 菜单参数
 * @param int $depth 菜单深度
 * @return string 更新后的子菜单类
 */
function geek_theme_add_submenu_class($classes, $args, $depth)
{
    // 为子菜单添加 Bootstrap 5 的 dropdown-menu 类
    $classes[] = 'dropdown-menu';
    return $classes;
}
add_filter('nav_menu_submenu_css_class', 'geek_theme_add_submenu_class', 10, 3);

/**
 * 更新菜单项链接类，根据深度添加正确的类
 *
 * @param array $atts 链接属性数组
 * @param object $item 菜单项对象
 * @param array $args 菜单参数
 * @param int $depth 菜单深度
 * @return array 更新后的链接属性数组
 */
function geek_theme_update_link_class($atts, $item, $args, $depth)
{
    // 重置类属性
    $atts['class'] = '';

    // 根据深度设置不同的类
    if ($depth === 0) {
        if (in_array('menu-item-has-children', $item->classes)) {
            $atts['class'] = 'nav-link dropdown-toggle';
            $atts['role'] = 'button';
            $atts['data-bs-toggle'] = 'dropdown';
            $atts['aria-expanded'] = 'false';
        } else {
            $atts['class'] = 'nav-link';
        }
    } else {
        $atts['class'] = 'dropdown-item';
    }

    return $atts;
}
add_filter('nav_menu_link_attributes', 'geek_theme_update_link_class', 10, 4);

/**
 * 输出头部菜单
 *
 * @param array $args 菜单参数
 */
function geek_theme_output_header_menu($args = array())
{
    // 默认菜单参数
    $default_args = array(
        'theme_location'    => 'header-menu',
        'depth'             => 2,
        'container'         => false,
        'menu_class'        => 'navbar-nav',
        'fallback_cb'       => '__return_false',
        'add_li_class'      => 'nav-item',
        'link_class'        => 'nav-link'
    );

    // 合并用户参数和默认参数
    $merged_args = wp_parse_args($args, $default_args);

    // 输出菜单
    wp_nav_menu($merged_args);
}
