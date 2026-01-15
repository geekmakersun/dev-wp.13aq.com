// 商店标签切换功能
(function () {
    "use strict";

    // 评论标签切换
    const reviewTabLinks = document.querySelectorAll('.reviews-summary__buttons a');
    reviewTabLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const tabId = this.getAttribute('href');
            const tabElement = document.querySelector(tabId);
            
            if (tabElement) {
                // 移除所有标签的active和show类
                const allTabs = document.querySelectorAll('[role="tabpanel"]');
                allTabs.forEach(tab => {
                    tab.classList.remove('active', 'show');
                });
                
                // 添加当前标签的active和show类
                tabElement.classList.add('active', 'show');
                
                // 移除所有链接的active类
                reviewTabLinks.forEach(link => {
                    link.classList.remove('active');
                });
                
                // 添加当前链接的active类
                this.classList.add('active');
            }
        });
    });

    // 评论表单切换
    const reviewTogglers = document.querySelectorAll('.review-toggler');
    reviewTogglers.forEach(toggler => {
        toggler.addEventListener('click', function() {
            const reviewForm = document.getElementById('review_form');
            if (reviewForm) {
                // 切换表单的显示/隐藏
                if (reviewForm.style.display === 'none' || reviewForm.style.display === '') {
                    reviewForm.style.display = 'block';
                } else {
                    reviewForm.style.display = 'none';
                }
            }
        });
    });

})();