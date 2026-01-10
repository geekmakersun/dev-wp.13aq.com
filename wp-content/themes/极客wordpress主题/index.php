<?php get_header(); ?>


<!--==============================
      Hero Area
    ==============================-->
<section class="hero-area position-relative">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="3000">
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
                <div class="carousel-caption hero-content">
                    <!-- 桌面显示 -->
                    <div class="d-none d-lg-block">
                        <p class="hero-subtitle animate__animated animate__fadeInLeft">夏季特惠</p>
                        <h1 class="hero-title animate__animated animate__fadeInLeft animate__delay-0.2s">最高优惠10%</h1>
                        <h1 class="hero-title animate__animated animate__fadeInLeft animate__delay-0.3s">音箱</h1>
                        <p class="hero-text animate__animated animate__fadeInLeft animate__delay-0.5s">标准Lorem ipsum段落的创建时间各不相同，有些人引用15世纪</p>
                        <a href="<?php echo home_url(); ?>/shop" class="btn btn-primary hero-btn animate__animated animate__fadeInUp animate__delay-0.8s">探索商店</a>
                    </div>
                    <!-- 平板显示 -->
                    <div class="d-none d-md-block d-lg-none">
                        <p class="hero-subtitle-tablet animate__animated animate__fadeInLeft">夏季特惠</p>
                        <h1 class="hero-title-tablet animate__animated animate__fadeInLeft animate__delay-0.2s">最高优惠10%</h1>
                        <h1 class="hero-title-tablet animate__animated animate__fadeInLeft animate__delay-0.3s">音箱</h1>
                        <p class="hero-text-tablet animate__animated animate__fadeInLeft animate__delay-0.5s">标准Lorem ipsum段落的创建时间各不相同，有些人引用15世纪</p>
                        <a href="<?php echo home_url(); ?>/shop" class="btn btn-primary hero-btn-tablet animate__animated animate__fadeInUp animate__delay-0.8s">探索商店</a>
                    </div>
                    <!-- 手机显示 -->
                    <div class="d-block d-md-none">
                        <h1 class="hero-title-mobile animate__animated animate__fadeInLeft">最高优惠10%</h1>
                        <h1 class="hero-title-mobile animate__animated animate__fadeInLeft animate__delay-0.2s">音箱</h1>
                        <a href="<?php echo home_url(); ?>/shop" class="btn btn-primary hero-btn-mobile animate__animated animate__fadeInUp animate__delay-0.5s">探索商店</a>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
                <img data-src="<?php echo get_template_directory_uri(); ?>/assets/img/hero/hero-slide-11-2.jpg" class="d-block w-100 hero-bg lazy" alt="hero slide 2">
                <div class="carousel-caption hero-content">
                    <!-- 桌面显示 -->
                    <div class="d-none d-lg-block">
                        <p class="hero-subtitle animate__animated animate__fadeInLeft">夏季特惠</p>
                        <h1 class="hero-title animate__animated animate__fadeInLeft animate__delay-0.2s">家庭套餐</h1>
                        <h1 class="hero-title animate__animated animate__fadeInLeft animate__delay-0.3s">限时抢购</h1>
                        <p class="hero-text animate__animated animate__fadeInLeft animate__delay-0.5s">Creation timelines for the standard lorem ipsum passage vary with some citing the 15th century</p>
                        <a href="<?php echo home_url(); ?>/shop" class="btn btn-primary hero-btn animate__animated animate__fadeInUp animate__delay-0.8s">探索商店</a>
                    </div>
                    <!-- 平板显示 -->
                    <div class="d-none d-md-block d-lg-none">
                        <p class="hero-subtitle-tablet animate__animated animate__fadeInLeft">夏季特惠</p>
                        <h1 class="hero-title-tablet animate__animated animate__fadeInLeft animate__delay-0.2s">家庭套餐</h1>
                        <h1 class="hero-title-tablet animate__animated animate__fadeInLeft animate__delay-0.3s">限时抢购</h1>
                        <p class="hero-text-tablet animate__animated animate__fadeInLeft animate__delay-0.5s">Creation timelines for the standard lorem ipsum passage vary with some citing the 15th century</p>
                        <a href="<?php echo home_url(); ?>/shop" class="btn btn-primary hero-btn-tablet animate__animated animate__fadeInUp animate__delay-0.8s">探索商店</a>
                    </div>
                    <!-- 手机显示 -->
                    <div class="d-block d-md-none">
                        <h1 class="hero-title-mobile animate__animated animate__fadeInLeft">家庭套餐</h1>
                        <h1 class="hero-title-mobile animate__animated animate__fadeInLeft animate__delay-0.2s">限时抢购</h1>
                        <a href="<?php echo home_url(); ?>/shop" class="btn btn-primary hero-btn-mobile animate__animated animate__fadeInUp animate__delay-0.5s">探索商店</a>
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item">
                <img data-src="<?php echo get_template_directory_uri(); ?>/assets/img/hero/hero-slide-11-3.jpg" class="d-block w-100 hero-bg lazy" alt="hero slide 3">
                <div class="carousel-caption hero-content">
                    <!-- 桌面显示 -->
                    <div class="d-none d-lg-block">
                        <p class="hero-subtitle animate__animated animate__fadeInLeft">值得信赖的市场</p>
                        <h1 class="hero-title animate__animated animate__fadeInLeft animate__delay-0.2s">Vendora 在线</h1>
                        <h1 class="hero-title animate__animated animate__fadeInLeft animate__delay-0.3s">智能商店</h1>
                        <p class="hero-text animate__animated animate__fadeInLeft animate__delay-0.5s">Creation timelines for the standard lorem ipsum passage vary with some citing the 15th century</p>
                        <a href="<?php echo home_url(); ?>/shop" class="btn btn-primary hero-btn animate__animated animate__fadeInUp animate__delay-0.8s">探索商店</a>
                    </div>
                    <!-- 平板显示 -->
                    <div class="d-none d-md-block d-lg-none">
                        <p class="hero-subtitle-tablet animate__animated animate__fadeInLeft">值得信赖的市场</p>
                        <h1 class="hero-title-tablet animate__animated animate__fadeInLeft animate__delay-0.2s">Vendora 在线</h1>
                        <h1 class="hero-title-tablet animate__animated animate__fadeInLeft animate__delay-0.3s">智能商店</h1>
                        <p class="hero-text-tablet animate__animated animate__fadeInLeft animate__delay-0.5s">Creation timelines for the standard lorem ipsum passage vary with some citing the 15th century</p>
                        <a href="<?php echo home_url(); ?>/shop" class="btn btn-primary hero-btn-tablet animate__animated animate__fadeInUp animate__delay-0.8s">探索商店</a>
                    </div>
                    <!-- 手机显示 -->
                    <div class="d-block d-md-none">
                        <h1 class="hero-title-mobile animate__animated animate__fadeInLeft">Vendora 在线</h1>
                        <h1 class="hero-title-mobile animate__animated animate__fadeInLeft animate__delay-0.2s">智能商店</h1>
                        <a href="<?php echo home_url(); ?>/shop" class="btn btn-primary hero-btn-mobile animate__animated animate__fadeInUp animate__delay-0.5s">探索商店</a>
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
    分类区域
    ==============================-->
<section class="pt-20">
    <div class="container-fluid">
        <div class="row gx-20 vs-carousel" data-slide-show="4">
            <div class="col-md-3">
                <div class="cat_card ">
                    <div class="cat_card_img">
                        <a href="<?php echo home_url(); ?>/shop"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/category/cat-6-1.jpg" alt="分类图片"></a>
                    </div>
                    <h3 class="cat_card_name--style2"><a href="<?php echo home_url(); ?>/shop">手提包. 货源</a></h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="cat_card ">
                    <div class="cat_card_img">
                        <a href="<?php echo home_url(); ?>/shop"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/category/cat-6-2.jpg" alt="分类图片"></a>
                    </div>
                    <h3 class="cat_card_name--style2"><a href="<?php echo home_url(); ?>/shop">手提包. 货源</a></h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="cat_card ">
                    <div class="cat_card_img">
                        <a href="<?php echo home_url(); ?>/shop"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/category/cat-6-3.jpg" alt="分类图片"></a>
                    </div>
                    <h3 class="cat_card_name--style2"><a href="<?php echo home_url(); ?>/shop">手提包. 货源</a></h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="cat_card ">
                    <div class="cat_card_img">
                        <a href="<?php echo home_url(); ?>/shop"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/category/cat-6-4.jpg" alt="分类图片"></a>
                    </div>
                    <h3 class="cat_card_name--style2"><a href="<?php echo home_url(); ?>/shop">手提包. 货源</a></h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="cat_card ">
                    <div class="cat_card_img">
                        <a href="<?php echo home_url(); ?>/shop"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/category/cat-6-5.jpg" alt="分类图片"></a>
                    </div>
                    <h3 class="cat_card_name--style2"><a href="<?php echo home_url(); ?>/shop">手提包. 货源</a></h3>
                </div>
            </div>
        </div>
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
                <button data-filter=".nike">耐克</button>
                <button data-filter=".puma">彪马</button>
                <button data-filter=".adidas">阿迪达斯</button>
                <button data-filter=".bata">巴塔</button>
                <button data-filter=".apex">艾佩克斯</button>
            </div>
        </div>
        <div class="row filter-active">
            <div class="col-6 col-md-4 col-lg-4 col-xl-3 filter-item adidas nike">
                <div class="vs-product product_layout4">
                    <div class="product-img">
                        <div class="product-label style2">已售</div>
                        <a href="<?php echo home_url(); ?>/shop-details"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/featued/featued-3-1.jpg" alt="产品"></a>
                        <div class="actions">
                            <a href="<?php echo home_url(); ?>/cart" class="icon-btn style2"><i class="fal fa-shopping-bag"></i></a>
                            <a href="#" class="icon-btn style2"><i class="fal fa-eye"></i></a>
                            <a href="#" class="icon-btn style2"><i class="fal fa-heart"></i></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <div class="product-category">
                            <a href="<?php echo home_url(); ?>/shop">男士鞋履</a>
                        </div>
                        <h3 class="product-title"><a href="<?php echo home_url(); ?>/shop-details">Wörishofer</a></h3>
                        <div class="product-price">$159.00</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-4 col-xl-3 filter-item bata apex">
                <div class="vs-product product_layout4">
                    <div class="product-img">
                        <a href="<?php echo home_url(); ?>/shop-details"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/featued/featued-3-2.jpg" alt="产品"></a>
                        <div class="actions">
                            <a href="<?php echo home_url(); ?>/cart" class="icon-btn style2"><i class="fal fa-shopping-bag"></i></a>
                            <a href="#" class="icon-btn style2"><i class="fal fa-eye"></i></a>
                            <a href="#" class="icon-btn style2"><i class="fal fa-heart"></i></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <div class="product-category">
                            <a href="<?php echo home_url(); ?>/shop">男士鞋履</a>
                        </div>
                        <h3 class="product-title"><a href="<?php echo home_url(); ?>/shop-details">惠灵顿靴</a></h3>
                        <div class="product-price">$875.00</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-4 col-xl-3 filter-item puma adidas">
                <div class="vs-product product_layout4">
                    <div class="product-img">
                        <div class="product-label ">新品</div>
                        <a href="<?php echo home_url(); ?>/shop-details"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/featued/featued-3-3.jpg" alt="产品"></a>
                        <div class="actions">
                            <a href="<?php echo home_url(); ?>/cart" class="icon-btn style2"><i class="fal fa-shopping-bag"></i></a>
                            <a href="#" class="icon-btn style2"><i class="fal fa-eye"></i></a>
                            <a href="#" class="icon-btn style2"><i class="fal fa-heart"></i></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <div class="product-category">
                            <a href="<?php echo home_url(); ?>/shop">男士鞋履</a>
                        </div>
                        <h3 class="product-title"><a href="<?php echo home_url(); ?>/shop-details">惠灵顿靴</a></h3>
                        <div class="product-price">$69.00</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-4 col-xl-3 filter-item bata apex">
                <div class="vs-product product_layout4">
                    <div class="product-img">
                        <a href="<?php echo home_url(); ?>/shop-details"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/featued/featued-3-4.jpg" alt="产品"></a>
                        <div class="actions">
                            <a href="<?php echo home_url(); ?>/cart" class="icon-btn style2"><i class="fal fa-shopping-bag"></i></a>
                            <a href="#" class="icon-btn style2"><i class="fal fa-eye"></i></a>
                            <a href="#" class="icon-btn style2"><i class="fal fa-heart"></i></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <div class="product-category">
                            <a href="<?php echo home_url(); ?>/shop">男士鞋履</a>
                        </div>
                        <h3 class="product-title"><a href="<?php echo home_url(); ?>/shop-details">Wörishofer</a></h3>
                        <div class="product-price">$159.00</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-4 col-xl-3 filter-item adidas nike">
                <div class="vs-product product_layout4">
                    <div class="product-img">
                        <div class="product-label style2">已售</div>
                        <a href="<?php echo home_url(); ?>/shop-details"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/featued/featued-3-5.jpg" alt="产品"></a>
                        <div class="actions">
                            <a href="<?php echo home_url(); ?>/cart" class="icon-btn style2"><i class="fal fa-shopping-bag"></i></a>
                            <a href="#" class="icon-btn style2"><i class="fal fa-eye"></i></a>
                            <a href="#" class="icon-btn style2"><i class="fal fa-heart"></i></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <div class="product-category">
                            <a href="<?php echo home_url(); ?>/shop">男士鞋履</a>
                        </div>
                        <h3 class="product-title"><a href="<?php echo home_url(); ?>/shop-details">Wörishofer</a></h3>
                        <div class="product-price">$159.00</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-4 col-xl-3 filter-item bata apex">
                <div class="vs-product product_layout4">
                    <div class="product-img">
                        <a href="<?php echo home_url(); ?>/shop-details"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/featued/featued-3-6.jpg" alt="产品"></a>
                        <div class="actions">
                            <a href="<?php echo home_url(); ?>/cart" class="icon-btn style2"><i class="fal fa-shopping-bag"></i></a>
                            <a href="#" class="icon-btn style2"><i class="fal fa-eye"></i></a>
                            <a href="#" class="icon-btn style2"><i class="fal fa-heart"></i></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <div class="product-category">
                            <a href="<?php echo home_url(); ?>/shop">男士鞋履</a>
                        </div>
                        <h3 class="product-title"><a href="<?php echo home_url(); ?>/shop-details">惠灵顿靴</a></h3>
                        <div class="product-price">$875.00</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-4 col-xl-3 filter-item puma adidas">
                <div class="vs-product product_layout4">
                    <div class="product-img">
                        <div class="product-label ">新品</div>
                        <a href="<?php echo home_url(); ?>/shop-details"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/featued/featued-3-7.jpg" alt="产品"></a>
                        <div class="actions">
                            <a href="<?php echo home_url(); ?>/cart" class="icon-btn style2"><i class="fal fa-shopping-bag"></i></a>
                            <a href="#" class="icon-btn style2"><i class="fal fa-eye"></i></a>
                            <a href="#" class="icon-btn style2"><i class="fal fa-heart"></i></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <div class="product-category">
                            <a href="<?php echo home_url(); ?>/shop">男士鞋履</a>
                        </div>
                        <h3 class="product-title"><a href="<?php echo home_url(); ?>/shop-details">惠灵顿靴</a></h3>
                        <div class="product-price">$69.00</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-4 col-xl-3 filter-item bata apex">
                <div class="vs-product product_layout4">
                    <div class="product-img">
                        <a href="<?php echo home_url(); ?>/shop-details"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/featued/featued-3-8.jpg" alt="产品"></a>
                        <div class="actions">
                            <a href="<?php echo home_url(); ?>/cart" class="icon-btn style2"><i class="fal fa-shopping-bag"></i></a>
                            <a href="#" class="icon-btn style2"><i class="fal fa-eye"></i></a>
                            <a href="#" class="icon-btn style2"><i class="fal fa-heart"></i></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <div class="product-category">
                            <a href="<?php echo home_url(); ?>/shop">男士鞋履</a>
                        </div>
                        <h3 class="product-title"><a href="<?php echo home_url(); ?>/shop-details">Wörishofer</a></h3>
                        <div class="product-price">$159.00</div>
                    </div>
                </div>
            </div>
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