// 产品切换功能
(function () {
    "use strict";

    // 产品切换器
    const productSwitches = document.querySelectorAll('.product-switcher .switch');
    productSwitches.forEach(switchEl => {
        switchEl.addEventListener('click', function () {
            const productImg = this.closest('.product-switcher').querySelector('.product-img img');
            const src = this.dataset.srcset;
            if (productImg && src) {
                productImg.src = src;
            }
        });
    });

})();