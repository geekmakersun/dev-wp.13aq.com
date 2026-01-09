<?php
/**
 * Template Name: 常见问题
 *
 * 常见问题页面模板
 * 用于显示常见问题页面的自定义模板
 *
 * @package 极客wordpress主题
 */

get_header();
?>

<?php echo geek_get_breadcrumb(); ?>
<!-- 开始 关于我们 区域 -->
<section class="space-top" data-bg-src="<?php echo get_template_directory_uri(); ?>/assets/img/bg/about-bg-005.jpg">
    <div class="container">
        <div class="row flex-row-reverse align-items-center">
            <div class="col-lg-6 mb-30">
                <div class="video-box">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/about/about-2-1.jpg" alt="ABout Image" class="w-100">
                    <a href="<?php echo get_template_directory_uri(); ?>/assets/video/了解我们公司的一切.mp4" class="play-btn style3 popup-video overlay-center"><i class="fas fa-play"></i></a>
                </div>
            </div>
            <div class="col-lg-6 mb-30">
                <div class="about-content">
                    <h2 class="sec-title-style3 fw-medium pe-xl-4">了解我们公司的一切</h2>
                    <p class="fw-light mt-4 pt-1 mb-4 pb-xl-3">专业地通过基于多媒体的战略主题领域促进有影响力的协同作用。协作实现基于绩效的内部或"有机"来源和技术上合理的场景。无缝促进增值内部或"有机"来源符合标准的平台。</p>
                    <a href="<?php echo get_template_directory_uri(); ?>/assets/video/了解我们公司的一切.mp4" class="line-btn style2 popup-video">播放视频了解更多详情</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- 结束 关于我们 区域 -->

<!-- 开始 FAQ 区域 -->
<div class="space-extra">
    <div class="container">
        <div class="row gx-80">
            <div class="col-lg-7">
                <?php geek_render_faq_accordion(); ?>
            </div>
            <div class="col-lg-5 mb-30">
                <aside class="faq-sidebar">
                    <div class="widget widget_categories">
                        <h3 class="widget_title">分类</h3>
                        <ul>
                            <?php
                            // 获取所有FAQ分类
                            $faq_categories = get_terms(array(
                                'taxonomy' => 'faq_category',
                                'hide_empty' => true,
                                'orderby' => 'name',
                                'order' => 'ASC'
                            ));
                            
                            if (!empty($faq_categories) && !is_wp_error($faq_categories)) {
                                foreach ($faq_categories as $category) {
                                    echo '<li>
                                        <a href="' . esc_url(get_term_link($category)) . '">' . esc_html($category->name) . '</a>
                                        <span>(' . $category->count . ')</span>
                                    </li>';
                                }
                            } else {
                                echo '<li><a href="#">暂无分类</a><span>(0)</span></li>';
                            }
                            ?>
                        </ul>
                    </div> 
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/about/faq-1-1.jpg" alt="image" class="w-100 mb-30 pb-10">
                </aside>
            </div>
        </div>
    </div>
</div>
<!-- 结束 FAQ 区域 -->

<!-- 开始 CTA 区域 -->
<section class="space-bottom">
    <div class="container vs_container_style4">
        <div class="cta_box space" data-bg-src="<?php echo get_template_directory_uri(); ?>/assets/img/bg/cta-bg-5-1.jpg">
            <div class="row justify-content-center text-center">
                <div class="col-md-10 col-lg-8 col-xl-10 col-xxl-7">
                    <div class="cta_box_logo">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="Vendora">
                    </div>
                    <h2 class="cta_box_title">您还需要帮助吗？</h2>
                    <div class="row justify-content-center">
                        <div class="col-xxl-11">
                            <p class="cta_box_text">成为Vendora会员会更好。获得对最新款式和创新的优先和独家访问权、免费送货、生日奖励等</p>
                        </div>
                    </div>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('shop'))); ?>" class="vs-btn style4">立即购买</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- 结束 CTA 区域 -->

<!-- 开始 图片画廊 区域 -->
<div class="mb-3 mb-3">
    <div class="container-fluid">
        <div class="row gx-3 vs-carousel" data-slide-show="6" data-lg-slide-show="4" data-md-slide-show="3">
            <div class="col-2">
                <div class="gallery_card style2 image-scale-hover">
                    <div class="gallery_card_img">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/g-1-1.jpg" alt="Gallery Image">
                    </div>
                    <a href="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/g-1-1.jpg" class="gallery_card_icon popup-image"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-2">
                <div class="gallery_card style2 image-scale-hover">
                    <div class="gallery_card_img">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/g-1-2.jpg" alt="Gallery Image">
                    </div>
                    <a href="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/g-1-2.jpg" class="gallery_card_icon popup-image"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-2">
                <div class="gallery_card style2 image-scale-hover">
                    <div class="gallery_card_img">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/g-1-3.jpg" alt="Gallery Image">
                    </div>
                    <a href="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/g-1-3.jpg" class="gallery_card_icon popup-image"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-2">
                <div class="gallery_card style2 image-scale-hover">
                    <div class="gallery_card_img">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/g-1-4.jpg" alt="Gallery Image">
                    </div>
                    <a href="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/g-1-4.jpg" class="gallery_card_icon popup-image"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-2">
                <div class="gallery_card style2 image-scale-hover">
                    <div class="gallery_card_img">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/g-1-5.jpg" alt="Gallery Image">
                    </div>
                    <a href="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/g-1-5.jpg" class="gallery_card_icon popup-image"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-2">
                <div class="gallery_card style2 image-scale-hover">
                    <div class="gallery_card_img">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/g-1-6.jpg" alt="Gallery Image">
                    </div>
                    <a href="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/g-1-6.jpg" class="gallery_card_icon popup-image"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-2">
                <div class="gallery_card style2 image-scale-hover">
                    <div class="gallery_card_img">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/g-1-7.jpg" alt="Gallery Image">
                    </div>
                    <a href="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/g-1-7.jpg" class="gallery_card_icon popup-image"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 结束 图片画廊 区域 -->

<?php
get_footer();
?>