<?php

/**
 * 加载主题样式和脚本
 */
function geek_theme_scripts() {
    // 确保常量已定义
    if ( ! defined( 'GEEK_THEME_ASSETS_URI' ) ) {
        define( 'GEEK_THEME_ASSETS_URI', get_template_directory_uri() . '/assets' );
    }
    
    // 从HTML模板加载jQuery
    wp_enqueue_script('jquery', GEEK_THEME_ASSETS_URI . '/vendor/jquery/jquery.min.js', array(), '3.6.0', true);

    // 从HTML模板加载Bootstrap CSS
    wp_enqueue_style('bootstrap-css', GEEK_THEME_ASSETS_URI . '/vendor/bootstrap/css/bootstrap.min.css', array(), '5.3.8');

    // 从HTML模板加载Fontawesome Icon CSS
    // wp_enqueue_style('fontawesome-css', get_template_directory_uri() . '/assets/vendor/fontawesome/css/all.min.css', array(), '6.0.0');
    // 改用Font Awesome Pro 5.13.0
    wp_enqueue_style('fontawesome-pro-css', GEEK_THEME_ASSETS_URI . '/css/fontawesome.min.css', array(), '5.13.0');
    
    // 加载Bootstrap Icons CSS
    wp_enqueue_style('bootstrap-icons-css', GEEK_THEME_ASSETS_URI . '/vendor/bootstrap-icons/bootstrap-icons.min.css', array(), '1.11.3');

    // 从HTML模板加载Magnific Popup CSS
    wp_enqueue_style('magnific-popup-css', GEEK_THEME_ASSETS_URI . '/vendor/magnific-popup/css/magnific-popup.min.css', array(), '1.1.0');

    // 从HTML模板加载Slick Slider CSS
    wp_enqueue_style('slick-slider-css', GEEK_THEME_ASSETS_URI . '/vendor/slick-slider/css/slick.min.css', array(), '1.8.1');

    // 加载Animate.css动画库
    wp_enqueue_style('animate-css', GEEK_THEME_ASSETS_URI . '/vendor/animate.css/animate.min.css', array(), '4.1.1');

    // 从HTML模板加载主题自定义CSS
    wp_enqueue_style(
        'geek-main-style',
        GEEK_THEME_ASSETS_URI . '/css/main.min.css',
        array('bootstrap-css'),
        '1.0.0',
        'all'
    );

    // 从HTML模板加载Slick Slider JS
    wp_enqueue_script('slick-slider-js', GEEK_THEME_ASSETS_URI . '/vendor/slick-slider/js/slick.min.js', array('jquery'), '1.8.1', true);

    // 从HTML模板加载Bootstrap JS
    wp_enqueue_script('bootstrap-js', GEEK_THEME_ASSETS_URI . '/vendor/bootstrap/js/bootstrap.bundle.min.js', array('jquery'), '5.3.8', true);

    // 从HTML模板加载Magnific Popup JS
    wp_enqueue_script('magnific-popup-js', GEEK_THEME_ASSETS_URI . '/vendor/magnific-popup/js/jquery.magnific-popup.min.js', array('jquery'), '1.1.0', true);

    // 从HTML模板加载Isotope Filter JS
    wp_enqueue_script('imagesloaded-js', GEEK_THEME_ASSETS_URI . '/vendor/imagesloaded/js/imagesloaded.pkgd.min.js', array('jquery'), '4.1.4', true);
    wp_enqueue_script('isotope-js', GEEK_THEME_ASSETS_URI . '/vendor/isotope/js/isotope.pkgd.min.js', array('jquery'), '3.0.6', true);

    // 从HTML模板加载Custom Carousel JS
    wp_enqueue_script('custom-carousel-js', GEEK_THEME_ASSETS_URI . '/vendor/custom-carousel/js/vscustom-carousel.min.js', array('jquery'), '1.0.0', true);

    // 从HTML模板加载Form JS
    wp_enqueue_script('form-js', GEEK_THEME_ASSETS_URI . '/js/ajax-mail.js', array('jquery'), '1.0.0', true);

    // 加载功能模块
    // 注意：模块的加载顺序可能影响功能的正常运行
    
    // 预加载器功能
    wp_enqueue_script('geek-preloader-script', GEEK_THEME_ASSETS_URI . '/js/modules/preloader.js', array('jquery'), '1.0.0', true);
    
    // 移动菜单功能
    wp_enqueue_script('geek-mobile-menu-script', GEEK_THEME_ASSETS_URI . '/js/modules/mobile-menu.js', array('jquery'), '1.0.0', true);
    
    // 回到顶部功能
    wp_enqueue_script('geek-scroll-to-top-script', GEEK_THEME_ASSETS_URI . '/js/modules/scroll-to-top.js', array('jquery'), '1.0.0', true);
    
    // 弹窗菜单功能（侧边栏、新闻订阅、搜索框）
    wp_enqueue_script('geek-popup-menu-script', GEEK_THEME_ASSETS_URI . '/js/modules/popup-menu.js', array('jquery'), '1.0.0', true);
    
    // Magnific Popup 功能（图片和视频弹出层）
    wp_enqueue_script('geek-magnific-popup-script', GEEK_THEME_ASSETS_URI . '/js/modules/magnific-popup.js', array('jquery'), '1.0.0', true);
    
    // 区块位置功能
    wp_enqueue_script('geek-section-position-script', GEEK_THEME_ASSETS_URI . '/js/modules/section-position.js', array('jquery'), '1.0.0', true);
    
    // 筛选功能
    wp_enqueue_script('geek-filter-script', GEEK_THEME_ASSETS_URI . '/js/modules/filter.js', array('jquery'), '1.0.0', true);
    
    // WooCommerce 切换功能
    wp_enqueue_script('geek-woocommerce-toggle-script', GEEK_THEME_ASSETS_URI . '/js/modules/woocommerce-toggle.js', array('jquery'), '1.0.0', true);
    
    // 倒计时功能
    wp_enqueue_script('geek-countdown-script', GEEK_THEME_ASSETS_URI . '/js/modules/countdown.js', array('jquery'), '1.0.0', true);
    
    // 产品切换功能
    wp_enqueue_script('geek-product-toggler-script', GEEK_THEME_ASSETS_URI . '/js/modules/product-toggler.js', array('jquery'), '1.0.0', true);
    
    // 图片切换功能
    wp_enqueue_script('geek-image-switcher-script', GEEK_THEME_ASSETS_URI . '/js/modules/image-switcher.js', array('jquery'), '1.0.0', true);
    
    // 新闻滚动功能
    wp_enqueue_script('geek-news-ticker-script', GEEK_THEME_ASSETS_URI . '/js/modules/news-ticker.js', array('jquery'), '1.0.0', true);
    
    // 产品切换器
    wp_enqueue_script('geek-product-switcher-script', GEEK_THEME_ASSETS_URI . '/js/modules/product-switcher.js', array('jquery'), '1.0.0', true);
    
    // 产品轮播功能
    wp_enqueue_script('geek-product-sliders-script', GEEK_THEME_ASSETS_URI . '/js/modules/product-sliders.js', array('jquery'), '1.0.0', true);
    
    // 商店标签切换功能
    wp_enqueue_script('geek-shop-tab-toggler-script', GEEK_THEME_ASSETS_URI . '/js/modules/shop-tab-toggler.js', array('jquery'), '1.0.0', true);
    
    // 分类导航切换功能
    wp_enqueue_script('geek-category-nav-toggler-script', GEEK_THEME_ASSETS_URI . '/js/modules/category-nav-toggler.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'geek_theme_scripts');


