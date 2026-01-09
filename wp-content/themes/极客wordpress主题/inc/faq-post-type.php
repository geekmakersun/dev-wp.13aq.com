<?php

/**
 * FAQ自定义文章类型和分类法
 *
 * @package 极客wordpress主题
 */

// 防止直接访问该文件（安全规范）
if (! defined('ABSPATH')) {
    exit; // 退出程序
}

/**
 * 注册FAQ自定义文章类型
 */
function geek_register_faq_post_type()
{
    $labels = array(
        'name'                  => _x('常见问题', 'Post Type General Name', 'geek-theme'),
        'singular_name'         => _x('常见问题', 'Post Type Singular Name', 'geek-theme'),
        'menu_name'             => __('常见问题', 'geek-theme'),
        'name_admin_bar'        => __('常见问题', 'geek-theme'),
        'archives'              => __('常见问题归档', 'geek-theme'),
        'attributes'            => __('常见问题属性', 'geek-theme'),
        'parent_item_colon'     => __('父问题:', 'geek-theme'),
        'all_items'             => __('所有问题', 'geek-theme'),
        'add_new_item'          => __('添加新问题', 'geek-theme'),
        'add_new'               => __('添加问题', 'geek-theme'),
        'new_item'              => __('新问题', 'geek-theme'),
        'edit_item'             => __('编辑问题', 'geek-theme'),
        'update_item'           => __('更新问题', 'geek-theme'),
        'view_item'             => __('查看问题', 'geek-theme'),
        'view_items'            => __('查看问题', 'geek-theme'),
        'search_items'          => __('搜索问题', 'geek-theme'),
        'not_found'             => __('未找到', 'geek-theme'),
        'not_found_in_trash'    => __('回收站中未找到', 'geek-theme'),
        'featured_image'        => __('问题图片', 'geek-theme'),
        'set_featured_image'    => __('设置问题图片', 'geek-theme'),
        'remove_featured_image' => __('删除问题图片', 'geek-theme'),
        'use_featured_image'    => __('使用作为问题图片', 'geek-theme'),
        'insert_into_item'      => __('插入到问题', 'geek-theme'),
        'uploaded_to_this_item' => __('上传到这个问题', 'geek-theme'),
        'items_list'            => __('问题列表', 'geek-theme'),
        'items_list_navigation' => __('问题列表导航', 'geek-theme'),
        'filter_items_list'     => __('过滤问题列表', 'geek-theme'),
    );

    $args = array(
        'label'                 => __('常见问题', 'geek-theme'),
        'description'           => __('常见问题管理', 'geek-theme'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields'),
        'taxonomies'            => array('faq_category'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-editor-help',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'rewrite'               => array('slug' => 'faq'),
    );

    register_post_type('faq', $args);
}
add_action('init', 'geek_register_faq_post_type', 0);

/**
 * 注册FAQ分类法
 */
function geek_register_faq_taxonomy()
{
    $labels = array(
        'name'                  => _x('问题分类', 'Taxonomy General Name', 'geek-theme'),
        'singular_name'         => _x('问题分类', 'Taxonomy Singular Name', 'geek-theme'),
        'menu_name'             => __('问题分类', 'geek-theme'),
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
        'rewrite'               => array('slug' => 'faq-category'),
    );

    register_taxonomy('faq_category', array('faq'), $args);
}
add_action('init', 'geek_register_faq_taxonomy', 0);

/**
 * 获取FAQ列表
 *
 * @param int $count FAQ数量
 * @param string $category 分类别名
 * @return WP_Query FAQ查询对象
 */
function geek_get_faqs($count = -1, $category = '') {
    $args = array(
        'post_type' => 'faq',
        'posts_per_page' => $count,
        'orderby' => 'date',
        'order' => 'DESC'
    );
    
    if (!empty($category)) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'faq_category',
                'field' => 'slug',
                'terms' => $category
            )
        );
    }
    
    return new WP_Query($args);
}

/**
 * 渲染FAQ手风琴组件
 *
 * @param array $args FAQ展示参数
 * @return void
 */
function geek_render_faq_accordion($args = array()) {
    // 默认参数
    $defaults = array(
        'count' => -1, // FAQ数量，-1表示全部
        'category' => '', // 分类别名
        'title' => '常见问题', // 标题
        'container_class' => 'faq-accordion', // 容器类
        'accordion_id' => 'faqAccordion', // 手风琴ID
    );
    
    // 合并参数
    $args = wp_parse_args($args, $defaults);
    
    $faqs = geek_get_faqs($args['count'], $args['category']);
    
    if (!$faqs->have_posts()) {
        return;
    }
    ?>
    <!-- FAQ手风琴 -->
    <div class="<?php echo esc_attr($args['container_class']); ?>">
        <?php if (!empty($args['title'])) : ?>
            <h2 class="sec-title-style3 fw-medium mb-4"><?php echo esc_html($args['title']); ?></h2>
        <?php endif; ?>
        
        <div class="vs-accordion accordion" id="<?php echo esc_attr($args['accordion_id']); ?>">
            <?php $i = 1; while ($faqs->have_posts()) : $faqs->the_post(); ?>
                <div class="accordion-item">
                    <div class="accordion-header" id="accordion<?php echo $i; ?>" style="padding: 0 20px; box-sizing: border-box;">
                        <button class="accordion-button <?php echo $i > 1 ? 'collapsed' : ''; ?>" type="button" 
                                data-bs-toggle="collapse" 
                                data-bs-target="#collapse<?php echo $i; ?>" 
                                aria-expanded="<?php echo $i === 1 ? 'true' : 'false'; ?>" 
                                aria-controls="collapse<?php echo $i; ?>"
                                style="padding: 30px 20px; margin: 0 -20px; width: calc(100% + 40px); box-sizing: border-box;">
                            <?php the_title(); ?>
                        </button>
                    </div>
                    <div id="collapse<?php echo $i; ?>" 
                         class="accordion-collapse collapse <?php echo $i === 1 ? 'show' : ''; ?>" 
                         aria-labelledby="accordion<?php echo $i; ?>" 
                         data-bs-parent="#<?php echo esc_attr($args['accordion_id']); ?>">
                        <div class="accordion-body">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            <?php $i++; endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </div>
    </div>
    <?php
}

/**
 * 在FAQ列表中添加缩略图列
 *
 * @param array $columns 现有列
 * @return array 更新后的列
 */
function geek_add_faq_thumbnail_column($columns) {
    // 在标题前添加缩略图列
    $new_columns = array();
    foreach ($columns as $key => $value) {
        if ($key === 'title') {
            $new_columns['thumbnail'] = __('问题图片', 'geek-theme');
        }
        $new_columns[$key] = $value;
    }
    return $new_columns;
}
add_filter('manage_faq_posts_columns', 'geek_add_faq_thumbnail_column');

/**
 * 显示FAQ缩略图列内容
 *
 * @param string $column 列名
 * @param int $post_id FAQ ID
 */
function geek_display_faq_thumbnail_column($column, $post_id) {
    if ($column === 'thumbnail') {
        if (has_post_thumbnail($post_id)) {
            echo get_the_post_thumbnail($post_id, 'thumbnail', array('style' => 'max-width: 60px; height: auto;'));
        } else {
            echo '<span class="dashicons dashicons-format-image" style="color: #ccc;"></span>';
        }
    }
}
add_action('manage_faq_posts_custom_column', 'geek_display_faq_thumbnail_column', 10, 2);
