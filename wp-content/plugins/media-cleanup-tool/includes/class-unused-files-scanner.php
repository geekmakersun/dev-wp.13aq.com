<?php

/**
 * 未使用文件扫描器类
 * 用于扫描所有未使用的媒体文件，包括不同尺寸的图片
 */
class Unused_Files_Scanner {
    
    /**
     * 扫描所有未使用的媒体文件
     * 
     * @return array 未使用的媒体文件列表
     */
    public function scan_unused_files() {
        $unused_files = array();
        
        // 获取上传目录
        $upload_dir = wp_upload_dir();
        $upload_path = $upload_dir['basedir'];
        
        // 获取所有已注册的附件
        $registered_attachments = $this->get_registered_attachments();
        
        // 获取所有已使用的文件路径
        $used_file_paths = $this->get_used_file_paths();
        
        // 遍历上传目录，查找未使用的文件
        $this->scan_directory( $upload_path, $registered_attachments, $used_file_paths, $unused_files );
        
        return $unused_files;
    }
    
    /**
     * 获取所有已注册的附件
     * 
     * @return array 已注册的附件列表
     */
    private function get_registered_attachments() {
        $attachments = array();
        
        // 获取所有附件
        $args = array(
            'post_type' => 'attachment',
            'posts_per_page' => -1,
            'post_status' => 'inherit'
        );
        
        $query = new WP_Query( $args );
        
        if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
                $query->the_post();
                $attachment_id = get_the_ID();
                $file_path = get_attached_file( $attachment_id );
                
                if ( $file_path ) {
                    $attachments[ $file_path ] = $attachment_id;
                    
                    // 获取所有关联的文件（包括不同尺寸）
                    $meta = wp_get_attachment_metadata( $attachment_id );
                    if ( $meta && isset( $meta['sizes'] ) ) {
                        $file_dir = dirname( $file_path );
                        $file_name = basename( $file_path );
                        $file_info = pathinfo( $file_name );
                        $file_name_without_ext = $file_info['filename'];
                        $file_ext = $file_info['extension'];
                        
                        foreach ( $meta['sizes'] as $size_name => $size_info ) {
                            $size_file_name = "{$file_name_without_ext}-{$size_info['width']}x{$size_info['height']}.{$file_ext}";
                            $size_file_path = "{$file_dir}/{$size_file_name}";
                            $attachments[ $size_file_path ] = $attachment_id;
                        }
                    }
                }
            }
        }
        
        wp_reset_postdata();
        
        return $attachments;
    }
    
    /**
     * 获取所有已使用的文件路径
     * 
     * @return array 已使用的文件路径列表
     */
    private function get_used_file_paths() {
        global $wpdb;
        $used_files = array();
        
        // 从文章内容中提取所有图片URL
        $results = $wpdb->get_results( "SELECT post_content FROM $wpdb->posts WHERE post_type IN ('post', 'page') AND post_status = 'publish'" );
        
        foreach ( $results as $result ) {
            // 提取所有图片URL
            preg_match_all( '/<img[^>]+src=["\']([^"\']+)["\']/i', $result->post_content, $matches );
            if ( isset( $matches[1] ) ) {
                foreach ( $matches[1] as $url ) {
                    $file_path = $this->url_to_path( $url );
                    if ( $file_path ) {
                        $used_files[ $file_path ] = true;
                    }
                }
            }
        }
        
        // 确保原始文件被标记为已使用
        $attachments = get_posts( array(
            'post_type' => 'attachment',
            'posts_per_page' => -1,
            'post_status' => 'inherit'
        ) );
        
        foreach ( $attachments as $attachment ) {
            $file_path = get_attached_file( $attachment->ID );
            if ( $file_path ) {
                $used_files[ $file_path ] = true;
            }
        }
        
        return $used_files;
    }
    
    /**
     * 遍历目录，查找未使用的文件
     * 
     * @param string $dir 目录路径
     * @param array $registered_attachments 已注册的附件列表
     * @param array $used_file_paths 已使用的文件路径列表
     * @param array &$unused_files 未使用的文件列表（引用传递）
     */
    private function scan_directory( $dir, $registered_attachments, $used_file_paths, &$unused_files ) {
        $files = scandir( $dir );
        
        foreach ( $files as $file ) {
            if ( $file === '.' || $file === '..' ) {
                continue;
            }
            
            $file_path = $dir . '/' . $file;
            
            if ( is_dir( $file_path ) ) {
                // 递归扫描子目录
                $this->scan_directory( $file_path, $registered_attachments, $used_file_paths, $unused_files );
            } else {
                // 检查文件是否为图片
                $file_ext = strtolower( pathinfo( $file_path, PATHINFO_EXTENSION ) );
                $image_extensions = array( 'jpg', 'jpeg', 'png', 'gif', 'webp' );
                
                if ( in_array( $file_ext, $image_extensions ) ) {
                    // 检查文件是否已使用
                    if ( ! isset( $used_file_paths[ $file_path ] ) ) {
                        // 检查文件是否为已注册附件的一部分
                        $is_registered = isset( $registered_attachments[ $file_path ] );
                        
                        $unused_files[] = array(
                            'path' => $file_path,
                            'filename' => $file,
                            'size' => filesize( $file_path ),
                            'is_registered' => $is_registered,
                            'attachment_id' => $is_registered ? $registered_attachments[ $file_path ] : 0
                        );
                    }
                }
            }
        }
    }
    
    /**
     * 将URL转换为本地文件路径
     * 
     * @param string $url 文件URL
     * @return string|false 本地文件路径，失败返回false
     */
    private function url_to_path( $url ) {
        $upload_dir = wp_upload_dir();
        $upload_url = $upload_dir['baseurl'];
        
        // 替换URL为本地路径
        $file_path = str_replace( $upload_url, $upload_dir['basedir'], $url );
        
        // 确保路径存在
        if ( file_exists( $file_path ) ) {
            return $file_path;
        }
        
        return false;
    }
}
