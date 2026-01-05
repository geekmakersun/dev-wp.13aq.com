<?php
/**
 * 头部模板
 *
 * 包含HTML头部、导航栏等
 *
 * @package 极客wordpress主题
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    
    <!-- 头部 -->
    <header id="masthead" class="site-header">
        <div class="container header-container">
            <div class="site-branding">
                <?php
                // 显示自定义Logo或站点标题
                if ( has_custom_logo() ) {
                    the_custom_logo();
                } else {
                    ?>
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <p class="site-description"><?php bloginfo( 'description' ); ?></p>
                    <?php
                }
                ?>
            </div>
        </div>
    </header>
    
    <!-- 主要内容容器 -->
    <div id="content" class="site-content">
