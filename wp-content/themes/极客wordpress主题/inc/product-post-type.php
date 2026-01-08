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

/**
 * 获取产品列表
 *
 * @param int $count 产品数量
 * @return WP_Query 产品查询对象
 */
function geek_get_products($count = 4) {
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => $count,
        'orderby' => 'date',
        'order' => 'DESC'
    );
    return new WP_Query($args);
}

/**
 * 渲染产品列表
 *
 * @param array $args 产品展示参数
 * @return void
 */
function geek_render_products($args = array()) {
    // 默认参数
    $defaults = array(
        'count' => 4, // 产品数量
        'title' => '产品展示', // 标题
        'subtitle' => '我们的精选产品', // 副标题
        'columns' => 'col-md-6 col-lg-3', // 列数类
        'image_size' => 'medium', // 图片尺寸
        'image_height' => '200px', // 图片高度
        'show_excerpt' => true, // 是否显示摘要
        'show_view_more' => true, // 是否显示查看全部按钮
        'section_class' => 'products-section py-5 bg-light', // 区域类
        'container_class' => 'container', // 容器类
    );
    
    // 合并参数
    $args = wp_parse_args($args, $defaults);
    
    $products = geek_get_products($args['count']);
    
    if (!$products->have_posts()) {
        return;
    }
    ?>
    <!-- 产品列表 -->
    <section class="<?php echo esc_attr($args['section_class']); ?>">
        <div class="<?php echo esc_attr($args['container_class']); ?>">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h2 class="display-6 fw-bold"><?php echo esc_html($args['title']); ?></h2>
                    <?php if (!empty($args['subtitle'])) : ?>
                        <p class="lead text-muted"><?php echo esc_html($args['subtitle']); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="row g-4">
                <?php while ($products->have_posts()) : $products->the_post(); ?>
                    <div class="<?php echo esc_attr($args['columns']); ?>">
                        <div class="card h-100 shadow-sm transition-all duration-300 hover:shadow-lg">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="card-img-top overflow-hidden" style="height: <?php echo esc_attr($args['image_height']); ?>">
                                    <a href="<?php the_permalink(); ?>" class="d-block h-100">
                                        <?php the_post_thumbnail($args['image_size'], array('class' => 'w-100 h-100 object-cover transition-transform duration-500 hover:scale-105')); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            
                            <div class="card-body">
                                <h3 class="card-title h5 mb-2">
                                    <a href="<?php the_permalink(); ?>" class="text-dark text-decoration-none hover:text-primary transition-colors">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>
                                <?php if ($args['show_excerpt']) : ?>
                                    <div class="card-text text-muted mb-3">
                                        <?php the_excerpt(); ?>
                                    </div>
                                <?php endif; ?>
                                <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-sm">
                                    查看详情
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>
            
            <?php if ($args['show_view_more']) : ?>
                <div class="row mt-5 text-center">
                    <div class="col-12">
                        <a href="<?php echo esc_url(get_post_type_archive_link('product')); ?>" class="btn btn-outline-primary btn-lg">
                            查看全部产品
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <?php
}
