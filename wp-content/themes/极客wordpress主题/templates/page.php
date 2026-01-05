<?php
/**
 * 页面内容模板
 *
 * 显示单页内容
 *
 * @package 极客wordpress主题
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'page-content' ); ?>>
    <header class="page-header">
        <?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
    </header>
    
    <div class="page-body">
        <div class="entry-content">
            <?php the_content(); ?>
            
            <?php
            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'geek-wp-theme' ),
                'after'  => '</div>',
            ) );
            ?>
        </div>
    </div>
</article>

<?php
// 显示评论
if ( comments_open() || get_comments_number() ) :
    comments_template();
endif;
?>
