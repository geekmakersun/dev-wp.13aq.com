<?php
/**
 * 简单的WordPress首页测试脚本
 */

// 加载WordPress核心文件
define('WP_USE_THEMES', true);
require_once('wp-blog-header.php');

// 输出页面标题
echo 'Homepage Title: ' . get_bloginfo('name') . '<br>';
echo 'Homepage Description: ' . get_bloginfo('description') . '<br>';
echo 'WordPress Version: ' . get_bloginfo('version') . '<br>';

// 检查WooCommerce是否激活
if (class_exists('WooCommerce')) {
    echo 'WooCommerce is active<br>';
    echo 'WooCommerce Version: ' . WC()->version . '<br>';
}

// 检查产品分类
$product_categories = get_terms(array(
    'taxonomy' => 'product_cat',
    'hide_empty' => false,
    'number' => 5
));
echo 'Product Categories Found: ' . count($product_categories) . '<br>';

// 输出成功信息
echo '<br>Test completed successfully!';
