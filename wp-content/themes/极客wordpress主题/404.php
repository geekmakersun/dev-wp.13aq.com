<?php

/**
 * 404错误页面模板
 *
 * 显示404错误信息
 *
 * @package 极客wordpress主题
 */

get_header(); ?>

    <!--==============================
    Error Area 
    ==============================-->
    <section class="space">
        <div class="container">
            <div class="error-content text-center">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/bg/error-1-1.png" alt="error image" class="error-img">
                <h2 class="error-title h1">哦！找不到该页面。</h2>
                <p class="error-text">看起来在这个位置没有找到任何内容。或许可以尝试以下链接或搜索？</p>
                <a href="javascript:window.history.back()" class="vs-btn style4 me-3">返回上一页</a>
                <a href="<?php echo home_url(); ?>" class="vs-btn style4">返回首页</a>
            </div>
        </div>
    </section>

<?php get_footer(); ?>