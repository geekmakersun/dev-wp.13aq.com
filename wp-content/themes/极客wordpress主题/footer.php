<?php

/**
 * 页脚模板
 *
 * 包含HTML页脚、脚本等
 *
 * @package 极客wordpress主题
 */
?>

</div><!-- #content -->

    <!--==============================
                        Footer Area
        ==============================-->
    <footer class="footer-wrapper footer-layout1">
        <div class="widget-area">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-md-5 col-lg-3">
                        <div class="widget footer-widget">
                            <h3 class="widget_title">联系我们</h3>
                            <div class="vs-widget-about">
                                <form action="#" class="footer-newsletter">
                                    <p class="form-text">加入我们的列表，以便我们保持联系</p>
                                    <div class="form-group">
                                        <input type="email" id="newsletteremail" name="newsletteremail" placeholder="您的电子邮件地址">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                </form>
                                <p class="footer-info"><i class="fas fa-paper-plane"></i><a class="text-inherit" href="mailto:Vendora@email.com">Vendora@email.com</a></p>
                                <p class="footer-info"><i class="fas fa-phone-alt"></i><a class="text-inherit" href="tel:703-261-6660">703-261-6660</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto col-md-6 col-lg-auto offset-xl-1">
                        <div class="widget widget_nav_menu  footer-widget">
                            <h3 class="widget_title">服务</h3>
                            <div class="menu-all-pages-container">
                                <ul class="menu">
                                    <li><a href="#">追踪我的订单</a></li>
                                    <li><a href="#">退货</a></li>
                                    <li><a href="#">配送条款</a></li>
                                    <li><a href="#">支付政策</a></li>
                                    <li><a href="#">常见问题</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto col-md-6 col-lg-auto">
                        <div class="widget widget_nav_menu  footer-widget">
                            <h3 class="widget_title">关注我们</h3>
                            <div class="menu-all-pages-container">
                                <ul class="menu">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i>Facebook</a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i>Twitter</a></li>
                                    <li><a href="#"><i class="far fa-blog"></i>Bebo</a></li>
                                    <li><a href="#"><i class="far fa-basketball-ball"></i>Dribvble</a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i>Instagram</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-auto">
                        <div class="widget footer-widget">
                            <h3 class="widget_title">店铺地址</h3>
                            <div class="footer-map">
                                <div style="width: 400px; height: 135px; background-color: #f0f0f0; border: 1px solid #ddd; display: flex; align-items: center; justify-content: center; font-size: 14px; color: #666;">
                                    地图占位区域
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-wrap text-center">
            <p class="mb-0"><i class="fal fa-copyright"></i> <?php echo date('Y'); ?>. 保留所有权利</p>
        </div>
    </footer>



    <!--********************************
                        代码结束 
        ******************************** -->


    <!-- 返回顶部样式 -->
    <style>
    .scroll-to-top {
      position: fixed;
      bottom: 20px;
      right: 20px;
      opacity: 0;
      visibility: hidden;
      transition: all 0.3s ease;
      z-index: 9999;
    }
    html.scroll-active .scroll-to-top {
      opacity: 1;
      visibility: visible;
    }
    .scroll-btn {
      background-color: #333;
      color: white;
      width: 45px;
      height: 45px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      text-decoration: none;
      box-shadow: 0 2px 10px rgba(0,0,0,0.2);
      transition: all 0.3s ease;
    }
    .scroll-btn:hover {
      background-color: #555;
      transform: translateY(-3px);
      box-shadow: 0 4px 15px rgba(0,0,0,0.3);
    }
    </style>
    <!-- 返回顶部 -->
    <a href="#" class="scroll-to-top scroll-btn"><i class="far fa-arrow-up"></i></a>


    <!--==============================
        所有JS文件
    ============================== -->
    <!-- Form Js -->
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/ajax-mail.js"></script>

<?php wp_footer(); ?>

</body>

</html>