<?php

/**
 * 媒体删除器类
 */
class Media_Deleter {
    
    /**
     * 删除指定的媒体文件
     * 
     * @param array $file_ids 要删除的文件ID列表
     * @return int 成功删除的文件数量
     */
    public function delete_media_files( $file_ids ) {
        $deleted_count = 0;
        
        foreach ( $file_ids as $file_id ) {
            // 删除附件（包括所有相关文件和元数据）
            if ( $this->delete_media_file( $file_id ) ) {
                $deleted_count++;
            }
        }
        
        return $deleted_count;
    }
    
    /**
     * 删除单个媒体文件
     * 
     * @param int $file_id 要删除的文件ID
     * @return bool 删除是否成功
     */
    private function delete_media_file( $file_id ) {
        // 获取附件信息
        $attachment = get_post( $file_id );
        
        if ( ! $attachment || $attachment->post_type !== 'attachment' ) {
            return false;
        }
        
        // 获取所有关联的文件（包括不同尺寸的图片）
        $media_files = $this->get_all_media_files( $file_id );
        
        // 删除附件
        $result = wp_delete_attachment( $file_id, true );
        
        return $result !== false;
    }
    
    /**
     * 获取所有关联的媒体文件（包括不同尺寸）
     * 
     * @param int $attachment_id 附件ID
     * @return array 关联的文件路径列表
     */
    private function get_all_media_files( $attachment_id ) {
        $files = array();
        
        // 获取原始文件
        $original_file = get_attached_file( $attachment_id );
        $files[] = $original_file;
        
        // 获取附件元数据
        $attachment_meta = wp_get_attachment_metadata( $attachment_id );
        
        if ( ! $attachment_meta || ! isset( $attachment_meta['sizes'] ) ) {
            return $files;
        }
        
        // 获取不同尺寸的图片文件
        $upload_dir = wp_upload_dir();
        $file_dir = dirname( $original_file );
        $file_name = basename( $original_file );
        $file_info = pathinfo( $file_name );
        $file_name_without_ext = $file_info['filename'];
        $file_ext = $file_info['extension'];
        
        foreach ( $attachment_meta['sizes'] as $size_name => $size_info ) {
            $size_file_name = "{$file_name_without_ext}-{$size_info['width']}x{$size_info['height']}.{$file_ext}";
            $size_file_path = "{$file_dir}/{$size_file_name}";
            
            if ( file_exists( $size_file_path ) ) {
                $files[] = $size_file_path;
            }
        }
        
        return $files;
    }
}
