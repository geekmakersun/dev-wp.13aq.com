// 弹窗菜单功能（侧边栏、新闻订阅、搜索框）
(function () {
    "use strict";

    // 通用弹窗菜单函数
    function popupMenu(menu, menuOpen, menuCls, toggleCls, contentSelector) {
        // 获取元素
        const menuEl = document.querySelector(menu);
        const menuOpenEls = document.querySelectorAll(menuOpen);
        
        if (!menuEl) return;
        
        // 从弹窗内部获取关闭按钮
        const menuClsEls = menuEl.querySelectorAll(menuCls);
        const contentEl = contentSelector ? menuEl.querySelector(contentSelector) : null;

        // 打开弹窗
        menuOpenEls.forEach(openEl => {
            openEl.addEventListener('click', function (e) {
                e.preventDefault();
                menuEl.classList.add(toggleCls);
            });
        });

        // 点击弹窗外部关闭弹窗
        document.addEventListener('click', function (e) {
            if (menuEl.classList.contains(toggleCls) && !menuEl.contains(e.target)) {
                menuEl.classList.remove(toggleCls);
            }
        });

        // 点击弹窗内容区域不关闭弹窗
        if (contentEl) {
            contentEl.addEventListener('click', function (e) {
                e.stopPropagation();
            });
        }

        // 点击弹窗内部关闭按钮关闭弹窗
        menuClsEls.forEach(closeEl => {
            closeEl.addEventListener('click', function (e) {
                e.preventDefault();
                e.stopPropagation();
                menuEl.classList.remove(toggleCls);
            });
        });
    }

    // 初始化侧边菜单弹窗
    popupMenu('.side-menu', '.side-menu-open', '.side-menu-close', 'open');

    // 初始化新闻订阅弹窗
    if (document.querySelector('.popup-newsletter-active')) {
        popupMenu('.popup-newsletter-active', '.newsletter-popup-trigger', '.popup-newsletter-closer', 'show', '.newsletter-popup');
    }

    // 初始化搜索框弹窗
    popupMenu('.popup-search-box', '.search-btn', '.popup-search-close', 'open');

})();