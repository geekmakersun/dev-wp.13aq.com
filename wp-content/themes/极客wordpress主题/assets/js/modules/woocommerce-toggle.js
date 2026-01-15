// WooCommerce 切换功能
(function () {
    "use strict";

    // 不同地址配送切换
    const shipToDifferentCheckbox = document.getElementById('ship-to-different-address-checkbox');
    if (shipToDifferentCheckbox) {
        shipToDifferentCheckbox.addEventListener('change', function () {
            const shippingAddress = document.getElementById('ship-to-different-address').nextElementSibling;
            if (shippingAddress && shippingAddress.classList.contains('shipping_address')) {
                if (this.checked) {
                    shippingAddress.style.display = 'block';
                } else {
                    shippingAddress.style.display = 'none';
                }
            }
        });
    }

    // 登录表单切换
    const loginToggleLinks = document.querySelectorAll('.woocommerce-form-login-toggle a');
    loginToggleLinks.forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            const loginForm = document.querySelector('.woocommerce-form-login');
            if (loginForm) {
                loginForm.style.display = loginForm.style.display === 'none' || loginForm.style.display === '' ? 'block' : 'none';
            }
        });
    });

    // 优惠券表单切换
    const couponToggleLinks = document.querySelectorAll('.woocommerce-form-coupon-toggle a');
    couponToggleLinks.forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            const couponForm = document.querySelector('.woocommerce-form-coupon');
            if (couponForm) {
                couponForm.style.display = couponForm.style.display === 'none' || couponForm.style.display === '' ? 'block' : 'none';
            }
        });
    });

    // 配送方式切换
    const shippingCalculatorButtons = document.querySelectorAll('.shipping-calculator-button');
    shippingCalculatorButtons.forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            const shippingCalculatorForm = this.nextElementSibling;
            if (shippingCalculatorForm && shippingCalculatorForm.classList.contains('shipping-calculator-form')) {
                shippingCalculatorForm.style.display = shippingCalculatorForm.style.display === 'none' || shippingCalculatorForm.style.display === '' ? 'block' : 'none';
            }
        });
    });

    // 支付方式切换
    const paymentMethods = document.querySelectorAll('.wc_payment_methods input[type="radio"]');
    if (paymentMethods.length > 0) {
        // 初始显示选中的支付方式
        const checkedPaymentMethod = document.querySelector('.wc_payment_methods input[type="radio"]:checked');
        if (checkedPaymentMethod) {
            const paymentBox = checkedPaymentMethod.nextElementSibling;
            if (paymentBox && paymentBox.classList.contains('payment_box')) {
                paymentBox.style.display = 'block';
            }
        }

        // 点击支付方式时切换显示
        paymentMethods.forEach(method => {
            method.addEventListener('change', function () {
                // 隐藏所有支付方式详情
                const allPaymentBoxes = document.querySelectorAll('.payment_box');
                allPaymentBoxes.forEach(box => {
                    box.style.display = 'none';
                });

                // 显示当前选中的支付方式详情
                const paymentBox = this.nextElementSibling;
                if (paymentBox && paymentBox.classList.contains('payment_box')) {
                    paymentBox.style.display = 'block';
                }
            });
        });
    }

    // 评分选择切换
    const ratingLinks = document.querySelectorAll('.rating-select .stars a');
    ratingLinks.forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            
            // 移除所有评分链接的active类
            const siblings = Array.from(this.parentElement.children);
            siblings.forEach(sibling => {
                sibling.classList.remove('active');
            });
            
            // 添加当前评分链接的active类
            this.classList.add('active');
            
            // 添加selected类到父元素的父元素
            this.parentElement.parentElement.classList.add('selected');
        });
    });

})();