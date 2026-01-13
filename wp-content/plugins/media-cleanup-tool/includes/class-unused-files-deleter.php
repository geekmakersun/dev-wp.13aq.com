<?php

/**
 * 未使用文件删除器类
 * 用于删除所有未使用的媒体文件，包括不同尺寸的图片
 */
class Unused_Files_Deleter {
    
    /**
     * 删除指定的未使用文件
     * 
     * @param array $files_to_delete 要删除的文件列表
     * @return int 成功删除的文件数量
     */
    public function delete_unused_files( $files_to_delete ) {
        $deleted_count = 0;
        
        foreach ( $files_to_delete as $file_info ) {
            if ( $this->delete_file( $file_info ) ) {
                $deleted_count++;
            }
        }
        
        return $deleted_count;
    }
    
    /**
     * 删除单个文件
     * 
     * @param array $file_info 文件信息数组
     * @return bool 删除是否成功
     */
    private function delete_file( $file_info ) {
        $file_path = $file_info['path'];
        $is_registered = $file_info['is_registered'];
        $attachment_id = $file_info['attachment_id'];
        
        // 如果文件是已注册附件的一部分
        if ( $is_registered && $attachment_id > 0 ) {
            // 检查是否为原始文件
            $original_file = get_attached_file( $attachment_id );
            
            if ( $file_path === $original_file ) {
                // 是原始文件，删除整个附件
                return wp_delete_attachment( $attachment_id, true ) !== false;
            } else {
                // 是不同尺寸的图片，直接删除文件
                // 并更新附件元数据，移除已删除的尺寸信息
                $this->update_attachment_metadata( $attachment_id, $file_path );
                return $this->delete_file_directly( $file_path );
            }
        } else {
            // 未注册的文件，直接删除
            return $this->delete_file_directly( $file_path );
        }
    }
    
    /**
     * 更新附件元数据，移除已删除的尺寸信息
     * 
     * @param int $attachment_id 附件ID
     * @param string $deleted_file_path 已删除的文件路径
     */
    private function update_attachment_metadata( $attachment_id, $deleted_file_path ) {
        $meta = wp_get_attachment_metadata( $attachment_id );
        
        if ( ! $meta || ! isset( $meta['sizes'] ) ) {
            return;
        }
        
        $file_dir = dirname( $deleted_file_path );
        $deleted_file_name = basename( $deleted_file_path );
        $original_file = get_attached_file( $attachment_id );
        $original_file_name = basename( $original_file );
        $original_file_info = pathinfo( $original_file_name );
        $original_file_name_without_ext = $original_file_info['filename'];
        $original_file_ext = $original_file_info['extension'];
        
        // 查找并移除对应的尺寸信息
        foreach ( $meta['sizes'] as $size_name => $size_info ) {
            $expected_file_name = "{$original_file_name_without_ext}-{$size_info['width']}x{$size_info['height']}.{$original_file_ext}";
            if ( $expected_file_name === $deleted_file_name ) {
                unset( $meta['sizes'][ $size_name ] );
                break;
            }
        }
        
        // 更新附件元数据
        wp_update_attachment_metadata( $attachment_id, $meta );
    }
    
    /**
     * 直接删除文件
     * 
     * @param string $file_path 文件路径
     * @return bool 删除是否成功
     */
    private function delete_file_directly( $file_path ) {
        // 检查文件是否存在
        if ( ! file_exists( $file_path ) ) {
            return true; // 文件不存在，视为删除成功
        }
        
        // 尝试删除文件
        return unlink( $file_path ) !== false;
    }
    
    /**
     * 批量删除文件
     * 
     * @param array $file_paths 文件路径列表
     * @return int 成功删除的文件数量
     */
    public function bulk_delete_files( $file_paths ) {
        $deleted_count = 0;
        
        foreach ( $file_paths as $file_path ) {
            if ( $this->delete_file_directly( $file_path ) ) {
                $deleted_count++;
            }
        }
        
        return $deleted_count;
    }
}
