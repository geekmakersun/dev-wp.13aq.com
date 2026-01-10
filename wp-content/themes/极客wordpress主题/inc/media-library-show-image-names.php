<?php
/**
 * 媒体库图片显示名称功能
 *
 * 在WordPress媒体库图片下方显示名称
 *
 * @package 极客wordpress主题
 */

/**
 * 在媒体库中显示图片名称
 */
function geek_media_library_show_image_names() {
    // 检查是否在媒体库页面
    $current_screen = get_current_screen();
    if ( ! $current_screen || 'upload' !== $current_screen->base ) {
        return;
    }
    ?>
    <style>
    /* 确保文件名显示在图片下方 */
    .type-image .filename {
        display: block !important;
    }
    
    /* 确保文件名显示在最上层 */
    .wp-core-ui .attachment .filename {
        z-index: 999;
    }
    </style>
    <script type="text/javascript">
    jQuery( document ).ready( function( $ ) {
        // 1. 直接修改模板HTML - 更简单的方法
        var template = $( '#tmpl-attachment' );
        if ( template.length ) {
            var html = template.html();
            // 简单的替换：在图片类型的条件分支中添加文件名显示
            var newHtml = html.replace(
                '<# } else if ( \'image\' === data.type && data.size && data.size.url ) { #>',
                '<# } else if ( \'image\' === data.type && data.size && data.size.url ) { #><div class="filename"><div>{{ data.filename }}</div></div>'
            );
            template.html( newHtml );
        }
        
        // 2. 刷新媒体库视图
        if ( wp.media && wp.media.frame && wp.media.frame.state ) {
            var state = wp.media.frame.state();
            if ( state && state.get && state.get( 'library' ) ) {
                var library = state.get( 'library' );
                library.reset( library.models ); // 重置库，强制重新渲染
            }
        }
    });
    </script>
    <?php
}
add_action( 'admin_footer', 'geek_media_library_show_image_names' );