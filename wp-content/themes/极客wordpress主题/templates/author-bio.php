<?php
/**
 * 作者信息模板
 *
 * 用于在文章详情页显示作者信息
 *
 * @package 极客wordpress主题
 */

if ( ! is_single() ) {
    return;
}

$author_id = get_the_author_meta( 'ID' );
?>

<div class="author-bio">
    <div class="author-avatar">
        <?php echo get_avatar( $author_id, 150 ); ?>
    </div>
    
    <div class="author-info">
        <h2 class="author-name"><?php echo get_the_author(); ?></h2>
        
        <?php if ( get_the_author_meta( 'description' ) ) : ?>
            <p class="author-description"><?php echo get_the_author_meta( 'description' ); ?></p>
        <?php endif; ?>
        
        <div class="author-links">
            <?php if ( get_the_author_meta( 'user_url' ) ) : ?>
                <a href="<?php echo esc_url( get_the_author_meta( 'user_url' ) ); ?>" class="author-website" target="_blank" rel="noopener noreferrer">
                    <?php esc_html_e( 'Website', 'geek-wp-theme' ); ?>
                </a>
            <?php endif; ?>
            
            <a href="<?php echo esc_url( get_author_posts_url( $author_id ) ); ?>" class="author-posts">
                <?php esc_html_e( 'View all posts', 'geek-wp-theme' ); ?>
            </a>
        </div>
    </div>
</div><!-- .author-bio -->