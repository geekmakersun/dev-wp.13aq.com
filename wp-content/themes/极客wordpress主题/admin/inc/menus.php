<?php
/**
 * 后台菜单注册
 *
 * 注册主题后台管理菜单
 *
 * @package 极客wordpress主题
 */

/**
 * 注册后台菜单
 */
function geek_admin_register_menus() {
    // 添加主菜单（精简版）
    add_menu_page(
        '主题设置',           // 页面标题
        '主题设置',           // 菜单标题
        'manage_options',     // 权限
        'geek-theme-options', // 菜单slug
        'geek_admin_options_page', // 回调函数
        'dashicons-admin-settings', // 图标
        60                   // 位置
    );
}
add_action('admin_menu', 'geek_admin_register_menus');

/**
 * 主选项页面回调
 */
function geek_admin_options_page() {
    require_once __DIR__ . '/../views/options-page.php';
}
