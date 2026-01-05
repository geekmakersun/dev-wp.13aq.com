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
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- 头部 -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
            <div class="container">
                <!-- Logo -->
                <a class="navbar-brand" href="http://www.startgate.com.cn/" title="志胜">
                    <img alt="志胜" class="h-10" src="http://www.startgate.com.cn/uploadfile/202512/9a3b3fc166cc137.webp" title="志胜">
                </a>
                
                <!-- 移动端菜单按钮 -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <!-- 导航菜单 -->
                <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <!-- Home -->
                        <li class="nav-item">
                            <a class="nav-link" href="http://www.startgate.com.cn/" title="志胜">
                                Home
                            </a>
                        </li>
                        
                        <!-- About us -->
                        <li class="nav-item">
                            <a class="nav-link" href="http://www.startgate.com.cn/about_us/" title="About us">
                                About us
                            </a>
                        </li>
                        
                        <!-- Solutions -->
                        <li class="nav-item">
                            <a class="nav-link" href="http://www.startgate.com.cn/solutions/" title="Solutions">
                                Solutions
                            </a>
                        </li>
                        
                        <!-- Support -->
                        <li class="nav-item">
                            <a class="nav-link" href="http://www.startgate.com.cn/support/" title="Support">
                                Support
                            </a>
                        </li>
                        
                        <!-- Products - 下拉菜单 -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="http://www.startgate.com.cn/products/" role="button" data-bs-toggle="dropdown" aria-expanded="false" title="Products">
                                Products
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="http://www.startgate.com.cn/products/automatic_boom_gates/" title="Automatic boom gates">Automatic boom gates</a></li>
                                <li><a class="dropdown-item" href="http://www.startgate.com.cn/products/license_plate_recognition/" title="License plate recognition">License plate recognition</a></li>
                                <li><a class="dropdown-item" href="http://www.startgate.com.cn/products/pedestrian_access_gates/" title="Pedestrian access gates">Pedestrian access gates</a></li>
                                <li><a class="dropdown-item" href="http://www.startgate.com.cn/products/ev_charger/" title="EV Charger">EV Charger</a></li>
                                <li><a class="dropdown-item" href="http://www.startgate.com.cn/products/access_equipment/" title="Access equipment">Access equipment</a></li>
                                <li><a class="dropdown-item" href="http://www.startgate.com.cn/products/swing_gate_operators/" title="Swing gate operators">Swing gate operators</a></li>
                                <li><a class="dropdown-item" href="http://www.startgate.com.cn/products/sliding_gate_operators/" title="Sliding gate operators">Sliding gate operators</a></li>
                                <li><a class="dropdown-item" href="http://www.startgate.com.cn/products/industrial_sectional_door_operator/" title="Industrial sectional door operator">Industrial sectional door operator</a></li>
                            </ul>
                        </li>
                        
                        <!-- Contact us -->
                        <li class="nav-item">
                            <a class="nav-link" href="http://www.startgate.com.cn/contact_us/" title="Contact us">
                                Contact us
                            </a>
                        </li>
                    </ul>
                </div>
                
                <!-- 右侧功能区 -->
                <div class="d-flex align-items-center gap-3">
                    <!-- 搜索按钮 -->
                    <button type="button" data-modal-target="mainSearch" data-modal-toggle="mainSearch" class="btn btn-outline-secondary rounded-circle p-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                    
                    <!-- 语言切换 -->
                    <a href="http://www.ZhiShengsa.com/" class="d-flex align-items-center">
                        <img alt="网站语言按钮" src="http://www.startgate.com.cn/static/zhisheng/icon/网站语言按钮.png?v1" class="h-6">
                    </a>
                </div>
            </div>
        </nav>
    </header>


    <!-- 主要内容容器 -->
    <div id="content" class="site-content">
    