<?php

// 加载依赖类
require_once MCT_PLUGIN_DIR . 'includes/class-media-scanner.php';
require_once MCT_PLUGIN_DIR . 'includes/class-media-deleter.php';
require_once MCT_PLUGIN_DIR . 'includes/class-unused-files-scanner.php';
require_once MCT_PLUGIN_DIR . 'includes/class-unused-files-deleter.php';

/**
 * 媒体清理工具 核心类
 */
class Media_Cleanup_Tool {
    
    /**
     * 媒体扫描器实例
     * @var Media_Scanner
     */
    private $media_scanner;
    
    /**
     * 媒体删除器实例
     * @var Media_Deleter
     */
    private $media_deleter;
    
    /**
     * 未使用文件扫描器实例
     * @var Unused_Files_Scanner
     */
    private $unused_files_scanner;
    
    /**
     * 未使用文件删除器实例
     * @var Unused_Files_Deleter
     */
    private $unused_files_deleter;
    
    /**
     * 构造函数
     */
    public function __construct() {
        // 初始化依赖
        $this->init_dependencies();
        
        // 初始化钩子
        $this->init_hooks();
    }
    
    /**
     * 运行插件
     */
    public function run() {
        // 插件运行逻辑
    }
    
    /**
     * 初始化依赖
     */
    private function init_dependencies() {
        $this->media_scanner = new Media_Scanner();
        $this->media_deleter = new Media_Deleter();
        $this->unused_files_scanner = new Unused_Files_Scanner();
        $this->unused_files_deleter = new Unused_Files_Deleter();
    }
    
    /**
     * 初始化钩子
     */
    private function init_hooks() {
        // 禁用不同尺寸图片生成
        add_filter( 'intermediate_image_sizes', array( $this, 'disable_image_sizes' ) );
        add_filter( 'intermediate_image_sizes_advanced', array( $this, 'disable_image_sizes_advanced' ) );
        add_filter( 'big_image_size_threshold', '__return_false' );
        
        // 管理菜单
        add_action( 'admin_menu', array( $this, 'add_admin_menu' ) );
        
        // AJAX 处理
        add_action( 'wp_ajax_mct_scan_unused_media', array( $this, 'ajax_scan_unused_media' ) );
        add_action( 'wp_ajax_mct_delete_unused_media', array( $this, 'ajax_delete_unused_media' ) );
    }
    
    /**
     * 激活插件
     */
    public static function activate() {
        // 激活时的操作
        update_option( 'mct_version', MCT_VERSION );
    }
    
    /**
     * 停用插件
     */
    public static function deactivate() {
        // 停用时的操作
        // 注意：不应该在停用插件时删除用户数据
    }
    
    /**
     * 禁用默认图片尺寸
     */
    public function disable_image_sizes() {
        return array();
    }
    
    /**
     * 禁用高级图片尺寸
     */
    public function disable_image_sizes_advanced( $sizes ) {
        return array();
    }
    
    /**
     * 添加管理菜单
     */
    public function add_admin_menu() {
        add_media_page(
            __('媒体清理工具', 'media-cleanup-tool'),
            __('媒体清理', 'media-cleanup-tool'),
            'manage_options',
            'media-cleanup-tool',
            array( $this, 'render_admin_page' )
        );
    }
    
    /**
     * 渲染管理页面
     */
    public function render_admin_page() {
        ?>
        <div class="wrap">
            <h1><?php _e( '媒体清理工具', 'media-cleanup-tool' ); ?></h1>
            
            <div class="card">
                <h2 class="title"><?php _e( '禁用图片尺寸生成', 'media-cleanup-tool' ); ?></h2>
                <p><?php _e( '所有图片尺寸生成已被禁用，新上传的图片将只保留原始尺寸。', 'media-cleanup-tool' ); ?></p>
            </div>
            
            <div class="card">
                <h2 class="title"><?php _e( '扫描未使用媒体', 'media-cleanup-tool' ); ?></h2>
                <p><?php _e( '点击下方按钮扫描未使用的媒体文件，包括不同尺寸的图片。', 'media-cleanup-tool' ); ?></p>
                <button id="mct-scan-btn" class="button button-primary"><?php _e( '开始扫描', 'media-cleanup-tool' ); ?></button>
            </div>
            
            <!-- 扫描结果区域，全宽显示 -->
            <div id="mct-scan-results" style="margin-top: 20px;"></div>
            
            <div class="card" style="margin-top: 20px;">
                <h2 class="title"><?php _e( '删除未使用媒体', 'media-cleanup-tool' ); ?></h2>
                <p><?php _e( '选择删除方式：', 'media-cleanup-tool' ); ?></p>
                <div style="margin-bottom: 10px;">
                    <button id="mct-delete-all-btn" class="button button-danger" disabled><?php _e( '删除所有扫描结果', 'media-cleanup-tool' ); ?></button>
                    <button id="mct-delete-btn" class="button button-secondary" disabled><?php _e( '仅删除选中文件', 'media-cleanup-tool' ); ?></button>
                </div>
                <div id="mct-delete-status" style="margin-top: 20px;"></div>
            </div>
        </div>
        
        <script>
            jQuery(document).ready(function($) {
                // 存储扫描结果数据
                var scanData = null;
                
                // 扫描按钮点击事件
                $('#mct-scan-btn').click(function() {
                    var btn = $(this);
                    var resultsDiv = $('#mct-scan-results');
                    var deleteBtn = $('#mct-delete-btn');
                    
                    btn.prop('disabled', true).text('<?php _e( '扫描中...', 'media-cleanup-tool' ); ?>');
                    resultsDiv.html('<p><?php _e( '正在扫描未使用的媒体文件，请稍候...', 'media-cleanup-tool' ); ?></p>');
                    deleteBtn.prop('disabled', true);
                    
                    $.ajax({
                        url: ajaxurl,
                        type: 'POST',
                        data: {
                            action: 'mct_scan_unused_media',
                            nonce: '<?php echo wp_create_nonce( 'mct_scan_nonce' ); ?>'
                        },
                        success: function(response) {
                            btn.prop('disabled', false).text('<?php _e( '开始扫描', 'media-cleanup-tool' ); ?>');
                            
                            if (response.success) {
                                // 存储扫描结果
                                scanData = response.data;
                                
                                var html = '<h3><?php _e( '扫描结果', 'media-cleanup-tool' ); ?></h3>';
                                html += '<p><?php _e( '找到未使用的媒体文件：', 'media-cleanup-tool' ); ?> ' + scanData.total + '</p>';
                                
                                if (scanData.total > 0) {
                                    html += '<style>';
                                    html += '.mct-preview { max-width: 100px; max-height: 100px; cursor: pointer; border: 1px solid #ddd; padding: 2px; }';
                                    html += '.mct-preview-modal { display: none; position: fixed; z-index: 9999; padding-top: 50px; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.9); }';
                                    html += '.mct-preview-modal-content { margin: auto; display: block; max-width: 80%; max-height: 80%; }';
                                    html += '.mct-preview-close { position: absolute; top: 15px; right: 35px; color: #f1f1f1; font-size: 40px; font-weight: bold; transition: 0.3s; cursor: pointer; }';
                                    html += '.mct-preview-close:hover, .mct-preview-close:focus { color: #bbb; text-decoration: none; cursor: pointer; }';
                                    html += '#mct-delete-form { width: 100%; overflow-x: auto; }';
                                    html += '.wp-list-table { width: 100% !important; table-layout: auto; }';
                                    html += '.wp-list-table th, .wp-list-table td { white-space: nowrap; }';
                                    html += '</style>';
                                    html += '<div class="postbox">';
                                    html += '<div class="inside">';
                                    html += '<form id="mct-delete-form">';
                                    html += '<table class="wp-list-table widefat fixed striped">';
                                    html += '<thead><tr><th><input type="checkbox" id="mct-select-all"></th><th><?php _e( '预览', 'media-cleanup-tool' ); ?></th><th><?php _e( '文件名', 'media-cleanup-tool' ); ?></th><th><?php _e( '文件大小', 'media-cleanup-tool' ); ?></th><th><?php _e( '类型', 'media-cleanup-tool' ); ?></th></tr></thead>';
                                    html += '<tbody>';
                                    
                                    $.each(scanData.files, function(index, file) {
                                        html += '<tr>';
                                        html += '<td><input type="checkbox" name="delete_files[]" value="' + file.id + '"></td>';
                                        if (file.type.indexOf('image/') === 0) {
                                            html += '<td><img src="' + file.url + '" class="mct-preview" data-url="' + file.url + '"></td>';
                                        } else {
                                            html += '<td><?php _e( '非图片', 'media-cleanup-tool' ); ?></td>';
                                        }
                                        html += '<td>' + file.filename + '</td>';
                                        html += '<td>' + file.size + '</td>';
                                        html += '<td>' + file.type + '</td>';
                                        html += '</tr>';
                                    });
                                    
                                    html += '</tbody></table>';
                                    html += '</form>';
                                    html += '</div>'; // 闭合 inside
                                    html += '</div>'; // 闭合 postbox
                                    
                                    // 图片预览模态框
                                    html += '<div id="mct-preview-modal" class="mct-preview-modal">';
                                    html += '<span class="mct-preview-close">&times;</span>';
                                    html += '<img class="mct-preview-modal-content" id="mct-preview-modal-img">';
                                    html += '</div>';
                                    
                                    deleteBtn.prop('disabled', false);
                                    $('#mct-delete-all-btn').prop('disabled', false);
                                } else {
                                    html += '<p><?php _e( '没有找到未使用的媒体文件。', 'media-cleanup-tool' ); ?></p>';
                                }
                                
                                resultsDiv.html(html);
                                
                                // 全选功能
                                $('#mct-select-all').click(function() {
                                    $('input[name="delete_files[]"]').prop('checked', $(this).prop('checked'));
                                });
                                
                                // 图片预览功能
                                var modal = $('#mct-preview-modal');
                                var modalImg = $('#mct-preview-modal-img');
                                var closeBtn = $('.mct-preview-close');
                                
                                // 点击预览图显示大图
                                $('.mct-preview').click(function() {
                                    modal.css('display', 'block');
                                    modalImg.attr('src', $(this).data('url'));
                                });
                                
                                // 点击关闭按钮或模态框背景关闭预览
                                closeBtn.click(function() {
                                    modal.css('display', 'none');
                                });
                                
                                modal.click(function(e) {
                                    if (e.target === modal[0]) {
                                        modal.css('display', 'none');
                                    }
                                });
                            } else {
                                resultsDiv.html('<p class="error">' + response.data.message + '</p>');
                            }
                        },
                        error: function() {
                            btn.prop('disabled', false).text('<?php _e( '开始扫描', 'media-cleanup-tool' ); ?>');
                            resultsDiv.html('<p class="error"><?php _e( '扫描失败，请重试。', 'media-cleanup-tool' ); ?></p>');
                        }
                    });
                });
                
                // 删除按钮点击事件
                $('#mct-delete-btn').click(function() {
                    var btn = $(this);
                    var statusDiv = $('#mct-delete-status');
                    var selectedFiles = $('input[name="delete_files[]"]:checked');
                    
                    if (selectedFiles.length === 0) {
                        alert('<?php _e( '请先选择要删除的文件。', 'media-cleanup-tool' ); ?>');
                        return;
                    }
                    
                    if (!confirm('<?php _e( '确定要删除选中的文件吗？此操作不可恢复！', 'media-cleanup-tool' ); ?>')) {
                        return;
                    }
                    
                    var filesToDelete = [];
                    selectedFiles.each(function() {
                        var fileId = $(this).val();
                        var fileInfo = scanData.files.find(function(file) {
                            return file.id === fileId;
                        });
                        if (fileInfo) {
                            filesToDelete.push({
                                path: fileInfo.path,
                                is_registered: fileInfo.is_registered,
                                attachment_id: fileInfo.attachment_id
                            });
                        }
                    });
                    
                    btn.prop('disabled', true).text('<?php _e( '删除中...', 'media-cleanup-tool' ); ?>');
                    $('#mct-delete-all-btn').prop('disabled', true);
                    statusDiv.html('<p><?php _e( '正在删除文件，请稍候...', 'media-cleanup-tool' ); ?></p>');
                    
                    $.ajax({
                        url: ajaxurl,
                        type: 'POST',
                        data: {
                            action: 'mct_delete_unused_media',
                            nonce: '<?php echo wp_create_nonce( 'mct_delete_nonce' ); ?>',
                            files_to_delete: filesToDelete
                        },
                        success: function(response) {
                            btn.prop('disabled', false).text('<?php _e( '删除选中文件', 'media-cleanup-tool' ); ?>');
                            $('#mct-delete-all-btn').prop('disabled', false);
                            
                            if (response.success) {
                                statusDiv.html('<p class="updated"><?php _e( '成功删除 ', 'media-cleanup-tool' ); ?>' + response.data.deleted + ' <?php _e( '个文件。', 'media-cleanup-tool' ); ?></p>');
                                // 刷新页面
                                setTimeout(function() {
                                    location.reload();
                                }, 2000);
                            } else {
                                statusDiv.html('<p class="error">' + response.data.message + '</p>');
                            }
                        },
                        error: function() {
                            btn.prop('disabled', false).text('<?php _e( '删除选中文件', 'media-cleanup-tool' ); ?>');
                            $('#mct-delete-all-btn').prop('disabled', false);
                            statusDiv.html('<p class="error"><?php _e( '删除失败，请重试。', 'media-cleanup-tool' ); ?></p>');
                        }
                    });
                });
                
                // 全部删除按钮点击事件
                $('#mct-delete-all-btn').click(function() {
                    var btn = $(this);
                    var statusDiv = $('#mct-delete-status');
                    var allFiles = $('input[name="delete_files[]"]');
                    
                    if (allFiles.length === 0) {
                        alert('<?php _e( '没有找到要删除的文件。', 'media-cleanup-tool' ); ?>');
                        return;
                    }
                    
                    if (!confirm('<?php _e( '确定要删除所有扫描结果吗？此操作不可恢复！', 'media-cleanup-tool' ); ?>')) {
                        return;
                    }
                    
                    // 准备所有要删除的文件信息
                    var filesToDelete = [];
                    scanData.files.forEach(function(fileInfo) {
                        filesToDelete.push({
                            path: fileInfo.path,
                            is_registered: fileInfo.is_registered,
                            attachment_id: fileInfo.attachment_id
                        });
                    });
                    
                    btn.prop('disabled', true).text('<?php _e( '删除中...', 'media-cleanup-tool' ); ?>');
                    $('#mct-delete-btn').prop('disabled', true);
                    statusDiv.html('<p><?php _e( '正在删除所有文件，请稍候...', 'media-cleanup-tool' ); ?></p>');
                    
                    $.ajax({
                        url: ajaxurl,
                        type: 'POST',
                        data: {
                            action: 'mct_delete_unused_media',
                            nonce: '<?php echo wp_create_nonce( 'mct_delete_nonce' ); ?>',
                            files_to_delete: filesToDelete
                        },
                        success: function(response) {
                            btn.prop('disabled', false).text('<?php _e( '全部删除', 'media-cleanup-tool' ); ?>');
                            $('#mct-delete-btn').prop('disabled', false);
                            
                            if (response.success) {
                                statusDiv.html('<p class="updated"><?php _e( '成功删除 ', 'media-cleanup-tool' ); ?>' + response.data.deleted + ' <?php _e( '个文件。', 'media-cleanup-tool' ); ?></p>');
                                // 刷新页面
                                setTimeout(function() {
                                    location.reload();
                                }, 2000);
                            } else {
                                statusDiv.html('<p class="error">' + response.data.message + '</p>');
                            }
                        },
                        error: function() {
                            btn.prop('disabled', false).text('<?php _e( '全部删除', 'media-cleanup-tool' ); ?>');
                            $('#mct-delete-btn').prop('disabled', false);
                            statusDiv.html('<p class="error"><?php _e( '删除失败，请重试。', 'media-cleanup-tool' ); ?></p>');
                        }
                    });
                });
            });
        </script>
        <?php
    }
    
    /**
     * AJAX 扫描未使用媒体
     */
    public function ajax_scan_unused_media() {
        // 验证 nonce
        check_ajax_referer( 'mct_scan_nonce', 'nonce' );
        
        // 检查权限
        if ( ! current_user_can( 'manage_options' ) ) {
            wp_send_json_error( array( 'message' => __( '权限不足', 'media-cleanup-tool' ) ) );
        }
        
        // 扫描未使用媒体（包括不同尺寸的图片）
        $unused_files = $this->unused_files_scanner->scan_unused_files();
        
        // 格式化结果
        $formatted_files = array();
        foreach ( $unused_files as $file ) {
            $formatted_files[] = array(
                'id' => md5( $file['path'] ), // 使用文件路径的 MD5 作为唯一标识
                'filename' => $file['filename'],
                'size' => size_format( $file['size'] ),
                'type' => 'image/' . pathinfo( $file['filename'], PATHINFO_EXTENSION ),
                'url' => str_replace( wp_upload_dir()['basedir'], wp_upload_dir()['baseurl'], $file['path'] ),
                'path' => $file['path'],
                'is_registered' => $file['is_registered'],
                'attachment_id' => $file['attachment_id']
            );
        }
        
        $results = array(
            'total' => count( $formatted_files ),
            'files' => $formatted_files
        );
        
        wp_send_json_success( $results );
    }
    
    /**
     * AJAX 删除未使用媒体
     */
    public function ajax_delete_unused_media() {
        // 验证 nonce
        check_ajax_referer( 'mct_delete_nonce', 'nonce' );
        
        // 检查权限
        if ( ! current_user_can( 'manage_options' ) ) {
            wp_send_json_error( array( 'message' => __( '权限不足', 'media-cleanup-tool' ) ) );
        }
        
        // 获取要删除的文件信息
        $files_to_delete = isset( $_POST['files_to_delete'] ) ? $_POST['files_to_delete'] : array();
        
        if ( empty( $files_to_delete ) ) {
            wp_send_json_error( array( 'message' => __( '没有选择要删除的文件', 'media-cleanup-tool' ) ) );
        }
        
        // 删除未使用媒体
        $deleted_count = $this->unused_files_deleter->delete_unused_files( $files_to_delete );
        
        wp_send_json_success( array( 'deleted' => $deleted_count ) );
    }
}
