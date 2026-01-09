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

<!-- 面包屑导航 -->
<div class="breadcumb-wrapper" data-bg-src="<?php echo get_template_directory_uri(); ?>/assets/img/breadcumb/bredcumb-1.png">
    <div class="container z-index-common">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title"><?php the_title(); ?></h1>
        </div>
        <div class="breadcumb-menu-wrap">
            <ul class="breadcumb-menu">
                <li><a href="<?php echo home_url(); ?>">首页</a></li>
                <?php if ( has_category() ) : ?>
                    <?php $categories = get_the_category(); ?>
                    <?php $category = $categories[0]; ?>
                    <li><a href="<?php echo get_category_link( $category->term_id ); ?>"><?php echo $category->name; ?></a></li>
                <?php endif; ?>
                <li class="active"><?php the_title(); ?></li>
            </ul>
        </div>
    </div>
</div>

<!--==============================
        Blog Area
    ==============================-->
<section class="vs-blog-wrapper blog-details space-top space-extra-bottom">
    <div class="container">
        <div class="row gx-40">
            <div class="col-lg-8">
                <div class="vs-blog blog-single">
                    
                    <!-- 特色图片 -->
                    <div class="blog-img">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( 'large', array( 'class' => 'w-100' ) ); ?>
                        <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/blog/blog-s-1-6.jpg" alt="Blog Image">
                        <?php endif; ?>
                        <a href="#" class="blog-date"><span class="date"><?php echo get_the_date( 'd' ); ?></span> <?php echo get_the_date( 'F' ); ?></a>
                    </div>
                    
                    <!-- 文章内容 -->
                    <div class="blog-content">
                        <div class="blog-meta">
                            <?php if ( has_category() ) : ?>
                                <a href="#"><?php the_category( ', ' ); ?></a>
                            <?php endif; ?>
                            <a href="#">By <?php the_author(); ?></a>
                        </div>
                        
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
                    
                    <!-- 标签和分享 -->
                    <div class="share-links clearfix">
                        <div class="row justify-content-between">
                            <div class="col-md-auto">
                                <div class="tagcloud">
                                    <?php if ( has_tag() ) : ?>
                                        <?php the_tags( '', '', '' ); ?>
                                    <?php else : ?>
                                        <a href="#">Tools</a>
                                        <a href="#">Furnitures</a>
                                        <a href="#">Store</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-auto text-md-end mt-20 mt-md-0">
                                <span class="share-links-title">Share:</span>
                                <ul class="social-links">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <!-- 前后文章导航 -->
                    <div class="post-pagination">
                        <div class="row justify-content-between gx-0">
                            <div class="col-6">
                                <?php $prev_post = get_previous_post(); ?>
                                <?php if ( $prev_post ) : ?>
                                    <div class="post-pagi-box prev">
                                        <div class="media-img">
                                            <?php echo get_the_post_thumbnail( $prev_post->ID, 'thumbnail' ); ?>
                                        </div>
                                        <div class="media-body">
                                            <a href="<?php echo get_permalink( $prev_post->ID ); ?>">上一篇</a>
                                            <h4 class="pagi-title"><a href="<?php echo get_permalink( $prev_post->ID ); ?>" class="text-inherit"><?php echo $prev_post->post_title; ?></a></h4>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-6">
                                <?php $next_post = get_next_post(); ?>
                                <?php if ( $next_post ) : ?>
                                    <div class="post-pagi-box next">
                                        <div class="media-img">
                                            <?php echo get_the_post_thumbnail( $next_post->ID, 'thumbnail' ); ?>
                                        </div>
                                        <div class="media-body">
                                            <a href="<?php echo get_permalink( $next_post->ID ); ?>">下一篇</a>
                                            <h4 class="pagi-title"><a href="<?php echo get_permalink( $next_post->ID ); ?>" class="text-inherit"><?php echo $next_post->post_title; ?></a></h4>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    
                    <!-- 评论 -->
                    <div class="vs-comments-wrap">
                        <h2 class="blog-inner-title h2"><?php comments_number( '0 条评论', '1 条评论', '% 条评论' ); ?></h2>
                        <?php
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;
                        ?>
                    </div>
                    
                    <!-- 评论表单 -->
                    <div class="vs-comment-form">
                        <?php comment_form(); ?>
                    </div>
                </div>
            </div>
            
            <!-- 侧边栏 -->
            <div class="col-lg-4">
                <aside class="sidebar-area">
                    <!-- 搜索 -->
                    <div class="widget widget_search">
                        <h3 class="widget_title">搜索</h3>
                        <form class="search-form" role="search" method="get" action="<?php echo home_url( '/' ); ?>">
                            <input type="text" placeholder="输入关键词" name="s">
                            <button type="submit"><i class="far fa-search"></i></button>
                        </form>
                    </div>
                    
                    <!-- 作者信息 -->
                    <div class="widget p-0">
                        <div class="widget-author-about">
                            <div class="avater"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/blog/author-about.jpg" alt="About Author"></div>
                            <div class="media-body">
                                <h4 class="name"><?php the_author(); ?></h4>
                                <p class="text"><?php the_author_meta( 'description' ); ?></p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- 分类 -->
                    <div class="widget widget_categories">
                        <h3 class="widget_title">分类</h3>
                        <ul>
                            <?php
                            $categories = get_categories( array(
                                'orderby' => 'count',
                                'order' => 'DESC',
                            ) );
                            foreach ( $categories as $category ) :
                                ?>
                                <li>
                                    <a href="<?php echo get_category_link( $category->term_id ); ?>"><?php echo $category->name; ?></a>
                                    <span>(<?php echo $category->count; ?>)</span>
                                </li>
                                <?php
                            endforeach;
                            ?>
                        </ul>
                    </div>
                    
                    <!-- 最新文章 -->
                    <div class="widget">
                        <h3 class="widget_title">最新文章</h3>
                        <div class="recent-post-wrap">
                            <?php
                            $recent_posts = wp_get_recent_posts( array(
                                'numberposts' => 3,
                                'post_status' => 'publish',
                                'exclude' => get_the_ID(),
                            ) );
                            foreach ( $recent_posts as $post ) :
                                ?>
                                <div class="recent-post">
                                    <div class="media-img">
                                        <a href="<?php echo get_permalink( $post['ID'] ); ?>">
                                            <?php echo get_the_post_thumbnail( $post['ID'], 'thumbnail' ); ?>
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <div class="recent-post-meta">
                                            <a href="#"><?php echo get_the_date( 'F j, Y', $post['ID'] ); ?></a>
                                        </div>
                                        <h4 class="post-title"><a class="text-inherit" href="<?php echo get_permalink( $post['ID'] ); ?>"><?php echo $post['post_title']; ?></a></h4>
                                    </div>
                                </div>
                                <?php
                            endforeach;
                            wp_reset_query();
                            ?>
                        </div>
                    </div>
                    
                    <!-- 标签云 -->
                    <div class="widget widget_tag_cloud">
                        <h3 class="widget_title">标签</h3>
                        <div class="tagcloud">
                            <?php wp_tag_cloud( array(
                                'number' => 15,
                                'format' => 'flat',
                                'separator' => '',
                            ) ); ?>
                        </div>
                    </div>
                    
                    <!-- 画廊 -->
                    <div class="widget">
                        <h4 class="widget_title">画廊</h4>
                        <div class="sidebar-gallery">
                            <div class="gallery-thumb">
                                <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/widget/gal-1-1.jpg" alt="Gallery Image" class="w-100"></a>
                            </div>
                            <div class="gallery-thumb">
                                <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/widget/gal-1-2.jpg" alt="Gallery Image" class="w-100"></a>
                            </div>
                            <div class="gallery-thumb">
                                <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/widget/gal-1-3.jpg" alt="Gallery Image" class="w-100"></a>
                            </div>
                            <div class="gallery-thumb">
                                <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/widget/gal-1-4.jpg" alt="Gallery Image" class="w-100"></a>
                            </div>
                            <div class="gallery-thumb">
                                <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/widget/gal-1-5.jpg" alt="Gallery Image" class="w-100"></a>
                            </div>
                            <div class="gallery-thumb">
                                <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/widget/gal-1-6.jpg" alt="Gallery Image" class="w-100"></a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- 广告 -->
                    <div class="ad-banner mb-30">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/banner/blog-banner.jpg" alt="Blog Banner" class="w-100">
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>

        <?php
    endwhile;
endif;
?>
