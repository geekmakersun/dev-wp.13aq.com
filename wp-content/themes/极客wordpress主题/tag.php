<?php
/**
 * 标签归档模板入口
 *
 * 引用 templates/tag.php 作为实际模板
 *
 * @package 极客wordpress主题
 */

get_header();
?>

<div class="container main-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <?php get_template_part( 'templates/tag' ); ?>
        </main>
    </div>
    
    <?php get_sidebar(); ?>
</div>

<?php
get_footer();
?>
