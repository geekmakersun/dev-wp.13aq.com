<?php
/**
 * 后台管理初始化
 *
 * @package 极客wordpress主题
 */

/**
 * 后台管理初始化
 */
function geek_theme_admin_init()
{
    require_once get_template_directory() . '/admin/init.php';
}
add_action('after_setup_theme', 'geek_theme_admin_init');