// 回到顶部功能
(function () {
    "use strict";

    const scrollToTopBtn = ".scroll-to-top";

    // 监听滚动事件，控制回到顶部按钮的显示/隐藏
    window.addEventListener("scroll", function () {
        if (window.scrollY > 500) {
            document.documentElement.classList.add('scroll-active');
        } else {
            document.documentElement.classList.remove('scroll-active');
        }
    });

    // 点击回到顶部按钮时，平滑滚动到页面顶部
    const scrollToTopBtns = document.querySelectorAll(scrollToTopBtn);
    scrollToTopBtns.forEach(btn => {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    });

})();