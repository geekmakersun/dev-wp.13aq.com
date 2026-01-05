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
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <!-- 头部 -->
    <header>
        <!-- 开始 导航条 -->
        <!-- 开始 导航栏公共文件 -->
        <!-- 开始 PC 导航栏 -->
        <div class="uk-sticky uk-navbar-default uk-navbar-container uk-sticky-fixed" style="background-image: url(&quot;http://www.startgate.com.cn/static/zhisheng/img/通用导航条背景.webp?v=1&quot;); background-repeat: no-repeat; background-size: cover; position: fixed !important; width: 972px !important; margin-top: 0px !important; top: 0px;" uk-sticky="sel-target: .uk-navbar-container; animation: uk-animation-slide-top; cls-inactive: uk-navbar-default; cls-active: uk-navbar-sticky">
            <nav class="uk-container uk-navbar-transparent uk-visible@m uk-flex uk-flex-middle">
                <div class="uk-navbar-left">
                    <a class="uk-navbar-item uk-logo" href="http://www.startgate.com.cn/" title="志胜">
                        <img alt="志胜" class="common_header-logo" src="http://www.startgate.com.cn/uploadfile/202512/9a3b3fc166cc137.webp" title="志胜">
                    </a>
                </div>
                <div class="uk-navbar-center">
                    <ul class="uk-navbar-nav">
                        <li class="uk-active">
                            <a class="uk-navbar-item" href="http://www.startgate.com.cn/" title="志胜">
                                Home
                            </a>
                        </li>
                        <!-- 开始 通用顶部 电脑端 一级导航 About us -->
                        <li class="">
                            <a class="uk-navbar-item" href="http://www.startgate.com.cn/about_us/" title="About us">
                                About us </a>
                        </li>
                        <!-- 开始 通用顶部 电脑端 一级导航 Solutions -->
                        <li class="">
                            <a class="uk-navbar-item" href="http://www.startgate.com.cn/solutions/" title="Solutions">
                                Solutions </a>
                        </li>
                        <!-- 开始 通用顶部 电脑端 一级导航 Support -->
                        <li class="">
                            <a class="uk-navbar-item" href="http://www.startgate.com.cn/support/" title="Support">
                                Support </a>
                        </li>
                        <!-- 开始 通用顶部 电脑端 一级导航 Products -->
                        <li class="">
                            <a class="uk-navbar-item" href="http://www.startgate.com.cn/products/" title="Products" role="button" aria-haspopup="true" aria-expanded="false">
                                Products </a>
                            <div class="uk-navbar-dropdown uk-dropdown uk-drop" uk-dropdown="stretch: x; flip: false;mode: hover;animation: slide-top; animate-out: true;offset: -1;duration: 300;delay-hide: 100;" style="width: 942px; overflow-x: auto; max-width: 942px; top: 79px; left: -225.512px;">
                                <div class="uk-flex uk-flex-top uk-flex-center">
                                    <ul class="main-nav_list uk-grid-small uk-child-width-1-1 uk-grid uk-grid-stack" uk-grid="">
                                        <li class="uk-first-column">
                                            <a class="" href="http://www.startgate.com.cn/products/automatic_boom_gates/" title="Automatic boom gates">
                                                Automatic boom gates </a>
                                        </li>
                                        <li class="uk-grid-margin uk-first-column">
                                            <a class="" href="http://www.startgate.com.cn/products/license_plate_recognition/" title="License plate recognition">
                                                License plate recognition </a>
                                        </li>
                                        <li class="uk-grid-margin uk-first-column">
                                            <a class="" href="http://www.startgate.com.cn/products/pedestrian_access_gates/" title="Pedestrian access gates">
                                                Pedestrian access gates </a>
                                        </li>
                                        <li class="uk-grid-margin uk-first-column">
                                            <a class="" href="http://www.startgate.com.cn/products/ev_charger/" title="EV Charger">
                                                EV Charger </a>
                                        </li>
                                        <li class="uk-grid-margin uk-first-column">
                                            <a class="" href="http://www.startgate.com.cn/products/access_equipment/" title="Access equipment">
                                                Access equipment </a>
                                        </li>
                                        <li class="uk-grid-margin uk-first-column">
                                            <a class="" href="http://www.startgate.com.cn/products/swing_gate_operators/" title="Swing gate operators">
                                                Swing gate operators </a>
                                        </li>
                                        <li class="uk-grid-margin uk-first-column">
                                            <a class="" href="http://www.startgate.com.cn/products/sliding_gate_operators/" title="Sliding gate operators">
                                                Sliding gate operators </a>
                                        </li>
                                        <li class="uk-grid-margin uk-first-column">
                                            <a class="" href="http://www.startgate.com.cn/products/industrial_sectional_door_operator/" title="Industrial sectional door operator">
                                                Industrial sectional door operator </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <!-- 开始 通用顶部 电脑端 一级导航 Contact us -->
                        <li class="">
                            <a class="uk-navbar-item" href="http://www.startgate.com.cn/contact_us/" title="Contact us">
                                Contact us </a>
                        </li>
                    </ul>
                </div>
                <div class="uk-navbar-right">
                    <div class="uk-flex uk-flex-middle">
                        <!-- 开始 搜索按钮 -->
                        <a style="display: inline-flex" href="#mainSearch" uk-search-icon="" uk-toggle="" class="uk-icon uk-search-icon" aria-label="Submit Search" role="button"><svg width="20" height="20" viewBox="0 0 20 20" aria-hidden="true">
                                <circle fill="none" stroke="#000" stroke-width="1.1" cx="9" cy="9" r="7"></circle>
                                <path fill="none" stroke="#000" stroke-width="1.1" d="M14,14 L18,18 L14,14 Z"></path>
                            </svg></a>
                        <!-- 结束 搜索按钮 -->
                        <a class="uk-margin-left" style="display: inline-flex" href="http://www.ZhiShengsa.com/">
                            <img alt="网站语言按钮" src="http://www.startgate.com.cn/static/zhisheng/icon/网站语言按钮.png?v1">
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="uk-sticky-placeholder" style="height: 80px; width: 972px; margin: 0px;"></div>
        <!-- 结束 PC 导航栏 -->
        <!-- ========== 移动端导航栏 (移动端显示) ========== -->
        <!-- 移动端导航栏开始 -->
        <div class="uk-box-shadow-medium uk-sticky uk-navbar-sticky uk-hidden@m" uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky">
            <nav class="uk-padding-small uk-navbar uk-navbar-container uk-flex uk-flex-between uk-flex-middle">
                <!-- 移动端Logo -->
                <div class="">
                    <a class="uk-logo" href="http://www.startgate.com.cn/" title="志胜">
                        <img alt="志胜" class="common_wap-logo" src="http://www.startgate.com.cn/uploadfile/202512/9a3b3fc166cc137.webp" title="志胜">
                    </a>
                </div>
                <!-- 移动端菜单按钮 -->
                <div class="">
                    <a class="uk-navbar-toggle uk-icon uk-navbar-toggle-icon" href="#m-top_nav" uk-navbar-toggle-icon="" uk-toggle="" role="button" aria-label="Open menu" aria-expanded="false"><svg width="20" height="20" viewBox="0 0 20 20" aria-hidden="true">移动端菜单按钮
                    </a>
                </div>
            </nav>
        </div>
        <!-- 移动端导航栏结束 -->

        <!-- ========== 移动端侧边菜单 ========== -->
        <!-- 移动端侧边菜单开始 -->
        <div id="m-top_nav" class="uk-offcanvas" uk-offcanvas="mode: slide; overlay: true">
            <div class="uk-offcanvas-bar" role="dialog" aria-modal="true">
                <!-- 关闭按钮 -->
                <button class="uk-offcanvas-close uk-icon uk-close" type="button" uk-close="" aria-label="Close"><svg width="14" height="14" viewBox="0 0 14 14" aria-hidden="true">
                        <line fill="none" stroke="#000" stroke-width="1.1" x1="1" y1="1" x2="13" y2="13"></line>
                        <line fill="none" stroke="#000" stroke-width="1.1" x1="13" y1="1" x2="1" y2="13"></line>
                    </svg></button>
                <!-- 侧边菜单列表 -->
                <ul class="uk-nav uk-nav-default uk-nav-parent-icon" uk-nav="">
                    <!-- 首页菜单项 -->
                    <li class="uk-active">
                        <a href="http://www.startgate.com.cn/" title="志胜">
                            Home
                        </a>
                    </li>
                    <!-- 动态获取一级导航分类 -->
                    <!-- 一级菜单 - 添加高亮 -->
                    <li class="">
                        <a class="" href="http://www.startgate.com.cn/about_us/" title="About us">
                            About us </a>
                        <!-- 检查是否有二级子菜单 -->
                    </li>
                    <!-- 一级菜单 - 添加高亮 -->
                    <li class="">
                        <a class="" href="http://www.startgate.com.cn/solutions/" title="Solutions">
                            Solutions </a>
                        <!-- 检查是否有二级子菜单 -->
                    </li>
                    <!-- 一级菜单 - 添加高亮 -->
                    <li class="">
                        <a class="" href="http://www.startgate.com.cn/support/" title="Support">
                            Support </a>
                        <!-- 检查是否有二级子菜单 -->
                    </li>
                    <!-- 一级菜单 - 添加高亮 -->
                    <li class="">
                        <a class="" href="http://www.startgate.com.cn/products/" title="Products">
                            Products </a>
                        <!-- 检查是否有二级子菜单 -->
                        <!-- 二级子菜单列表 - 默认展开 -->
                        <ul class="uk-nav-sub">
                            <!-- 动态获取二级导航分类 -->
                            <!-- 二级菜单 - 添加高亮 -->
                            <li class="">
                                <a class="" href="http://www.startgate.com.cn/products/automatic_boom_gates/" title="Automatic boom gates">
                                    Automatic boom gates </a>
                                <!-- 检查是否有三级子菜单 -->
                            </li>
                            <!-- 二级菜单 - 添加高亮 -->
                            <li class="">
                                <a class="" href="http://www.startgate.com.cn/products/license_plate_recognition/" title="License plate recognition">
                                    License plate recognition </a>
                                <!-- 检查是否有三级子菜单 -->
                            </li>
                            <!-- 二级菜单 - 添加高亮 -->
                            <li class="">
                                <a class="" href="http://www.startgate.com.cn/products/pedestrian_access_gates/" title="Pedestrian access gates">
                                    Pedestrian access gates </a>
                                <!-- 检查是否有三级子菜单 -->
                            </li>
                            <!-- 二级菜单 - 添加高亮 -->
                            <li class="">
                                <a class="" href="http://www.startgate.com.cn/products/ev_charger/" title="EV Charger">
                                    EV Charger </a>
                                <!-- 检查是否有三级子菜单 -->
                            </li>
                            <!-- 二级菜单 - 添加高亮 -->
                            <li class="">
                                <a class="" href="http://www.startgate.com.cn/products/access_equipment/" title="Access equipment">
                                    Access equipment </a>
                                <!-- 检查是否有三级子菜单 -->
                            </li>
                            <!-- 二级菜单 - 添加高亮 -->
                            <li class="">
                                <a class="" href="http://www.startgate.com.cn/products/swing_gate_operators/" title="Swing gate operators">
                                    Swing gate operators </a>
                                <!-- 检查是否有三级子菜单 -->
                            </li>
                            <!-- 二级菜单 - 添加高亮 -->
                            <li class="">
                                <a class="" href="http://www.startgate.com.cn/products/sliding_gate_operators/" title="Sliding gate operators">
                                    Sliding gate operators </a>
                                <!-- 检查是否有三级子菜单 -->
                            </li>
                            <!-- 二级菜单 - 添加高亮 -->
                            <li class="">
                                <a class="" href="http://www.startgate.com.cn/products/industrial_sectional_door_operator/" title="Industrial sectional door operator">
                                    Industrial sectional door operator </a>
                                <!-- 检查是否有三级子菜单 -->
                            </li>
                        </ul>
                    </li>
                    <!-- 一级菜单 - 添加高亮 -->
                    <li class="">
                        <a class="" href="http://www.startgate.com.cn/contact_us/" title="Contact us">
                            Contact us </a>
                        <!-- 检查是否有二级子菜单 -->
                    </li>
                </ul>
            </div>
        </div>
        <!-- 移动端侧边菜单结束 -->

        <div id="mainSearch" uk-modal="" class="uk-modal">
            <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical" role="dialog" aria-modal="true">
                <button class="uk-modal-close-default uk-icon uk-close" type="button" uk-close="" aria-label="Close"><svg width="14" height="14" viewBox="0 0 14 14" aria-hidden="true">
                        <line fill="none" stroke="#000" stroke-width="1.1" x1="1" y1="1" x2="13" y2="13"></line>
                        <line fill="none" stroke="#000" stroke-width="1.1" x1="13" y1="1" x2="1" y2="13"></line>
                    </svg></button>
                <form class="uk-margin-top uk-search uk-search-default uk-width-1-1" action="/index.php" method="get">
                    <input type="hidden" name="s" value="api">
                    <input type="hidden" name="c" value="api">
                    <input type="hidden" name="m" value="search">
                    <input type="hidden" name="dir" id="dr_search_module_dir" value="news">
                    <div class="uk-flex uk-grid-collapse uk-grid uk-grid-stack" uk-grid="">
                        <!-- 开始 搜索模块选择 -->
                        <div class="uk-width-auto">
                            <button id="dr_search_module_name" class="uk-button uk-button-default" type="button" aria-haspopup="true" aria-expanded="false">Article <i class="fa fa-angle-down"></i></button>
                            <!-- 开始 可搜索模块列表 -->
                            <div class="uk-dropdown uk-drop" uk-dropdown="pos: bottom-justify;mode:hover">
                                <ul class="uk-nav uk-dropdown-nav">
                                    <li>
                                        <a href="javascript:dr_search_module_select('news', 'Article');">Article</a>
                                    </li>
                                    <li>
                                        <a href="javascript:dr_search_module_select('product', 'Product');">Product</a>
                                    </li>
                                    <li>
                                        <a href="javascript:dr_search_module_select('solution', 'Solution');">Solution</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- 结束 可搜索模块列表 -->
                        </div>
                        <!-- 结束 搜索模块选择 -->
                        <!-- 开始 搜索输入框 -->
                        <div class="uk-width-expand">
                            <label class="" for="keyword"></label>
                            <input class="uk-search-input" id="keyword" type="text" placeholder="Search Content..." name="keyword">
                        </div>
                        <!-- 结束 搜索输入框 -->
                        <!-- 开始 搜索提交按钮 -->
                        <div class="uk-width-auto">
                            <input class="uk-button uk-button-primary" type="submit" value="Search">
                        </div>
                        <!-- 结束 搜索提交按钮 -->
                    </div>
                    <!--suppress JSUnresolvedFunction -->
                    <script>
                        // 这段js是用来执行搜索的
                        function dr_search_module_select(dir, name) {
                            $('#dr_search_module_dir').val(dir);
                            $('#dr_search_module_name').html(name + ' <i class="fa fa-angle-down"></i>');
                        }

                        dr_search_module_select('news', 'Article');
                    </script>
                </form>
            </div>
        </div>
        <!-- 结束 导航栏公共文件 -->
        <!-- 结束 导航条 -->
    </header>

    <!-- 主要内容容器 -->
    <div id="content" class="site-content">