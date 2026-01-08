<?php
/**
 * 产品归档页面模板
 *
 * @package 极客wordpress主题
 */

get_header();
?>

<main class="container">
    <div class="row">
        <div class="col-md-8">
            <header class="page-header">
                <h1 class="page-title">
                    <?php
                    if ( is_tax() ) {
                        single_term_title();
                    } else {
                        post_type_archive_title();
                    }
                    ?>
                </h1>
            </header>

            <?php if ( have_posts() ) : ?>
                <div class="row">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <div class="col-12 col-md-4">
                            <article class="card mb-4">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <div class="card-img-top">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail( 'medium', array( 'class' => 'img-fluid' ) ); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <div class="card-body">
                                    <div class="card-categories mb-2">
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
                                    <h3 class="card-title h5">
                                        <a href="<?php the_permalink(); ?>" class="text-dark">
                                            <?php the_title(); ?>
                                        </a>
                                    </h3>
                                    <div class="card-excerpt">
                                        <?php the_excerpt(); ?>
                                    </div>
                                    <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-sm">
                                        查看详情
                                    </a>
                                </div>
                            </article>
                        </div>
                    <?php endwhile; ?>
                </div>

                <?php the_posts_navigation(); ?>
            <?php else : ?>
                <div class="alert alert-info">
                    暂无产品
                </div>
            <?php endif; ?>
        </div>

        <?php get_sidebar(); ?>
    </div>
</main>

<?php get_footer(); ?>
