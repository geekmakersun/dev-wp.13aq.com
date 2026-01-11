<?php

// 加载WordPress环境
require_once('wp-load.php');

// 测试插件更新检查
try {
    // 记录开始时间
    echo '开始检查插件更新...<br>';
    $start_time = microtime(true);
    
    // 调用更新检查函数
    wp_update_plugins();
    
    // 记录结束时间
    $end_time = microtime(true);
    $duration = round(($end_time - $start_time) * 1000, 2);
    
    // 获取更新信息
    $update_plugins = get_site_transient('update_plugins');
    
    // 输出结果
    echo '插件更新检查完成，耗时 ' . $duration . ' 毫秒<br>';
    echo '最后检查时间：' . date('Y-m-d H:i:s', $update_plugins->last_checked) . '<br>';
    
    // 检查是否有更新
    if (!empty($update_plugins->response)) {
        echo '发现 ' . count($update_plugins->response) . ' 个插件需要更新<br>';
    } else {
        echo '所有插件都是最新的<br>';
    }
    
    // 测试主题更新检查
    echo '<br>开始检查主题更新...<br>';
    $start_time = microtime(true);
    
    // 调用更新检查函数
    wp_update_themes();
    
    // 记录结束时间
    $end_time = microtime(true);
    $duration = round(($end_time - $start_time) * 1000, 2);
    
    // 获取更新信息
    $update_themes = get_site_transient('update_themes');
    
    // 输出结果
    echo '主题更新检查完成，耗时 ' . $duration . ' 毫秒<br>';
    echo '最后检查时间：' . date('Y-m-d H:i:s', $update_themes->last_checked) . '<br>';
    
    // 检查是否有更新
    if (!empty($update_themes->response)) {
        echo '发现 ' . count($update_themes->response) . ' 个主题需要更新<br>';
    } else {
        echo '所有主题都是最新的<br>';
    }
    
    echo '<br>测试成功：WordPress更新检查功能正常工作！';
    
} catch (Exception $e) {
    echo '错误：' . $e->getMessage();
}

// 清理测试文件
unlink(__FILE__);
