<?php
/**
 * 批量添加分类功能
 *
 * 允许用户批量添加分类，支持多种分类法
 *
 * @package 极客wordpress主题
 */

/**
 * 添加批量分类管理页面
 */
function geek_add_batch_categories_page() {
    add_submenu_page(
        'tools.php', // 父菜单，使用工具菜单使其更通用
        __('批量添加分类', 'geek-wp-theme'), // 页面标题
        __('批量添加分类', 'geek-wp-theme'), // 菜单标题
        'manage_options', // 权限
        'batch-categories', // 页面 slug
        'geek_batch_categories_page_callback' // 回调函数
    );
}
add_action('admin_menu', 'geek_add_batch_categories_page');

/**
 * 批量分类页面回调函数
 */
function geek_batch_categories_page_callback() {
    // 获取所有分类法
    $taxonomies = get_taxonomies(array(
        'show_ui' => true, // 只显示在后台UI中可见的分类法
        'public' => true, // 只显示公共分类法
    ), 'objects');
    
    // 处理表单提交
    if (isset($_POST['batch_categories_submit'])) {
        $categories_text = isset($_POST['batch_categories']) ? trim($_POST['batch_categories']) : '';
        $taxonomy = isset($_POST['batch_taxonomy']) ? sanitize_text_field($_POST['batch_taxonomy']) : 'category';
        $result = geek_process_batch_categories($categories_text, $taxonomy);
        
        if ($result['success']) {
            echo '<div class="notice notice-success is-dismissible"><p>'. sprintf(__('成功添加 %d 个分类', 'geek-wp-theme'), $result['count']) .'</p></div>';
        } else {
            echo '<div class="notice notice-error is-dismissible"><p>'. __('添加分类失败，请检查输入', 'geek-wp-theme') .'</p></div>';
        }
    }
    
    // 显示表单
    ?>
    <div class="wrap">
        <h1><?php esc_html_e('批量添加分类', 'geek-wp-theme'); ?></h1>
        
        <form method="post" action="">
            <table class="form-table">
                <tr>
                    <th scope="row">
                        <label for="batch_taxonomy"><?php esc_html_e('分类法', 'geek-wp-theme'); ?></label>
                    </th>
                    <td>
                        <select name="batch_taxonomy" id="batch_taxonomy" class="regular-text">
                            <?php foreach ($taxonomies as $tax) : ?>
                                <option value="<?php echo esc_attr($tax->name); ?>">
                                    <?php echo esc_html($tax->labels->name); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <p class="description"><?php esc_html_e('选择要添加分类的分类法。', 'geek-wp-theme'); ?></p>
                    </td>
                </tr>
                
                <tr>
                    <th scope="row">
                        <label for="batch_categories"><?php esc_html_e('分类列表', 'geek-wp-theme'); ?></label>
                    </th>
                    <td>
                        <textarea 
                            name="batch_categories" 
                            id="batch_categories" 
                            rows="10" 
                            cols="50" 
                            class="large-text code"
                            placeholder="<?php esc_html_e('每行一个分类名', 'geek-wp-theme'); ?>">
                        </textarea>
                        <p class="description"><?php esc_html_e('每行输入一个分类名称，系统将自动创建这些分类。', 'geek-wp-theme'); ?></p>
                    </td>
                </tr>
            </table>
            
            <?php submit_button(__('批量添加', 'geek-wp-theme'), 'primary', 'batch_categories_submit'); ?>
        </form>
    </div>
    <?php
}

/**
 * 处理批量分类提交
 *
 * @param string $categories_text 分类文本，每行一个
 * @param string $taxonomy 分类法名称
 * @return array 处理结果
 */
function geek_process_batch_categories($categories_text, $taxonomy = 'category') {
    $result = array(
        'success' => false,
        'count' => 0
    );
    
    if (empty($categories_text)) {
        return $result;
    }
    
    // 按行分割
    $category_lines = preg_split('/\r?\n/', $categories_text);
    $success_count = 0;
    
    foreach ($category_lines as $line) {
        $category_name = trim($line);
        
        if (!empty($category_name)) {
            // 检查分类是否已存在
            $existing_term = term_exists($category_name, $taxonomy);
            
            if (!$existing_term) {
                // 创建新分类
                $term = wp_insert_term(
                    $category_name, // 分类名称
                    $taxonomy, // 分类法
                    array(
                        'description' => '',
                        'parent' => 0
                    )
                );
                
                if (!is_wp_error($term)) {
                    $success_count++;
                }
            }
        }
    }
    
    $result['success'] = $success_count > 0;
    $result['count'] = $success_count;
    
    return $result;
}
