// 区块位置功能
(function () {
    "use strict";

    // 整数转换函数
    function convertInteger(str) {
        return parseInt(str, 10);
    }

    // 区块位置设置函数
    function setSectionPosition(section, mainAttr, posAttr) {
        function setPosition() {
            const sectionHeight = Math.floor(section.offsetHeight / 2); // 区块高度的一半
            const posData = section.getAttribute(mainAttr); // 位置数据
            const posFor = section.getAttribute(posAttr); // 位置应用的目标区块
            const topMark = 'top-half'; // 顶部位置标记
            const bottomMark = 'bottom-half'; // 底部位置标记
            
            // 获取父元素
            const parentElement = document.querySelector(posFor);
            if (!parentElement) return;
            
            // 获取父元素的默认内边距
            const computedStyle = window.getComputedStyle(parentElement);
            const parentPT = convertInteger(computedStyle.paddingTop);
            const parentPB = convertInteger(computedStyle.paddingBottom);

            if (posData === topMark) {
                parentElement.style.paddingBottom = (parentPB + sectionHeight) + 'px';
                section.style.marginTop = '-' + sectionHeight + 'px';
            } else if (posData === bottomMark) {
                parentElement.style.paddingTop = (parentPT + sectionHeight) + 'px';
                section.style.marginBottom = '-' + sectionHeight + 'px';
            }
        }
        
        setPosition(); // 加载时设置内边距
    }

    // 初始化区块位置功能
    const positionHandler = '[data-sec-pos]';
    const sections = document.querySelectorAll(positionHandler);
    
    if (sections.length > 0) {
        // 检查imagesLoaded库是否可用
        if (typeof imagesLoaded !== 'undefined') {
            // 使用imagesLoaded确保图片加载完成后再计算高度
            imagesLoaded(sections, function () {
                sections.forEach(section => {
                    setSectionPosition(section, 'data-sec-pos', 'data-pos-for');
                });
            });
        } else {
            // 如果imagesLoaded不可用，直接初始化
            sections.forEach(section => {
                setSectionPosition(section, 'data-sec-pos', 'data-pos-for');
            });
        }
    }

})();