<?php
/**
 * Template Name: 联系我们
 *
 * 联系我们页面模板
 * 用于显示联系我们页面的自定义模板
 *
 * @package 极客wordpress主题
 */

get_header();
?>

<?php echo geek_get_breadcrumb(); ?>
<!--==============================
    联系我们信息
    ==============================-->
<section class="space">
    <div class="container">
        <div class="row gy-30">
            <div class="col-md-4 col-xl-4">
                <div class="info-box">
                    <div class="media-icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/location.png" alt="位置">
                    </div>
                    <div class="media-body">
                        <h3 class="info-title h4">地址</h3>
                        <p class="info-text">纽约市东休斯顿街布鲁克林区罗德尼街272号</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xl-4">
                <div class="info-box">
                    <div class="media-icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/contact.png" alt="联系方式">
                    </div>
                    <div class="media-body">
                        <h3 class="info-title h4">联系方式</h3>
                        <p class="info-text">手机: <a href="tel:06826589996">068 26589 996</a></p>
                        <p class="info-text">热线: <a href="tel:190026886">1900 26886</a></p>
                        <p class="info-text">邮箱: <a href="mailto:info@google.com">info@google.com</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xl-4">
                <div class="info-box">
                    <div class="media-icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/clock.png" alt="时钟">
                    </div>
                    <div class="media-body">
                        <h3 class="info-title h4">办公时间</h3>
                        <p class="info-text">周一至周五: 8:30 - 20:00</p>
                        <p class="info-text">周六至周日: 9:30 - 21:30</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--==============================
      联系表单区域
    ==============================-->
<section class="space" data-bg-src="<?php echo get_template_directory_uri(); ?>/assets/img/bg/bg-3-1.jpg">
    <div class="container text-center">
        <div class="title-area">
            <h2 class="sec-title-style5">发送消息</h2>
            <p class="sub-title-style5">联系我们</p>
        </div>
        <form action="mail.php" method="POST" class="ajax-contact">
            <div class="row">
                <div class="form-group col-md-6">
                    <input type="text" class="form-control style2" name="name" id="name" placeholder="输入您的姓名">
                    <i class="fal fa-user"></i>
                </div>
                <div class="form-group col-md-6">
                    <input type="email" class="form-control style2" name="email" id="email" placeholder="邮箱地址">
                    <i class="fal fa-envelope"></i>
                </div>
                <div class="form-group col-12">
                    <textarea name="message" id="message" cols="30" rows="3" class="form-control style2" placeholder="输入您的留言"></textarea>
                    <i class="fal fa-pencil"></i>
                </div>
                <div class="form-btn col-12">
                    <button class="vs-btn style7">发送消息</button>
                </div>
            </div>
            <p class="form-messages mb-0 mt-3"></p>
        </form>
    </div>
</section>
<!--==============================
    办公地点
    ==============================-->
<section class="space">
    <div class="container">
        <div class="row gy-30">
            <div class="col-md-6">
                <div class="info-style1">
                    <div class="info-img">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/contact/cont-1-1.jpg" alt="办公图片">
                    </div>
                    <div class="info-content">
                        <h3 class="info-title">北加利福尼亚</h3>
                        <p class="info-text">店铺: Maxy Limit</p>
                        <p class="info-text"><i class="fal fa-phone-alt"></i><a href="tel:+12512562145">+125 1256 2145</a></p>
                        <p class="info-text"><i class="fal fa-envelope"></i><a href="mailto:info@example.com">info@example.com</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="info-style1">
                    <div class="info-img">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/contact/cont-1-2.jpg" alt="办公图片">
                    </div>
                    <div class="info-content">
                        <h3 class="info-title">纽约市</h3>
                        <p class="info-text">店铺: Angfuzsoft Ltd</p>
                        <p class="info-text"><i class="fal fa-phone-alt"></i><a href="tel:+7934996763">+793 4996 763</a></p>
                        <p class="info-text"><i class="fal fa-envelope"></i><a href="mailto:info@example.com">info@example.com</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
?>