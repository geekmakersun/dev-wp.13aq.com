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

<main id="main" class="site-main">
    <?php get_template_part( 'templates/single' ); ?>
</main>

<?php
get_footer();
?>
