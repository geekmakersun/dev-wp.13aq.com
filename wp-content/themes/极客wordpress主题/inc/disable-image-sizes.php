<?php
/**
 * WordPress图片尺寸管理工具
 * 取消上传图片生成不同尺寸，并删除已生成的尺寸图片
 */

// 确保直接访问被阻止
if (!defined('ABSPATH')) {
    exit;
}

// 禁用不需要的图片尺寸生成
function geek_disable_image_sizes() {
    // 禁用默认尺寸
    add_filter('intermediate_image_sizes_advanced', 'geek_remove_default_image_sizes');
    
    // 禁用自动旋转图片
    add_filter('wp_editor_set_quality', function() { return 100; });
    add_filter('jpeg_quality', function() { return 100; });
    add_filter('png_quality', function() { return 100; });
}
add_action('init', 'geek_disable_image_sizes');

// 移除默认图片尺寸
function geek_remove_default_image_sizes($sizes) {
    // 可以根据需要保留某些尺寸
    // 移除中等尺寸
    if (isset($sizes['medium'])) {
        unset($sizes['medium']);
    }
    // 移除大尺寸
    if (isset($sizes['large'])) {
        unset($sizes['large']);
    }
    // 移除中等大尺寸
    if (isset($sizes['medium_large'])) {
        unset($sizes['medium_large']);
    }
    // 移除2x大尺寸
    if (isset($sizes['1536x1536'])) {
        unset($sizes['1536x1536']);
    }
    // 移除2x中等尺寸
    if (isset($sizes['2048x2048'])) {
        unset($sizes['2048x2048']);
    }
    
    return $sizes;
}

// 添加管理页面
function geek_add_image_sizes_admin_page() {
    add_submenu_page(
        'options-general.php',
        __('图片尺寸管理', 'geek-theme'),
        __('图片尺寸管理', 'geek-theme'),
        'manage_options',
        'geek-image-sizes',
        'geek_image_sizes_admin_page_callback'
    );
}
add_action('admin_menu', 'geek_add_image_sizes_admin_page');

// 管理页面回调
function geek_image_sizes_admin_page_callback() {
    // 处理删除已生成图片的请求
    if (isset($_POST['geek_delete_generated_images'])) {
        check_admin_referer('geek_delete_generated_images_nonce');
        $deleted_count = geek_delete_generated_images();
        echo '<div class="notice notice-success is-dismissible"><p>成功删除 ' . $deleted_count . ' 张生成的尺寸图片</p></div>';
    }
    
    // 获取当前注册的图片尺寸
    global $_wp_additional_image_sizes;
    $image_sizes = array_merge(get_intermediate_image_sizes(), array_keys((array)$_wp_additional_image_sizes));
    
    ?>
    <div class="wrap">
        <h1><?php _e('图片尺寸管理', 'geek-theme'); ?></h1>
        
        <h2><?php _e('当前状态', 'geek-theme'); ?></h2>
        <p><?php _e('已禁用除缩略图外的所有自动生成图片尺寸', 'geek-theme'); ?></p>
        
        <h2><?php _e('已注册的图片尺寸', 'geek-theme'); ?></h2>
        <ul>
            <?php foreach ($image_sizes as $size) : ?>
                <li><?php echo esc_html($size); ?></li>
            <?php endforeach; ?>
        </ul>
        
        <h2><?php _e('删除已生成的尺寸图片', 'geek-theme'); ?></h2>
        <p><?php _e('此操作将删除所有已生成的不同尺寸图片，仅保留原始图片。请谨慎操作！', 'geek-theme'); ?></p>
        <form method="post" action="">
            <?php wp_nonce_field('geek_delete_generated_images_nonce'); ?>
            <?php submit_button(__('删除已生成的尺寸图片', 'geek-theme'), 'primary', 'geek_delete_generated_images', false, array('style' => 'background-color: #dc3232; border-color: #dc3232;')); ?>
        </form>
    </div>
    <?php
}

// 删除已生成的尺寸图片
function geek_delete_generated_images() {
    $upload_dir = wp_upload_dir();
    $upload_path = $upload_dir['basedir'];
    $deleted_count = 0;
    
    // 遍历上传目录，删除所有带尺寸后缀的图片
    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($upload_path, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::LEAVES_ONLY
    );
    
    foreach ($iterator as $file) {
        if ($file->isFile()) {
            $filename = $file->getFilename();
            $extension = strtolower($file->getExtension());
            
            // 仅处理图片文件
            if (in_array($extension, array('jpg', 'jpeg', 'png', 'gif', 'webp'))) {
                // 匹配带尺寸后缀的图片文件名模式，如 "image-1200x800.jpg"
                if (preg_match('/^(.+)-\d+x\d+\.(jpg|jpeg|png|gif|webp)$/i', $filename)) {
                    if (unlink($file->getPathname())) {
                        $deleted_count++;
                    }
                }
            }
        }
    }
    
    return $deleted_count;
}

// 将此文件添加到主题的functions.php中使用
// require_once get_template_directory() . '/disable-image-sizes.php';
