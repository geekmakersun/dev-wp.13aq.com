<?php
/**
 * 产品详情页面模板
 *
 * @package 极客wordpress主题
 */

get_header();
?>

<main class="container">
    <div class="row">
        <div class="col-md-8">
            <?php while ( have_posts() ) : the_post(); ?>
                <article class="post">
                    <header class="post-header mb-4">
                        <div class="post-categories mb-2">
                            <?php
                            $categories = get_the_terms( get_the_ID(), 'product_category' );
                            if ( $categories ) {
                                echo '<ul class="list-inline">';
                                foreach ( $categories as $category ) {
                                    echo '<li class="list-inline-item">';
                                    echo '<a href="' . esc_url( get_term_link( $category ) ) . '" class="badge badge-primary">';
                                    echo esc_html( $category->name );
                                    echo '</a>';
                                    echo '</li>';
                                }
                                echo '</ul>';
                            }
                            ?>
                        </div>
                        <h1 class="post-title">
                            <?php the_title(); ?>
                        </h1>
                        <div class="post-meta text-muted">
                            <span class="post-date">
                                <i class="fas fa-calendar-alt"></i> <?php echo get_the_date(); ?>
                            </span>
                        </div>
                    </header>

                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="post-thumbnail mb-4">
                            <?php the_post_thumbnail( 'large', array( 'class' => 'img-fluid rounded' ) ); ?>
                        </div>
                    <?php endif; ?>

                    <div class="post-content">
                        <?php the_content(); ?>
                    </div>

                    <?php if ( comments_open() || get_comments_number() ) : ?>
                        <div class="post-comments mt-5">
                            <?php comments_template(); ?>
                        </div>
                    <?php endif; ?>
                </article>
            <?php endwhile; ?>
        </div>

        <?php get_sidebar(); ?>
    </div>
</main>

<?php get_footer(); ?>
