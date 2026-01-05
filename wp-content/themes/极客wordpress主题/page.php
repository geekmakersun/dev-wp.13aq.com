<?php
/**
 * 单页模板入口
 *
 * 引用 templates/page.php 作为实际模板
 *
 * @package 极客wordpress主题
 */

get_header();
?>

<div class="container main-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <?php get_template_part( 'templates/page' ); ?>
        </main>
    </div>
    
    <?php get_sidebar(); ?>
</div>

<?php
get_footer();
?>
