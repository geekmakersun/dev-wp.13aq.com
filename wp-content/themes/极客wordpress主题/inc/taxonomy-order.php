<?php

/**
 * 分类法排序功能
 *
 * 为产品分类添加排序支持，实现后台拖拽排序和前端有序显示
 *
 * @package 极客wordpress主题
 */

// 防止直接访问该文件（安全规范）
if (! defined('ABSPATH')) {
    exit; // 退出程序
}

/**
 * 为分类法添加排序功能
 *
 * @param string $taxonomy 分类法名称
 */
function geek_add_taxonomy_order($taxonomy) {
    // 添加排序字段到分类表单
    add_action("{$taxonomy}_add_form_fields", 'geek_taxonomy_order_add_field', 10, 2);
    add_action("{$taxonomy}_edit_form_fields", 'geek_taxonomy_order_edit_field', 10, 2);
    
    // 添加排序字段到快速编辑
    add_action('quick_edit_custom_box', 'geek_taxonomy_order_quick_edit_field', 10, 3);
    
    // 保存排序字段
    add_action("created_{$taxonomy}", 'geek_save_taxonomy_order_field', 10, 2);
    add_action("edited_{$taxonomy}", 'geek_save_taxonomy_order_field', 10, 2);
    
    // 添加排序列到分类列表
    add_filter("manage_edit-{$taxonomy}_columns", 'geek_taxonomy_order_column');
    add_filter("manage_{$taxonomy}_custom_column", 'geek_taxonomy_order_column_content', 10, 3);
    
    // 启用分类列表拖拽排序
    add_filter("manage_edit-{$taxonomy}_sortable_columns", 'geek_taxonomy_order_sortable_column');
    add_action('admin_footer', 'geek_taxonomy_order_admin_scripts');
    
    // 调整分类查询顺序
    add_filter('get_terms_args', 'geek_taxonomy_order_query', 10, 2);
}

/**
 * 添加分类排序字段（添加分类时）
 *
 * @param string $taxonomy 分类法名称
 */
function geek_taxonomy_order_add_field($taxonomy) {
    ?>  
    <div class="form-field">
        <label for="taxonomy_order">排序</label>
        <input type="number" id="taxonomy_order" name="taxonomy_order" value="0" min="0" step="1" />
        <p class="description">设置分类的排序优先级，数值越小越靠前</p>
    </div>
    <?php
}

/**
 * 编辑分类排序字段（编辑分类时）
 *
 * @param WP_Term $term 分类对象
 * @param string $taxonomy 分类法名称
 */
function geek_taxonomy_order_edit_field($term, $taxonomy) {
    $order = get_term_meta($term->term_id, 'taxonomy_order', true);
    // 如果没有设置排序值，默认为0
    if ($order === '') {
        $order = 0;
    }
    ?>  
    <tr class="form-field">
        <th scope="row" valign="top">
            <label for="taxonomy_order">排序</label>
        </th>
        <td>
            <input type="number" id="taxonomy_order" name="taxonomy_order" value="<?php echo esc_attr($order); ?>" min="0" step="1" />
            <p class="description">设置分类的排序优先级，数值越小越靠前</p>
        </td>
    </tr>
    <?php
}

/**
 * 保存分类排序字段
 *
 * @param int $term_id 分类ID
 * @param int $tt_id 分类术语ID
 */
function geek_save_taxonomy_order_field($term_id, $tt_id) {
    if (isset($_POST['taxonomy_order'])) {
        update_term_meta($term_id, 'taxonomy_order', intval($_POST['taxonomy_order']));
    }
}

/**
 * 保存快速编辑的分类排序
 */
function geek_save_taxonomy_order_quick_edit($term_id, $tt_id) {
    if (isset($_POST['taxonomy_order'])) {
        update_term_meta($term_id, 'taxonomy_order', intval($_POST['taxonomy_order']));
    }
}
add_action('edited_product_category', 'geek_save_taxonomy_order_quick_edit', 10, 2);

/**
 * 添加分类排序字段到快速编辑
 *
 * @param string $column_name 列名
 * @param string $post_type 文章类型
 * @param string $taxonomy 分类法
 */
function geek_taxonomy_order_quick_edit_field($column_name, $post_type, $taxonomy) {
    if ($column_name === 'taxonomy_order' && $taxonomy === 'product_category') {
        ?>
        <fieldset class="inline-edit-col-right">
            <div class="inline-edit-col">
                <label>
                    <span class="title">排序</span>
                    <span class="input-text-wrap">
                        <input type="number" name="taxonomy_order" class="taxonomy_order" value="" min="0" step="1" />
                    </span>
                </label>
            </div>
        </fieldset>
        <?php
    }
}

/**
 * 添加排序列到分类列表
 *
 * @param array $columns 现有列
 * @return array 更新后的列
 */
function geek_taxonomy_order_column($columns) {
    // 在名称列后添加排序列
    $new_columns = array();
    foreach ($columns as $key => $value) {
        $new_columns[$key] = $value;
        if ($key === 'name') {
            $new_columns['taxonomy_order'] = '排序';
        }
    }
    return $new_columns;
}

/**
 * 显示分类排序列内容
 *
 * @param string $content 列内容
 * @param string $column 列名
 * @param int $term_id 分类ID
 * @return string 更新后的列内容
 */
function geek_taxonomy_order_column_content($content, $column, $term_id) {
    if ($column === 'taxonomy_order') {
        $order = get_term_meta($term_id, 'taxonomy_order', true);
        return $order === '' ? '0' : intval($order);
    }
    return $content;
}

/**
 * 使排序列可排序
 *
 * @param array $columns 可排序列
 * @return array 更新后的可排序列
 */
function geek_taxonomy_order_sortable_column($columns) {
    $columns['taxonomy_order'] = 'taxonomy_order';
    return $columns;
}

/**
 * 添加分类排序管理脚本
 */
function geek_taxonomy_order_admin_scripts() {
    $current_screen = get_current_screen();
    if (!$current_screen || $current_screen->taxonomy !== 'product_category') {
        return;
    }
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            // 确保分类列表支持排序
            if (typeof postboxes !== 'undefined') {
                postboxes.add_postbox_toggles(pagenow);
            }
            
            // 快速编辑时填充排序值
            $(document).on('click', '.editinline', function() {
                var tr = $(this).parents('tr');
                var tag_id = tr.attr('id').replace('tag-', '');
                var taxonomy_order = tr.find('.column-taxonomy_order').text().trim();
                
                // 延迟执行，确保快速编辑表单已加载
                setTimeout(function() {
                    var editRow = $('#inline-edit').prev('.inline-edit-row');
                    var orderInput = editRow.find('input[name="taxonomy_order"]');
                    
                    if (orderInput.length) {
                        orderInput.val(taxonomy_order ? parseInt(taxonomy_order) : 0);
                    }
                }, 100);
            });
            
            // 排序功能提示
            console.log('分类排序功能已启用，可通过编辑分类时设置排序值调整显示顺序');
        });
    </script>
    <?php
}

/**
 * 调整分类查询顺序
 *
 * @param array $args 查询参数
 * @param array $taxonomies 分类法
 * @return array 更新后的查询参数
 */
function geek_taxonomy_order_query($args, $taxonomies) {
    // 只对产品分类生效
    if (in_array('product_category', $taxonomies)) {
        // 如果没有指定orderby，使用自定义排序
        if (!isset($args['orderby']) || $args['orderby'] === '') {
            $args['meta_key'] = 'taxonomy_order';
            $args['orderby'] = 'meta_value_num';
            $args['order'] = 'ASC';
        }
    }
    return $args;
}

/**
 * 获取指定排序的分类列表
 *
 * @param string $taxonomy 分类法名称
 * @param array $args 额外查询参数
 * @return array 分类列表
 */
function geek_get_ordered_terms($taxonomy = 'product_category', $args = array()) {
    $defaults = array(
        'meta_key' => 'taxonomy_order',
        'orderby' => 'meta_value_num',
        'order' => 'ASC',
        'hide_empty' => false
    );
    
    $args = wp_parse_args($args, $defaults);
    $args['taxonomy'] = $taxonomy;
    
    return get_terms($args);
}

/**
 * 初始化产品分类排序功能
 */
function geek_init_taxonomy_order() {
    // 为产品分类添加排序功能
    geek_add_taxonomy_order('product_category');
}
add_action('init', 'geek_init_taxonomy_order');
