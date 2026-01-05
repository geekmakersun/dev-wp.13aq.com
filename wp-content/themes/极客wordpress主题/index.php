<?php
/**
 * 首页模板
 *
 * 显示文章列表
 *
 * @package 极客wordpress主题
 */

get_header();
?>

<div class="container main-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            
            <?php
            if ( have_posts() ) :
                
                /* 开始文章循环 */
                while ( have_posts() ) :
                    the_post();
                    ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title( '<h2 class="post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
        <div class="entry-meta">
            <span class="posted-on"><?php echo get_the_date(); ?></span>
            <span class="byline"> <?php esc_html_e( 'by', 'geek-wp-theme' ); ?> <?php the_author(); ?></span>
        </div>
    </header>
    
    <?php if ( has_post_thumbnail() ) : ?>
        <a href="<?php echo esc_url( get_permalink() ); ?>" class="post-thumbnail">
            <?php the_post_thumbnail( 'medium', array( 'class' => 'archive-thumbnail' ) ); ?>
        </a>
    <?php endif; ?>
    
    <div class="entry-content">
        <?php the_excerpt(); ?>
        <a href="<?php echo esc_url( get_permalink() ); ?>" class="read-more"><?php esc_html_e( 'Read More', 'geek-wp-theme' ); ?></a>
    </div>
</article>

                <?php
                endwhile;
                
                /* 显示分页导航 */
                the_posts_navigation( array(
                    'prev_text' => esc_html__( '&laquo; Previous', 'geek-wp-theme' ),
                    'next_text' => esc_html__( 'Next &raquo;', 'geek-wp-theme' ),
                ) );
                
            else :
                
                /* 没有文章时显示 */
                ?>
                <section class="no-results">
                    <h2><?php esc_html_e( 'No Posts Found', 'geek-wp-theme' ); ?></h2>
                    <p><?php esc_html_e( 'Sorry, no posts found.', 'geek-wp-theme' ); ?></p>
                </section>
                <?php
                
            endif;
            ?>
            
        </main>
    </div>
    
    <?php get_sidebar(); ?>
    
</div>

<?php
get_footer();
?>
