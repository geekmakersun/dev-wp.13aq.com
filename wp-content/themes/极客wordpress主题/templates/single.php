<?php
/**
 * 文章内容模板
 *
 * 显示文章详情
 *
 * @package 极客wordpress主题
 */

// 如果在主循环中
if ( have_posts() ) :
    while ( have_posts() ) :
        the_post();
        ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        <div class="entry-meta">
            <span class="posted-on">
                <time class="entry-date published" datetime="<?php echo get_the_date( DATE_W3C ); ?>">
                    <?php echo get_the_date(); ?>
                </time>
                <?php if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) : ?>
                    <time class="updated" datetime="<?php echo get_the_modified_date( DATE_W3C ); ?>">
                        <?php echo get_the_modified_date(); ?>
                    </time>
                <?php endif; ?>
            </span>
            <span class="byline"> by <?php the_author(); ?></span>
            <?php if ( has_category() ) : ?>
                <span class="cat-links">
                    <?php the_category( ', ' ); ?>
                </span>
            <?php endif; ?>
            <?php if ( has_tag() ) : ?>
                <span class="tags-links">
                    <?php the_tags( '', ', ', '' ); ?>
                </span>
            <?php endif; ?>
        </div>
    </header>
    
    <!-- 特色图片 -->
    <?php if ( has_post_thumbnail() ) : ?>
        <div class="post-thumbnail">
            <?php the_post_thumbnail( 'large', array( 'class' => 'featured-image' ) ); ?>
        </div>
    <?php endif; ?>
    
    <div class="entry-content">
        <?php the_content(); ?>
        
        <?php
        wp_link_pages( array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'geek-wp-theme' ),
            'after'  => '</div>',
        ) );
        ?>
    </div>
    
    <footer class="entry-footer">
        <?php edit_post_link( esc_html__( 'Edit', 'geek-wp-theme' ), '<span class="edit-link">', '</span>' ); ?>
    </footer>
</article>

<!-- 作者信息 -->
<?php get_template_part( 'templates/author-bio' ); ?>

<!-- 评论 -->
<?php
if ( comments_open() || get_comments_number() ) :
    comments_template();
endif;
?>

<!-- 前后文章导航 -->
<nav class="navigation post-navigation">
    <h2 class="screen-reader-text"><?php esc_html_e( 'Post navigation', 'geek-wp-theme' ); ?></h2>
    <div class="nav-links">
        <div class="nav-previous"><?php previous_post_link( '%link', '<span class="nav-subtitle"><i class="fas fa-chevron-left"></i> ' . esc_html__( 'Previous Post', 'geek-wp-theme' ) . '</span><span class="nav-title">%title</span>' ); ?></div>
        <div class="nav-next"><?php next_post_link( '%link', '<span class="nav-subtitle">' . esc_html__( 'Next Post', 'geek-wp-theme' ) . ' <i class="fas fa-chevron-right"></i></span><span class="nav-title">%title</span>' ); ?></div>
    </div>
</nav>

        <?php
    endwhile;
endif;
?>
