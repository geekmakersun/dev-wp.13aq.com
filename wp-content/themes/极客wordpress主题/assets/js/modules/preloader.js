// 预加载器功能
(function () {
    "use strict";

    // 页面加载完成后隐藏预加载器
    window.addEventListener('load', function () {
        const preloader = document.querySelector('.preloader');
        if (preloader) {
            preloader.style.transition = 'opacity 0.8s ease';
            preloader.style.opacity = '0';
            setTimeout(() => {
                preloader.remove();
            }, 800);
        }
    });

    // 手动关闭预加载器的按钮功能
    const preloaderCloseBtns = document.querySelectorAll('.preloaderCls');
    preloaderCloseBtns.forEach(btn => {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            const preloader = document.querySelector('.preloader');
            if (preloader) {
                preloader.style.transition = 'opacity 0.8s ease';
                preloader.style.opacity = '0';
                setTimeout(() => {
                    preloader.remove();
                }, 800);
            }
        });
    });

})();