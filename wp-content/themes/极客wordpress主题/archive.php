<?php
/**
 * 归档页面模板
 *
 * @package WordPress
 * @subpackage 极客wordpress主题
 * @since 1.0
 */

get_header(); ?>

    <!--==============================
    Breadcumb
============================== -->
    <div class="breadcumb-wrapper " data-bg-src="<?php echo get_template_directory_uri(); ?>/assets/img/breadcumb/bredcumb-1.png">
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">
                    <?php
                    if (is_category()) {
                        single_cat_title('分类：');
                    } elseif (is_tag()) {
                        single_tag_title('标签：');
                    } elseif (is_author()) {
                        echo '作者：' . get_the_author();
                    } elseif (is_date()) {
                        if (is_day()) {
                            echo '日期：' . get_the_date('Y年m月d日');
                        } elseif (is_month()) {
                            echo '日期：' . get_the_date('Y年m月');
                        } elseif (is_year()) {
                            echo '日期：' . get_the_date('Y年');
                        }
                    } else {
                        echo '文章列表';
                    }
                    ?>
                </h1>
            </div>
            <div class="breadcumb-menu-wrap">
                <ul class="breadcumb-menu">
                    <li><a href="<?php echo home_url(); ?>">首页</a></li>
                    <li class="active">
                        <?php
                        if (is_category()) {
                            single_cat_title();
                        } elseif (is_tag()) {
                            single_tag_title();
                        } elseif (is_author()) {
                            the_author();
                        } elseif (is_date()) {
                            echo get_the_date('Y年m月d日');
                        } else {
                            echo '文章列表';
                        }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--==============================
        Blog Area
    ==============================-->
    <section class="vs-blog-wrapper space-top space-extra-bottom">
        <div class="container">
            <div class="row gx-40">
                <div class="col-lg-8">
                    <?php
                    if (have_posts()) :
                        while (have_posts()) : the_post();
                    ?>
                    <div class="vs-blog blog-single">
                        <?php if (has_post_thumbnail()) : ?>
                        <div class="blog-img">
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large', array('alt' => get_the_title())); ?></a>
                            <a href="<?php the_permalink(); ?>" class="blog-date"><span class="date"><?php the_time('d'); ?></span> <?php the_time('F'); ?></a>
                        </div>
                        <?php endif; ?>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="<?php echo get_category_link(get_the_category()[0]->term_id); ?>"><?php echo get_the_category()[0]->name; ?></a>
                                <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">作者：<?php the_author(); ?></a>
                            </div>
                            <h2 class="blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <p><?php the_excerpt(); ?></p>
                            <a href="<?php the_permalink(); ?>" class="link-btn style3">阅读全文 <i class="fal fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <?php
                        endwhile;
                    else :
                        echo '<p>暂无文章</p>';
                    endif;
                    ?>
                    
                    <!-- 分页导航 -->
                    <div class="vs-pagination pb-30">
                        <ul>
                            <?php
                            echo paginate_links(array(
                                'prev_text' => '<i class="far fa-chevron-left"></i>',
                                'next_text' => '<i class="far fa-chevron-right"></i>',
                            ));
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>