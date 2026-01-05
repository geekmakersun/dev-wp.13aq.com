<?php
/**
 * 页脚模板
 *
 * 包含页脚信息
 *
 * @package 极客wordpress主题
 */
?>

    </div><!-- #content -->
    
    <!-- 页脚 -->
    <footer id="colophon" class="site-footer">
        <div class="container">
            <div class="site-info">
                <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'geek-wp-theme' ) ); ?>">
                    <?php printf( esc_html__( 'Proudly powered by %s', 'geek-wp-theme' ), 'WordPress' ); ?>
                </a>
                <span class="sep"> | </span>
                <?php printf( esc_html__( 'Theme: %1$s by %2$s', 'geek-wp-theme' ), '极客wordpress主题', '<a href="https://example.com">极客团队</a>' ); ?>
            </div>
        </div>
    </footer>
    
    <?php wp_footer(); ?>
    
</body>
</html>
