// 产品轮播功能
(function ($) {
    "use strict";

    // 产品大图轮播
    $('.product-big-slide').slick({
        dots: false,
        infinite: true,
        arrows: false,
        autoplay: false,
        fade: true,
        focusOnSelect: true,
        speed: 1000,
        slidesToShow: 1,
        slidesToScroll: 1,
        asNavFor: '.product-thumb-slide',
    });

    // 产品缩略图轮播
    $('.product-thumb-slide').slick({
        dots: false,
        infinite: true,
        vertical: true,
        verticalSwiping: true,
        arrows: false,
        autoplay: false,
        fade: false,
        focusOnSelect: true,
        centerMode: true,
        centerPadding: '0',
        speed: 1000,
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.product-big-slide',
        responsive: [{
            breakpoint: 1500,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 1350,
            settings: {
                speed: 300,
                slidesToShow: 4,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 992,
            settings: {
                speed: 300,
                slidesToShow: 4,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 767,
            settings: {
                speed: 300,
                slidesToShow: 3,
                slidesToScroll: 1,
                vertical: false,
                verticalSwiping: false,
            }
        }]
    });

})(jQuery);