<?php get_header(); ?>
<?php geek_render_carousel(); ?>

<!-- 产品列表 -->
<section class="products-section py-5 bg-light">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 class="display-6 fw-bold">产品展示</h2>
                <p class="lead text-muted">我们的精选产品</p>
            </div>
        </div>
        
        <?php
        // 产品查询
        $products_args = array(
            'post_type' => 'product',
            'posts_per_page' => 4,
            'orderby' => 'date',
            'order' => 'DESC'
        );
        $products = new WP_Query($products_args);
        
        if ($products->have_posts()) :
        ?>
        <div class="row g-4">
            <?php while ($products->have_posts()) : $products->the_post(); ?>
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 shadow-sm transition-all duration-300 hover:shadow-lg">
                        <!-- 产品主图 -->
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="card-img-top overflow-hidden" style="height: 250px; background-color: #f8f9fa;">
                                <a href="<?php the_permalink(); ?>" class="d-block h-100 w-100 text-center">
                                    <?php 
                                    // 获取产品主图的完整URL
                                    $product_image_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
                                    // 使用large尺寸的图片，以获得更好的显示效果
                                    the_post_thumbnail('large', array(
                                        'class' => 'w-100 h-100 object-contain transition-transform duration-500 hover:scale-105',
                                        'alt' => get_the_title(),
                                        'loading' => 'lazy' // 延迟加载，提高性能
                                    ));
                                    ?>
                                </a>
                            </div>
                        <?php else : ?>
                            <!-- 无主图时显示占位符 -->
                            <div class="card-img-top overflow-hidden" style="height: 250px; background-color: #f8f9fa;">
                                <a href="<?php the_permalink(); ?>" class="d-block h-100 w-100 text-center d-flex align-items-center justify-content-center">
                                    <i class="bi bi-box-seam text-muted" style="font-size: 4rem;"></i>
                                </a>
                            </div>
                        <?php endif; ?>
                        
                        <div class="card-body">
                            <h3 class="card-title h5 mb-2">
                                <a href="<?php the_permalink(); ?>" class="text-dark text-decoration-none hover:text-primary transition-colors">
                                    <?php the_title(); ?>
                                </a>
                            </h3>
                            <div class="card-text text-muted mb-3">
                                <?php the_excerpt(); ?>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-sm">
                                查看详情
                            </a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </div>
        
        <div class="row mt-5 text-center">
            <div class="col-12">
                <a href="<?php echo get_post_type_archive_link('product'); ?>" class="btn btn-outline-primary btn-lg">
                    查看全部产品
                </a>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>

<?php get_footer();?>