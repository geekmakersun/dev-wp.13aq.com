<?php
/**
 * 文章详情模板入口
 *
 * 引用 templates/single.php 作为实际模板
 *
 * @package 极客wordpress主题
 */

get_header();
?>

<div class="container main-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <?php get_template_part( 'templates/single' ); ?>
        </main>
    </div>
    
    <?php get_sidebar(); ?>
</div>

<?php
get_footer();
?>
