jQuery(document).ready(function($) {
    // 检查是否在产品分类页面
    if ($('#edittag').length || $('#addtag').length) {
        return;
    }

    // 初始化拖拽排序
    if ($('.taxonomy-product_cat .wp-list-table tbody').length) {
        $('.taxonomy-product_cat .wp-list-table tbody').sortable({
            items: 'tr',
            cursor: 'move',
            axis: 'y',
            containment: 'table.wp-list-table',
            handle: '.sort-handle',
            opacity: 0.6,
            distance: 2,
            update: function(event, ui) {
                var term_ids = [];
                $(this).find('tr').each(function() {
                    term_ids.push($(this).attr('id').replace('tag-', ''));
                });

                // 发送排序数据到服务器
                $.ajax({
                    url: ajaxurl,
                    type: 'POST',
                    data: {
                        action: 'wc_category_sort_update_order',
                        term_ids: term_ids,
                        nonce: wc_category_sort.nonce
                    },
                    success: function(response) {
                        if (response.success) {
                            // 显示更新成功提示
                            $('.wp-header-end').before('<div class="notice notice-success is-dismissible"><p>' + wc_category_sort.success_message + '</p></div>');
                            // 3秒后自动关闭提示
                            setTimeout(function() {
                                $('.notice.success').fadeOut();
                            }, 3000);
                        }
                    }
                });
            }
        });
    }
});
