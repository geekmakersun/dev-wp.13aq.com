<?php

/**
 * 分类法图片字段功能
 *
 * 为产品分类添加图片字段支持，实现后台上传和前端调用
 *
 * @package 极客wordpress主题
 */

// 防止直接访问该文件（安全规范）
if (! defined('ABSPATH')) {
    exit; // 退出程序
}

/**
 * 为分类法添加图片字段
 *
 * @param string $taxonomy 分类法名称
 */
function geek_add_taxonomy_image_field($taxonomy) {
    // 添加图片上传字段
    add_action("{$taxonomy}_add_form_fields", 'geek_taxonomy_image_add_field', 10, 2);
    add_action("{$taxonomy}_edit_form_fields", 'geek_taxonomy_image_edit_field', 10, 2);
    
    // 保存图片字段
    add_action("created_{$taxonomy}", 'geek_save_taxonomy_image_field', 10, 2);
    add_action("edited_{$taxonomy}", 'geek_save_taxonomy_image_field', 10, 2);
    
    // 添加图片列到分类列表
    add_filter("manage_edit-{$taxonomy}_columns", 'geek_taxonomy_image_column');
    add_filter("manage_{$taxonomy}_custom_column", 'geek_taxonomy_image_column_content', 10, 3);
    
    // 确保媒体库支持分类法
    add_filter('attachment_fields_to_edit', 'geek_taxonomy_image_attachment_fields', 10, 2);
}

/**
 * 添加分类图片上传字段（添加分类时）
 *
 * @param string $taxonomy 分类法名称
 */
function geek_taxonomy_image_add_field($taxonomy) {
    ?>
    <div class="form-field">
        <label for="taxonomy_image">栏目图片</label>
        <input type="hidden" id="taxonomy_image" name="taxonomy_image" value="" />
        <div id="taxonomy_image_preview" style="margin-top: 10px;"></div>
        <button type="button" class="button button-secondary taxonomy_image_upload_button">上传图片</button>
        <button type="button" class="button button-secondary taxonomy_image_remove_button" style="display: none;">移除图片</button>
        <p class="description">上传分类的栏目图片，用于前端展示</p>
    </div>
    <?php
}

/**
 * 编辑分类图片字段（编辑分类时）
 *
 * @param WP_Term $term 分类对象
 * @param string $taxonomy 分类法名称
 */
function geek_taxonomy_image_edit_field($term, $taxonomy) {
    $image_id = get_term_meta($term->term_id, 'taxonomy_image', true);
    ?>  
    <tr class="form-field">
        <th scope="row" valign="top">
            <label for="taxonomy_image">栏目图片</label>
        </th>
        <td>
            <input type="hidden" id="taxonomy_image" name="taxonomy_image" value="<?php echo esc_attr($image_id); ?>" />
            <div id="taxonomy_image_preview" style="margin-bottom: 10px;">
                <?php if ($image_id) {
                    echo wp_get_attachment_image($image_id, 'thumbnail');
                } ?>
            </div>
            <button type="button" class="button button-secondary taxonomy_image_upload_button">上传图片</button>
            <button type="button" class="button button-secondary taxonomy_image_remove_button" <?php echo !$image_id ? 'style="display: none;"' : ''; ?>>移除图片</button>
            <p class="description">上传分类的栏目图片，用于前端展示</p>
        </td>
    </tr>
    <?php
}

/**
 * 保存分类图片字段
 *
 * @param int $term_id 分类ID
 * @param int $tt_id 分类术语ID
 */
function geek_save_taxonomy_image_field($term_id, $tt_id) {
    if (isset($_POST['taxonomy_image'])) {
        update_term_meta($term_id, 'taxonomy_image', intval($_POST['taxonomy_image']));
    }
}

/**
 * 添加图片列到分类列表
 *
 * @param array $columns 现有列
 * @return array 更新后的列
 */
function geek_taxonomy_image_column($columns) {
    $columns['taxonomy_image'] = '栏目图片';
    return $columns;
}

/**
 * 显示分类图片列内容
 *
 * @param string $content 列内容
 * @param string $column 列名
 * @param int $term_id 分类ID
 * @return string 更新后的列内容
 */
function geek_taxonomy_image_column_content($content, $column, $term_id) {
    if ($column === 'taxonomy_image') {
        $image_id = get_term_meta($term_id, 'taxonomy_image', true);
        if ($image_id) {
            return wp_get_attachment_image($image_id, 'thumbnail', false, array('style' => 'max-width: 50px; height: auto;'));
        }
        return '<span class="dashicons dashicons-format-image" style="color: #ccc;"></span>';
    }
    return $content;
}

/**
 * 添加媒体库支持分类法
 *
 * @param array $fields 附件字段
 * @param WP_Post $post 附件对象
 * @return array 更新后的附件字段
 */
function geek_taxonomy_image_attachment_fields($fields, $post) {
    return $fields;
}

/**
 * 为分类图片字段添加JavaScript
 */
function geek_taxonomy_image_field_scripts() {
    // 只有在分类编辑页面才加载脚本
    $current_screen = get_current_screen();
    if (!$current_screen || !in_array($current_screen->taxonomy, array('product_category'))) {
        return;
    }
    
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            // 上传图片按钮点击事件
            $(document).on('click', '.taxonomy_image_upload_button', function(e) {
                e.preventDefault();
                
                var button = $(this);
                var input = button.prevAll('input[type="hidden"]');
                var preview = button.prevAll('div[id$="preview"]');
                var removeButton = button.next('.taxonomy_image_remove_button');
                
                var customUploader = wp.media.uploader ? wp.media.uploader : wp.media({
                    title: '选择栏目图片',
                    button: {
                        text: '使用这张图片'
                    },
                    multiple: false
                });
                
                customUploader.on('select', function() {
                    var attachment = customUploader.state().get('selection').first().toJSON();
                    input.val(attachment.id);
                    preview.html('<img src="' + attachment.url + '" style="max-width: 200px; height: auto;" />');
                    removeButton.show();
                });
                
                customUploader.open();
            });
            
            // 移除图片按钮点击事件
            $(document).on('click', '.taxonomy_image_remove_button', function(e) {
                e.preventDefault();
                
                var button = $(this);
                var input = button.prevAll('input[type="hidden"]');
                var preview = button.prevAll('div[id$="preview"]');
                
                input.val('');
                preview.html('');
                button.hide();
            });
        });
    </script>
    <?php
}
add_action('admin_footer', 'geek_taxonomy_image_field_scripts');

/**
 * 获取分类图片URL
 *
 * @param int|WP_Term $term 分类ID或分类对象
 * @param string $size 图片尺寸
 * @return string|false 图片URL或false
 */
function geek_get_taxonomy_image($term, $size = 'full') {
    if (is_numeric($term)) {
        $term = get_term($term, 'product_category');
    }
    
    if (!is_a($term, 'WP_Term')) {
        return false;
    }
    
    $image_id = get_term_meta($term->term_id, 'taxonomy_image', true);
    
    if (!$image_id) {
        return false;
    }
    
    $image = wp_get_attachment_image_src($image_id, $size);
    
    return $image ? $image[0] : false;
}

/**
 * 获取分类图片HTML
 *
 * @param int|WP_Term $term 分类ID或分类对象
 * @param string $size 图片尺寸
 * @param array $attr 图片属性
 * @return string|false 图片HTML或false
 */
function geek_get_taxonomy_image_html($term, $size = 'full', $attr = array()) {
    if (is_numeric($term)) {
        $term = get_term($term, 'product_category');
    }
    
    if (!is_a($term, 'WP_Term')) {
        return false;
    }
    
    $image_id = get_term_meta($term->term_id, 'taxonomy_image', true);
    
    if (!$image_id) {
        return false;
    }
    
    return wp_get_attachment_image($image_id, $size, false, $attr);
}

/**
 * 初始化产品分类图片字段
 */
function geek_init_taxonomy_image_fields() {
    // 为产品分类添加图片字段
    geek_add_taxonomy_image_field('product_category');
}
add_action('init', 'geek_init_taxonomy_image_fields');
