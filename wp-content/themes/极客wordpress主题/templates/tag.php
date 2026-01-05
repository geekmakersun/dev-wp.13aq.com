<?php
/**
 * 标签归档模板
 *
 * 显示标签下的文章列表
 *
 * @package 极客wordpress主题
 */
?>

<!-- 标签标题 -->
<header class="page-header">
    <h1 class="page-title">
        <?php
        single_tag_title( esc_html__( 'Tag: ', 'geek-wp-theme' ) );
        ?>
    </h1>
    <?php
    $tag_description = tag_description();
    if ( ! empty( $tag_description ) ) :
        echo '<div class="taxonomy-description">' . $tag_description . '</div>';
    endif;
    ?>
</header>

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
            <span class="byline"> by <?php the_author(); ?></span>
            <span class="comments-link"><?php comments_popup_link( esc_html__( '0 Comments', 'geek-wp-theme' ), esc_html__( '1 Comment', 'geek-wp-theme' ), esc_html__( '% Comments', 'geek-wp-theme' ) ); ?></span>
        </div>
    </header>
    
    <!-- 特色图片 -->
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
        <p><?php esc_html_e( 'Sorry, no posts found with this tag.', 'geek-wp-theme' ); ?></p>
    </section>
    <?php
    
endif;
?>
