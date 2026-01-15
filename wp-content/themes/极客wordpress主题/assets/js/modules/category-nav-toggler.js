// 分类导航切换功能
(function () {
    "use strict";

    // 分类导航切换函数
    function cateNavToggler() {
        if (window.innerWidth <= 576) {
            const navItems = document.querySelectorAll('.vs-box-nav .menu-item-has-children > a');
            navItems.forEach(item => {
                item.addEventListener('click', function (e) {
                    e.preventDefault();
                    const subMenu = this.nextElementSibling;
                    if (subMenu) {
                        if (subMenu.style.display === 'block') {
                            subMenu.style.display = 'none';
                        } else {
                            subMenu.style.display = 'block';
                        }
                        this.classList.toggle('active');
                    }
                });
            });
        }
    }

    // 初始化分类导航切换
    cateNavToggler();

    // 窗口大小变化时重新初始化
    window.addEventListener('resize', function () {
        cateNavToggler();
    });

})();