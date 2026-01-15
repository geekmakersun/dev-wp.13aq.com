// 图片切换功能
(function () {
    "use strict";

    // 图片切换器
    const imgSwitchers = document.querySelectorAll('.img-switcher');
    imgSwitchers.forEach(switcher => {
        switcher.addEventListener('click', function() {
            const imgUrl = this.dataset.switch;
            const locationUrl = this.dataset.switchOn;
            const imgElement = document.querySelector(locationUrl);
            
            if (imgElement) {
                this.classList.add('active');
                
                // 移除兄弟元素的active类
                const siblings = Array.from(this.parentElement.children);
                siblings.forEach(sibling => {
                    if (sibling !== this) {
                        sibling.classList.remove('active');
                    }
                });
                
                imgElement.src = imgUrl;
            }
        });
    });

})();