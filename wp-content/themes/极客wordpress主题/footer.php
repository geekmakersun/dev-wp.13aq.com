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
                            <h3 class="widget_title">Contact Us</h3>
                            <div class="vs-widget-about">
                                <form action="#" class="footer-newsletter">
                                    <p class="form-text">Get on the list so we can stay in touch</p>
                                    <div class="form-group">
                                        <input type="email" id="newsletteremail" name="newsletteremail" placeholder="Your email address">
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
                            <h3 class="widget_title">Services</h3>
                            <div class="menu-all-pages-container">
                                <ul class="menu">
                                    <li><a href="#">Track My Order</a></li>
                                    <li><a href="#">Returns</a></li>
                                    <li><a href="#">Shipping Terms</a></li>
                                    <li><a href="#">Payment Policy</a></li>
                                    <li><a href="#">FAQ</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto col-md-6 col-lg-auto">
                        <div class="widget widget_nav_menu  footer-widget">
                            <h3 class="widget_title">Follow Us On</h3>
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
                            <h3 class="widget_title">Shop Address</h3>
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
                        Code End  Here 
        ******************************** -->


    <!-- Scroll To Top -->
    <a href="#" class="scrollToTop scroll-btn"><i class="far fa-arrow-up"></i></a>


    <!--==============================
        All Js File
    ============================== -->
    <!-- Jquery -->
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/vendor/jquery-3.6.0.min.js"></script>
    <!-- Slick Slider -->
    <!-- <script src="assets/js/app.min.js"></script> -->
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/slick.min.js"></script>
    <!-- Layerslider -->
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/layerslider.utils.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/layerslider.transitions.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/layerslider.kreaturamedia.jquery.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.min.js"></script>
    <!-- Magnific Popup -->
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.magnific-popup.min.js"></script>
    <!-- Isotope Filter -->
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/isotope.pkgd.min.js"></script>
    <!-- Custom Carousel -->
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/vscustom-carousel.min.js"></script>
    <!-- Form Js -->
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/ajax-mail.js"></script>
    <!-- Main Js File -->
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/main.js"></script>

<?php wp_footer(); ?>

</body>

</html>