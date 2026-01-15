// 产品切换功能
(function () {
    "use strict";

    // 产品涟漪效果切换
    const productRippleIcons = document.querySelectorAll('.product_ripple_icon');
    productRippleIcons.forEach(icon => {
        icon.addEventListener('click', function(e) {
            e.preventDefault();
            const productRippleBody = this.nextElementSibling;
            if (productRippleBody && productRippleBody.classList.contains('product_ripple_body')) {
                productRippleBody.classList.toggle('show');
            }
        });
    });

})();