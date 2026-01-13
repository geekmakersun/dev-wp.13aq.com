<?php

/**
 * 媒体扫描器类
 */
class Media_Scanner {
    
    /**
     * 扫描未使用的媒体文件
     * 
     * @return array 未使用的媒体文件列表
     */
    public function scan_unused_media() {
        global $wpdb;
        
        $unused_media = array();
        
        // 获取所有媒体附件
        $attachments = get_posts( array(
            'post_type' => 'attachment',
            'posts_per_page' => -1,
            'post_status' => 'inherit'
        ) );
        
        // 检查每个附件是否被使用
        foreach ( $attachments as $attachment ) {
            // 检查附件是否在文章或页面中被引用
            $used = $this->is_attachment_used_in_content( $attachment->ID );
            
            // 检查附件是否被设置为特色图片
            $featured = $this->is_attachment_used_as_featured( $attachment->ID );
            
            // 如果未被使用且未设置为特色图片
            if ( ! $used && ! $featured ) {
                $unused_media[] = $this->get_attachment_info( $attachment );
            }
        }
        
        return $unused_media;
    }
    
    /**
     * 检查附件是否在文章或页面中被引用
     * 
     * @param int $attachment_id 附件ID
     * @return bool 是否被引用
     */
    private function is_attachment_used_in_content( $attachment_id ) {
        global $wpdb;
        
        $attachment_url = wp_get_attachment_url( $attachment_id );
        
        $count = $wpdb->get_var( $wpdb->prepare(
            "SELECT COUNT(*) FROM $wpdb->posts WHERE post_content LIKE %s",
            '%' . $wpdb->esc_like( $attachment_url ) . '%'
        ) );
        
        return $count > 0;
    }
    
    /**
     * 检查附件是否被设置为特色图片
     * 
     * @param int $attachment_id 附件ID
     * @return bool 是否被设置为特色图片
     */
    private function is_attachment_used_as_featured( $attachment_id ) {
        global $wpdb;
        
        $count = $wpdb->get_var( $wpdb->prepare(
            "SELECT COUNT(*) FROM $wpdb->postmeta WHERE meta_key = '_thumbnail_id' AND meta_value = %d",
            $attachment_id
        ) );
        
        return $count > 0;
    }
    
    /**
     * 获取附件信息
     * 
     * @param WP_Post $attachment 附件对象
     * @return array 附件信息数组
     */
    private function get_attachment_info( $attachment ) {
        $file_path = get_attached_file( $attachment->ID );
        $file_size = filesize( $file_path );
        
        return array(
            'id' => $attachment->ID,
            'filename' => basename( $file_path ),
            'size' => size_format( $file_size ),
            'type' => get_post_mime_type( $attachment->ID ),
            'url' => wp_get_attachment_url( $attachment->ID )
        );
    }
}
