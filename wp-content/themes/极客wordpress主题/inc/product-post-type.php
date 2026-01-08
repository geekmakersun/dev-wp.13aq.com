<?php

/**
 * 产品自定义文章类型和分类法
 *
 * @package 极客wordpress主题
 */

// 防止直接访问该文件（安全规范）
if (! defined('ABSPATH')) {
    exit; // 退出程序
}

/**
 * 注册产品自定义文章类型
 */
function geek_register_product_post_type()
{
    $labels = array(
        'name'                  => _x('产品', 'Post Type General Name', 'geek-theme'),
        'singular_name'         => _x('产品', 'Post Type Singular Name', 'geek-theme'),
        'menu_name'             => __('产品', 'geek-theme'),
        'name_admin_bar'        => __('产品', 'geek-theme'),
        'archives'              => __('产品归档', 'geek-theme'),
        'attributes'            => __('产品属性', 'geek-theme'),
        'parent_item_colon'     => __('父产品:', 'geek-theme'),
        'all_items'             => __('所有产品', 'geek-theme'),
        'add_new_item'          => __('添加新产品', 'geek-theme'),
        'add_new'               => __('添加产品', 'geek-theme'),
        'new_item'              => __('新产品', 'geek-theme'),
        'edit_item'             => __('编辑产品', 'geek-theme'),
        'update_item'           => __('更新产品', 'geek-theme'),
        'view_item'             => __('查看产品', 'geek-theme'),
        'view_items'            => __('查看产品', 'geek-theme'),
        'search_items'          => __('搜索产品', 'geek-theme'),
        'not_found'             => __('未找到', 'geek-theme'),
        'not_found_in_trash'    => __('回收站中未找到', 'geek-theme'),
        'featured_image'        => __('产品图片', 'geek-theme'),
        'set_featured_image'    => __('设置产品图片', 'geek-theme'),
        'remove_featured_image' => __('删除产品图片', 'geek-theme'),
        'use_featured_image'    => __('使用作为产品图片', 'geek-theme'),
        'insert_into_item'      => __('插入到产品', 'geek-theme'),
        'uploaded_to_this_item' => __('上传到这个产品', 'geek-theme'),
        'items_list'            => __('产品列表', 'geek-theme'),
        'items_list_navigation' => __('产品列表导航', 'geek-theme'),
        'filter_items_list'     => __('过滤产品列表', 'geek-theme'),
    );

    $args = array(
        'label'                 => __('产品', 'geek-theme'),
        'description'           => __('产品管理', 'geek-theme'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'excerpt', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
        'taxonomies'            => array('product_category', 'post_tag'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-cart',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'rewrite'               => array('slug' => 'product'),
    );

    register_post_type('product', $args);
}
add_action('init', 'geek_register_product_post_type', 0);

/**
 * 注册产品分类法
 */
function geek_register_product_taxonomy()
{
    $labels = array(
        'name'                  => _x('产品分类', 'Taxonomy General Name', 'geek-theme'),
        'singular_name'         => _x('产品分类', 'Taxonomy Singular Name', 'geek-theme'),
        'menu_name'             => __('产品分类', 'geek-theme'),
        'all_items'             => __('所有分类', 'geek-theme'),
        'parent_item'           => __('父分类', 'geek-theme'),
        'parent_item_colon'     => __('父分类:', 'geek-theme'),
        'new_item_name'         => __('新分类名称', 'geek-theme'),
        'add_new_item'          => __('添加新分类', 'geek-theme'),
        'edit_item'             => __('编辑分类', 'geek-theme'),
        'update_item'           => __('更新分类', 'geek-theme'),
        'view_item'             => __('查看分类', 'geek-theme'),
        'separate_items_with_commas' => __('用逗号分隔分类', 'geek-theme'),
        'add_or_remove_items'   => __('添加或删除分类', 'geek-theme'),
        'choose_from_most_used' => __('从最常用的分类中选择', 'geek-theme'),
        'popular_items'         => __('热门分类', 'geek-theme'),
        'search_items'          => __('搜索分类', 'geek-theme'),
        'not_found'             => __('未找到', 'geek-theme'),
        'no_terms'              => __('没有分类', 'geek-theme'),
        'items_list'            => __('分类列表', 'geek-theme'),
        'items_list_navigation' => __('分类列表导航', 'geek-theme'),
    );

    $args = array(
        'labels'                => $labels,
        'hierarchical'          => true,
        'public'                => true,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'show_in_nav_menus'     => true,
        'show_tagcloud'         => true,
        'rewrite'               => array('slug' => 'product-category'),
    );

    register_taxonomy('product_category', array('product'), $args);
}
add_action('init', 'geek_register_product_taxonomy', 0);
