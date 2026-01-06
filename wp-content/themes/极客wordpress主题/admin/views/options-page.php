<?php
/**
 * 主选项页面
 *
 * 主题后台管理的主选项页面
 *
 * @package 极客wordpress主题
 */

// 检查权限
if (!current_user_can('manage_options')) {
    wp_die('您没有权限访问此页面。');
}
?>

<div class="wrap">
    <h1 class="wp-heading-inline">主题设置</h1>
    <hr class="wp-header-end">
    
    <div class="geek-admin-simple">
        <form method="post" action="options.php">
            <?php
            // 渲染基本设置
            settings_fields('geek_theme_general');
            do_settings_sections('geek-theme-options');
            
            // 提交按钮
            submit_button('保存设置', 'primary', 'submit', true);
            ?>
        </form>
    </div>
</div>
