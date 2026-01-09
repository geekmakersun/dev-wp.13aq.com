<?php
/**
 * Template Name: 关于我们
 *
 * 关于我们页面模板
 * 用于显示关于我们页面的自定义模板
 *
 * @package 极客wordpress主题
 */

get_header();
?>

<?php echo geek_get_breadcrumb(); ?>
<!-- 开始 关于我们 区域 -->
<section class="space-top">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-lg-6 col-xl-7 mb-30">
                <div class="img-box">
                    <div class="img-1"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/about/about-1-1.jpg" alt="关于我们图片"></div>
                    <div class="img-2"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/about/about-1-2.jpg" alt="关于我们图片"></div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-5 mb-30">
                <div class="about-style1">
                    <h2 class="about-title">更多关于我们的数字产品服务</h2>
                    <div class="about-text">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- 结束 关于我们 区域 -->

<!-- 开始 统计数据 区域 -->
<div class="space-extra">
    <div class="container">
        <div class="row text-center justify-content-between gy-3">
            <div class="col-sm-auto">
                <div class="vs-counter">
                    <span class="counter-number">60,000</span>
                    <p class="counter-text">满意客户</p>
                </div>
            </div>
            <div class="col-sm-auto">
                <div class="vs-counter">
                    <span class="counter-number">25k</span>
                    <p class="counter-text">每日访客</p>
                </div>
            </div>
            <div class="col-sm-auto">
                <div class="vs-counter">
                    <span class="counter-number">200+</span>
                    <p class="counter-text">产品类别</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 结束 统计数据 区域 -->

<!-- 开始 视频 区域 -->
<div class="position-relative">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/about/video-3-1.jpg" alt="视频图片">
    <a href="<?php echo get_template_directory_uri(); ?>/assets/video/关于我们.mp4" class="play-btn style2 popup-video overlay-center"><i class="fas fa-play"></i></a>
</div>
<!-- 结束 视频 区域 -->

<!-- 开始 团队成员 区域 -->
<section class="space-top space-extra-bottom">
    <div class="container">
        <div class="title-area text-center">
            <h2 class="sec-title-style5">创始成员</h2>
                <p class="sub-title-style5">专家团队</p>
        </div>
        <div class="row vs-carousel" data-slide-show="3" data-md-slide-show="3" data-xs-slide-show="1">
            <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="team-style2">
                    <div class="team-img">
                        <span class="team-border"></span>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/team/team-2-1.jpg" alt="团队成员图片">
                        <div class="team-social">
                            <a href="#">Facebook</a>
                            <a href="#">Twitter</a>
                            <a href="#">Instagram</a>
                        </div>
                    </div>
                    <div class="team-content">
                        <h3 class="team-name">Zara Malika</h3>
                        <span class="team-degi">创始人</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="team-style2">
                    <div class="team-img">
                        <span class="team-border"></span>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/team/team-2-4.jpg" alt="团队成员图片">
                        <div class="team-social">
                            <a href="#">Facebook</a>
                            <a href="#">Twitter</a>
                            <a href="#">Instagram</a>
                        </div>
                    </div>
                    <div class="team-content">
                        <h3 class="team-name">Rose Marian</h3>
                        <span class="team-degi">创始人</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="team-style2">
                    <div class="team-img">
                        <span class="team-border"></span>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/team/team-2-2.jpg" alt="团队成员图片">
                        <div class="team-social">
                            <a href="#">Facebook</a>
                            <a href="#">Twitter</a>
                            <a href="#">Instagram</a>
                        </div>
                    </div>
                    <div class="team-content">
                        <h3 class="team-name">Sowat Ahsan</h3>
                        <span class="team-degi">创始人</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="team-style2">
                    <div class="team-img">
                        <span class="team-border"></span>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/team/team-2-3.jpg" alt="团队成员图片">
                        <div class="team-social">
                            <a href="#">Facebook</a>
                            <a href="#">Twitter</a>
                            <a href="#">Instagram</a>
                        </div>
                    </div>
                    <div class="team-content">
                        <h3 class="team-name">Zecica Lemmi</h3>
                        <span class="team-degi">经理</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- 结束 团队成员 区域 -->

<!-- 开始 客户评价 区域 -->
<section class="bg-style3 space">
    <div class="container">
        <div class="testi-style2-slide vs-carousel" data-slide-show="1" data-md-slide-show="1" data-sm-slide-show="1" data-xs-slide-show="1" data-dots="true" data-fade="true">
            <div class="slide">
                <div class="testi-style2">
                    <div class="testi-content">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/quote-3.png" alt="引用图标" class="testi-quote">
                        <p class="testi-text">“从本质上为基于多媒体的材料<u>协调共价质量向量</u>。通过可互操作的计划有效地形成实时的"开箱即用"思维方式……”</p>
                        <div class="testi-border"></div>
                        <h3 class="testi-author-name">Sowat Ahsan</h3>
                        <span class="testi-author-degi">客户</span>
                    </div>
                    <div class="testi-avater">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/testimonial/avater-3-1.jpg" alt="客户头像">
                    </div>
                </div>
            </div>
            <div class="slide">
                <div class="testi-style2">
                    <div class="testi-content">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/quote-3.png" alt="引用图标" class="testi-quote">
                        <p class="testi-text">“Lorem ipsum是<u>图形、印刷和出版行业中常用的占位符文本</u>，用于预览布局和视觉模型……”</p>
                        <div class="testi-border"></div>
                        <h5 class="testi_card_name--md">Wardan Mofiz</h5>
                        <span class="testi_card_degi">客户</span>
                    </div>
                    <div class="testi-avater">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/testimonial/avater-3-2.jpg" alt="客户头像">
                    </div>
                </div>
            </div>
            <div class="slide">
                <div class="testi-style2">
                    <div class="testi-content">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/quote-3.png" alt="引用图标" class="testi-quote">
                        <p class="testi-text">“从中世纪的<u>起源到数字时代</u>，了解关于无处不在的lorem ipsum段落的一切……”</p>
                        <div class="testi-border"></div>
                        <h5 class="testi_card_name--md">Harry Tube</h5>
                        <span class="testi_card_degi">客户</span>
                    </div>
                    <div class="testi-avater">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/testimonial/avater-3-3.jpg" alt="客户头像">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- 结束 客户评价 区域 -->

<!-- 开始 品牌展示 区域 -->
<div class="space">
    <div class="container">
        <div class="row justify-content-between vs-carousel text-center" data-slide-show="5" data-md-slide-show="3" data-sm-slide-show="2">
            <div class="col-auto">
                <div class="vs-brand">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/brand/b-4-1.png" alt="品牌图片">
                </div>
            </div>
            <div class="col-auto">
                <div class="vs-brand">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/brand/b-4-2.png" alt="品牌图片">
                </div>
            </div>
            <div class="col-auto">
                <div class="vs-brand">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/brand/b-4-3.png" alt="品牌图片">
                </div>
            </div>
            <div class="col-auto">
                <div class="vs-brand">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/brand/b-4-4.png" alt="品牌图片">
                </div>
            </div>
            <div class="col-auto">
                <div class="vs-brand">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/brand/b-4-5.png" alt="品牌图片">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 结束 品牌展示 区域 -->

<?php
get_footer();
?>