// 移动菜单功能
(function () {
    "use strict";

    // 移动菜单插件
    function vsmobilemenu(element, options) {
        const opt = Object.assign({
            menuToggleBtn: '.vs-menu-toggle',
            bodyToggleClass: 'vs-body-visible',
            subMenuClass: 'vs-submenu',
            subMenuParent: 'vs-item-has-children',
            subMenuParentToggle: 'vs-active',
            meanExpandClass: 'vs-mean-expand',
            appendElement: '<span class="vs-mean-expand"><i class="bi bi-plus"></i></span>',
            subMenuToggleClass: 'vs-open',
            toggleSpeed: 400,
        }, options);

        const menu = element;

        // 菜单显示与隐藏
        function menuToggle() {
            menu.classList.toggle(opt.bodyToggleClass);

            // 在菜单显示/隐藏时折叠子菜单
            const subMenus = menu.querySelectorAll('.' + opt.subMenuClass);
            subMenus.forEach(subMenu => {
                if (subMenu.classList.contains(opt.subMenuToggleClass)) {
                    subMenu.classList.remove(opt.subMenuToggleClass);
                    subMenu.style.display = 'none';
                    subMenu.parentElement.classList.remove(opt.subMenuParentToggle);
                }
            });
        }

        // 为每个子菜单设置类
        const menuItems = menu.querySelectorAll('li');
        menuItems.forEach(item => {
            const submenu = item.querySelector('ul');
            if (submenu) {
                submenu.classList.add(opt.subMenuClass);
                submenu.style.display = 'none';
                item.classList.add(opt.subMenuParent);
                
                // 为链接添加展开按钮
                const links = item.querySelectorAll('a');
                links.forEach(link => {
                    link.insertAdjacentHTML('beforeend', opt.appendElement);
                });
            }
        });

        // 切换子菜单
        function toggleDropDown(element) {
            const nextUl = element.nextElementSibling;
            const prevUl = element.previousElementSibling;
            
            if (nextUl && nextUl.tagName === 'UL') {
                element.parentElement.classList.toggle(opt.subMenuParentToggle);
                
                // 切换子菜单显示状态
                if (nextUl.classList.contains(opt.subMenuToggleClass)) {
                    nextUl.classList.remove(opt.subMenuToggleClass);
                    nextUl.style.display = 'none';
                } else {
                    nextUl.classList.add(opt.subMenuToggleClass);
                    nextUl.style.display = 'block';
                }
                
                // 切换展开/收起按钮图标
                const expandIcon = element.querySelector('.' + opt.meanExpandClass + ' i');
                if (expandIcon) {
                    if (expandIcon.classList.contains('bi-plus')) {
                        expandIcon.classList.remove('bi-plus');
                        expandIcon.classList.add('bi-dash');
                    } else {
                        expandIcon.classList.remove('bi-dash');
                        expandIcon.classList.add('bi-plus');
                    }
                }
                
                // 切换菜单项前的箭头图标
                const arrowIcon = element.querySelector('.vs-menu-arrow i');
                if (arrowIcon) {
                    if (arrowIcon.classList.contains('bi-chevron-right')) {
                        arrowIcon.classList.remove('bi-chevron-right');
                        arrowIcon.classList.add('bi-chevron-down');
                    } else {
                        arrowIcon.classList.remove('bi-chevron-down');
                        arrowIcon.classList.add('bi-chevron-right');
                    }
                }
            } else if (prevUl && prevUl.tagName === 'UL') {
                element.parentElement.classList.toggle(opt.subMenuParentToggle);
                
                // 切换子菜单显示状态
                if (prevUl.classList.contains(opt.subMenuToggleClass)) {
                    prevUl.classList.remove(opt.subMenuToggleClass);
                    prevUl.style.display = 'none';
                } else {
                    prevUl.classList.add(opt.subMenuToggleClass);
                    prevUl.style.display = 'block';
                }
            }
        }

        // 子菜单切换按钮
        const expandTogglers = menu.querySelectorAll('.' + opt.meanExpandClass);
        expandTogglers.forEach(toggler => {
            toggler.addEventListener('click', function (e) {
                e.preventDefault();
                toggleDropDown(this.parentElement);
            });
        });

        // 点击切换按钮显示/隐藏菜单
        const menuToggleBtns = document.querySelectorAll(opt.menuToggleBtn);
        menuToggleBtns.forEach(btn => {
            btn.addEventListener('click', function () {
                menuToggle();
            });
        });

        // 点击菜单外部关闭菜单
        menu.addEventListener('click', function (e) {
            e.stopPropagation();
            menuToggle();
        });

        // 点击菜单内容区域不关闭菜单
        const menuContents = menu.querySelectorAll('div');
        menuContents.forEach(content => {
            content.addEventListener('click', function (e) {
                e.stopPropagation();
            });
        });
    }

    // 初始化移动菜单
    const menuWrappers = document.querySelectorAll('.vs-menu-wrapper');
    menuWrappers.forEach(wrapper => {
        vsmobilemenu(wrapper);
    });

})();