<?php get_header(); ?>


<!--==============================
      Hero Area
    ==============================-->
<section class="hero-area position-relative">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel0" data-bs-interval="3000">
        <!-- 指示器 -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <!-- 轮播内容 -->
        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <img data-src="<?php echo get_template_directory_uri(); ?>/assets/img/hero/hero-slide-11-1.jpg" class="d-block w-100 hero-bg lazy" alt="hero slide 1">
                <div class="carousel-caption hero-content d-flex align-items-center justify-content-start h-100">
                    <div class="container px-4 px-md-5">
                        <div class="row">
                            <div class="col-12 col-md-8">
                                <p class="hero-subtitle animate__animated animate__fadeInLeft display-6">夏季特惠</p>
                                <h1 class="hero-title animate__animated animate__fadeInLeft animate__delay-0.2s display-2">最高优惠10%</h1>
                                <h1 class="hero-title animate__animated animate__fadeInLeft animate__delay-0.3s display-2">音箱</h1>
                                <p class="hero-text animate__animated animate__fadeInLeft animate__delay-0.5s lead">标准Lorem ipsum段落的创建时间各不相同，有些人引用15世纪</p>
                                <a href="<?php echo home_url(); ?>/shop" class="btn btn-primary hero-btn animate__animated animate__fadeInUp animate__delay-0.8s btn-lg">探索商店</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
                <img data-src="<?php echo get_template_directory_uri(); ?>/assets/img/hero/hero-slide-11-2.jpg" class="d-block w-100 hero-bg lazy" alt="hero slide 2">
                <div class="carousel-caption hero-content d-flex align-items-center justify-content-start h-100">
                    <div class="container px-4 px-md-5">
                        <div class="row">
                            <div class="col-12 col-md-8">
                                <p class="hero-subtitle animate__animated animate__fadeInLeft display-6">夏季特惠</p>
                                <h1 class="hero-title animate__animated animate__fadeInLeft animate__delay-0.2s display-2">家庭套餐</h1>
                                <h1 class="hero-title animate__animated animate__fadeInLeft animate__delay-0.3s display-2">限时抢购</h1>
                                <p class="hero-text animate__animated animate__fadeInLeft animate__delay-0.5s lead">Creation timelines for the standard lorem ipsum passage vary with some citing the 15th century</p>
                                <a href="<?php echo home_url(); ?>/shop" class="btn btn-primary hero-btn animate__animated animate__fadeInUp animate__delay-0.8s btn-lg">探索商店</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item">
                <img data-src="<?php echo get_template_directory_uri(); ?>/assets/img/hero/hero-slide-11-3.jpg" class="d-block w-100 hero-bg lazy" alt="hero slide 3">
                <div class="carousel-caption hero-content d-flex align-items-center justify-content-start h-100">
                    <div class="container px-4 px-md-5">
                        <div class="row">
                            <div class="col-12 col-md-8">
                                <p class="hero-subtitle animate__animated animate__fadeInLeft display-6">值得信赖的市场</p>
                                <h1 class="hero-title animate__animated animate__fadeInLeft animate__delay-0.2s display-2">Vendora 在线</h1>
                                <h1 class="hero-title animate__animated animate__fadeInLeft animate__delay-0.3s display-2">智能商店</h1>
                                <p class="hero-text animate__animated animate__fadeInLeft animate__delay-0.5s lead">Creation timelines for the standard lorem ipsum passage vary with some citing the 15th century</p>
                                <a href="<?php echo home_url(); ?>/shop" class="btn btn-primary hero-btn animate__animated animate__fadeInUp animate__delay-0.8s btn-lg">探索商店</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 导航按钮 -->
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">上一张</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">下一张</span>
        </button>
    </div>
</section>

<!--==============================
    产品筛选区域
    ==============================-->
<section class="space-extra">
    <div class="container">
        <div class="title-area text-center">
            <h2 class="sec-title">畅销产品</h2>
            <p class="sec-title">我们的活动、最新趋势和新系列</p>
            <div class="sec-line"></div>
        </div>
        <div class="text-center">
            <div class="filter-menu style3 filter-menu-active">
                <button data-filter="*" class="active">全部</button>
                <?php
                    // 获取所有产品分类
                    $product_categories = get_terms(array(
                        'taxonomy' => 'product_cat',
                        'hide_empty' => true,
                    ));
                    
                    // 生成分类筛选按钮
                    foreach ($product_categories as $category) {
                        $category_name = $category->name;
                        echo '<button data-filter=".' . esc_attr($category_name) . '">' . esc_html($category_name) . '</button>';
                    }
                ?>
            </div>
        </div>
        <div class="row filter-active">
            <?php
                // 查询所有产品
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => 12,
                );
                
                $products = new WP_Query($args);
                
                if ($products->have_posts()) {
                    while ($products->have_posts()) {
                        $products->the_post();
                        global $product;
                        
                        // 获取产品分类
                        $terms = get_the_terms(get_the_ID(), 'product_cat');
                        $category_classes = '';
                        
                        if ($terms && !is_wp_error($terms)) {
                            foreach ($terms as $term) {
                                $category_classes .= ' ' . $term->name;
                            }
                        }
                        
                        // 获取产品图片
                        $product_image = get_the_post_thumbnail_url(get_the_ID(), 'woocommerce_thumbnail');
                        if (!$product_image) {
                            $product_image = get_template_directory_uri() . '/assets/img/featued/featued-3-1.jpg'; // 默认图片
                        }
                        
                        // 获取产品价格
                        $product_price = $product->get_price_html();
                        
                        // 获取产品链接
                        $product_link = get_permalink();
                        
                        // 获取产品标签
                        $product_label = '';
                        if ($product->is_on_sale()) {
                            $product_label = '<div class="product-label style2">特价</div>';
                        } elseif (!$product->is_in_stock()) {
                            $product_label = '<div class="product-label style2">已售</div>';
                        }
                        
                        // 获取产品分类链接
                        $category_link = '';
                        if ($terms && !is_wp_error($terms)) {
                            $category_link = get_term_link($terms[0]);
                        }
                        
                        // 获取产品分类名称
                        $category_name = '';
                        if ($terms && !is_wp_error($terms)) {
                            $category_name = $terms[0]->name;
                        }
                    ?>
                    <div class="col-6 col-md-4 col-lg-4 col-xl-3 filter-item<?php echo esc_attr($category_classes); ?>">
                        <div class="vs-product product_layout4">
                            <div class="product-img">
                                <?php echo $product_label; ?>
                                <a href="<?php echo esc_url($product_link); ?>"><img src="<?php echo esc_url($product_image); ?>" alt="<?php the_title(); ?>"></a>
                                <div class="actions">
                                    <a href="<?php echo esc_url($product->add_to_cart_url()); ?>" class="icon-btn style2" data-quantity="1" data-product_id="<?php echo get_the_ID(); ?>" data-product_sku="" aria-label="<?php echo esc_attr(sprintf(__('Add to cart: %s', 'woocommerce'), get_the_title())); ?>" rel="nofollow"><i class="fal fa-shopping-bag"></i></a>
                                    <a href="<?php echo esc_url($product_link); ?>" class="icon-btn style2"><i class="fal fa-eye"></i></a>
                                    <a href="#" class="icon-btn style2"><i class="fal fa-heart"></i></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="product-category">
                                    <a href="<?php echo esc_url($category_link); ?>"><?php echo esc_html($category_name); ?></a>
                                </div>
                                <h3 class="product-title"><a href="<?php echo esc_url($product_link); ?>"><?php the_title(); ?></a></h3>
                                <div class="product-price"><?php echo $product_price; ?></div>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    wp_reset_postdata();
                }
            ?>
        </div>
    </div>
</section>

<!--==============================
    最新文章区域
    ==============================-->
<section class="vs-blog-wrapper space-top space-extra-bottom">
    <div class="container">
        <div class="title-area">
            <div class="row justify-content-between align-items-center text-center text-md-start">
                <div class="col-auto">
                    <h2 class="sec-title">最新文章</h2>
                    <p class="sec-title">我们的最新动态和文章</p>
                    <div class="sec-line"></div>
                </div>
                <div class="col-md-auto mt-20 mt-lg-0">
                    <button class="icon-btn style4 me-2" data-bs-target="#blogCarousel" data-bs-slide="prev"><i class="far fa-chevron-left"></i></button>
                    <button class="icon-btn style4" data-bs-target="#blogCarousel" data-bs-slide="next"><i class="far fa-chevron-right"></i></button>
                </div>
            </div>
        </div>
        
        <!-- Bootstrap Carousel 组件 -->
        <div id="blogCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 6,
                    'paged' => 1
                );
                $query = new WP_Query($args);
                $posts = $query->posts;
                $posts_per_slide = 3;
                $total_slides = ceil(count($posts) / $posts_per_slide);
                
                if ($total_slides > 0 && count($posts) > 0) :
                    for ($i = 0; $i < $total_slides; $i++) :
                        $slide_posts = array_slice($posts, $i * $posts_per_slide, $posts_per_slide);
                        $remaining_posts = count($slide_posts);
                ?>
                <div class="carousel-item <?php if ($i == 0) echo 'active'; ?>">
                    <div class="row">
                        <?php foreach ($slide_posts as $post) : setup_postdata($post); ?>
                        <div class="col-xl-4">
                            <div class="vs-blog blog-card" style="height: 100%; display: flex; flex-direction: column; margin-bottom: 30px;">
                                <div class="blog-img" style="height: 240px; overflow: hidden; margin-bottom: 15px;">
                                    <?php if (has_post_thumbnail()) : ?>
                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium', array('alt' => get_the_title(), 'class' => 'w-100 h-100 object-fit-cover')); ?></a>
                                    <?php else : ?>
                                    <a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/blog/default.jpg" alt="默认图片" class="w-100 h-100 object-fit-cover"></a>
                                    <?php endif; ?>
                                </div>
                                <div class="blog-content" style="flex: 1; display: flex; flex-direction: column;">
                                    <div class="blog-meta" style="margin-bottom: 10px; font-size: 14px;">
                                        <a href="<?php the_permalink(); ?>" style="color: #666; margin-right: 15px;"><?php the_time('Y年m月d日'); ?></a>
                                        <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" style="color: #666;"><?php the_author(); ?></a>
                                    </div>
                                    <h3 class="blog-title h4" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; min-height: 2.4em; line-height: 1.2; height: 2.4em; margin-bottom: 10px;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <?php $excerpt = get_the_excerpt(); if (!empty($excerpt)) : ?>
                                    <p class="blog-text" style="display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; flex: 1;"><?php echo $excerpt; ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; wp_reset_postdata(); ?>
                        
                        <!-- 确保每轮播项都有3个卡片，避免空白 -->
                        <?php if ($remaining_posts < 3) :
                            $args = array(
                                'post_type' => 'post',
                                'posts_per_page' => 3 - $remaining_posts,
                                'paged' => 1
                            );
                            $extra_query = new WP_Query($args);
                            if ($extra_query->have_posts()) :
                                while ($extra_query->have_posts()) : $extra_query->the_post();
                        ?>
                        <div class="col-xl-4">
                            <div class="vs-blog blog-card" style="height: 100%; display: flex; flex-direction: column; margin-bottom: 30px;">
                                <div class="blog-img" style="height: 240px; overflow: hidden; margin-bottom: 15px;">
                                    <?php if (has_post_thumbnail()) : ?>
                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium', array('alt' => get_the_title(), 'class' => 'w-100 h-100 object-fit-cover')); ?></a>
                                    <?php else : ?>
                                    <a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/blog/default.jpg" alt="默认图片" class="w-100 h-100 object-fit-cover"></a>
                                    <?php endif; ?>
                                </div>
                                <div class="blog-content" style="flex: 1; display: flex; flex-direction: column;">
                                    <div class="blog-meta" style="margin-bottom: 10px; font-size: 14px;">
                                        <a href="<?php the_permalink(); ?>" style="color: #666; margin-right: 15px;"><?php the_time('Y年m月d日'); ?></a>
                                        <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" style="color: #666;"><?php the_author(); ?></a>
                                    </div>
                                    <h3 class="blog-title h4" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; min-height: 2.4em; line-height: 1.2; height: 2.4em; margin-bottom: 10px;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <?php $excerpt = get_the_excerpt(); if (!empty($excerpt)) : ?>
                                    <p class="blog-text" style="display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; flex: 1;"><?php echo $excerpt; ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; wp_reset_postdata(); endif; endif; ?>
                    </div>
                </div>
                <?php endfor; 
                else : ?>
                <!-- 当没有文章时显示 -->
                <div class="carousel-item active">
                    <div class="row justify-content-center">
                        <div class="col-12 text-center py-5">
                            <p class="sec-title">暂无文章</p>
                        </div>
                    </div>
                </div>
                <?php endif; 
                wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>