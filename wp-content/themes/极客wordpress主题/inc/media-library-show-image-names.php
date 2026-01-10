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
        // 使用正则表达式修改模板，在图片类型的条件分支中添加文件名显示
        var template = $( '#tmpl-attachment' );
        if ( template.length ) {
            var html = template.html();
            
            // 使用正则表达式匹配，忽略缩进差异
            var imageRegex = /(<# } else if \( \'image\' === data\.type && data\.size && data\.size\.url \) { #>)([\s\S]*?<div class="centered">[\s\S]*?<img src="{{ data\.size\.url }}" draggable="false" alt="" \/>[\s\S]*?<\/div>)([\s\S]*?<# } #>)/;
            
            // 替换为包含文件名显示的内容
            var newHtml = html.replace(imageRegex, '$1$2\n\t\t\t\t\t\t<div class="filename">\n\t\t\t\t\t\t\t<div>{{ data.filename }}</div>\n\t\t\t\t\t\t</div>$3');
            
            template.html( newHtml );
        }
        
        // 监听媒体库框架打开事件，确保每次打开都重新应用修改
        $( document ).on( 'wp_enqueue_media', function() {
            if ( wp.media && wp.media.frame ) {
                wp.media.frame.on( 'open', function() {
                    var template = $( '#tmpl-attachment' );
                    if ( template.length ) {
                        var html = template.html();
                        var imageRegex = /(<# } else if \( \'image\' === data\.type && data\.size && data\.size\.url \) { #>)([\s\S]*?<div class="centered">[\s\S]*?<img src="{{ data\.size\.url }}" draggable="false" alt="" \/>[\s\S]*?<\/div>)([\s\S]*?<# } #>)/;
                        var newHtml = html.replace(imageRegex, '$1$2\n\t\t\t\t\t\t<div class="filename">\n\t\t\t\t\t\t\t<div>{{ data.filename }}</div>\n\t\t\t\t\t\t</div>$3');
                        template.html( newHtml );
                    }
                    
                    // 刷新媒体库视图
                    var state = wp.media.frame.state();
                    if ( state && state.get && state.get( 'library' ) ) {
                        var library = state.get( 'library' );
                        library.reset( library.models ); // 重置库，强制重新渲染
                    }
                });
            }
        });
    });
    </script>
    <?php
}
add_action( 'admin_footer', 'geek_media_library_show_image_names' );