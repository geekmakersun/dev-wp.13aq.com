<?php

/**
 * 加载主题样式和脚本
 */
function geek_theme_scripts()
{
    // 从vendor目录加载jQuery
    wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/vendor/jquery/jquery.min.js', array(), '3.7.1', true);

    // 从vendor目录加载Bootstrap CSS
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/vendor/bootstrap/css/bootstrap.min.css', array(), '5.3.8');

    // 从vendor目录加载Bootstrap Icon CSS
    wp_enqueue_style('bootstrap-icon-css', get_template_directory_uri() . '/assets/vendor/bootstrap-icons/bootstrap-icons.min.css', array(), '1.13.1');

    // 加载header.min.css（新增代码）
    wp_enqueue_style(
        'geek-header-style', // 唯一标识，避免和其他样式冲突
        get_template_directory_uri() . '/assets/css/header.min.css', // 你的CSS文件路径
        array('bootstrap-css'), // 依赖：先加载Bootstrap再加载这个样式（可选，推荐加）
        '1.0.0', // 版本号，可根据实际情况修改
        'all' // 适配所有设备
    );

    // 从vendor目录加载Bootstrap JS
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/vendor/bootstrap/js/bootstrap.bundle.min.js', array('jquery'), '5.3.0', true);

    // 加载header.min.js（新增代码）
    wp_enqueue_script(
        'geek-header-script', // 唯一标识，避免和其他脚本冲突
        get_template_directory_uri() . '/assets/js/header.js', // 你的JS文件路径
        array('jquery'), // 依赖：先加载jQuery再加载这个脚本（可选，推荐加）
        '1.0.0', // 版本号，可根据实际情况修改
        true // 在页脚加载脚本（可选，推荐加）
    );
}
add_action('wp_enqueue_scripts', 'geek_theme_scripts');
