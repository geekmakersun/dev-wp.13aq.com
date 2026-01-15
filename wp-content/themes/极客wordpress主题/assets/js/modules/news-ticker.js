// 新闻滚动功能
(function () {
    "use strict";

    // 节流函数，减少事件触发频率
    function throttle(func, wait) {
        var context, args, result;
        var timeout = null;
        var previous = 0;
        var later = function() {
            previous = Date.now();
            timeout = null;
            result = func.apply(context, args);
            if (!timeout) context = args = null;
        };
        return function() {
            var now = Date.now();
            var remaining = wait - (now - previous);
            context = this;
            args = arguments;
            if (remaining <= 0 || remaining > wait) {
                if (timeout) {
                    clearTimeout(timeout);
                    timeout = null;
                }
                previous = now;
                result = func.apply(context, args);
                if (!timeout) context = args = null;
            } else if (!timeout) {
                timeout = setTimeout(later, remaining);
            }
            return result;
        };
    }

    // 初始化新闻滚动
    const ticker = document.querySelector('[data-ticker="list"]');
    const tickerItem = '[data-ticker="item"]';
    
    if (ticker) {
        const duration = ticker.dataset.tickerDuration;
        const items = ticker.querySelectorAll(tickerItem);
        const itemCount = items.length;
        let viewportWidth = 0;
        let tickerAnimation = null;

        function setupViewport() {
            // 清除之前的克隆项，避免重复克隆
            const cloneItems = ticker.querySelectorAll('.clone-item');
            cloneItems.forEach(item => {
                item.remove();
            });
            
            // 克隆原始项并添加标识类
            items.forEach(item => {
                const clone = item.cloneNode(true);
                clone.classList.add('clone-item');
                ticker.insertBefore(clone, ticker.firstChild);
            });
            
            viewportWidth = 0;
            for (let i = 0; i < itemCount; i++) {
                const itemWidth = items[i].offsetWidth;
                viewportWidth += itemWidth;
            }
            ticker.style.width = viewportWidth + 'px';
        }

        function animateTicker() {
            // 清除之前的动画
            if (tickerAnimation) {
                clearTimeout(tickerAnimation);
            }
            
            let startTime = null;
            const marginLeft = 0;
            const targetMarginLeft = -viewportWidth;
            const durationMs = parseInt(duration, 10);
            
            function step(timestamp) {
                if (!startTime) startTime = timestamp;
                const progress = timestamp - startTime;
                const percentage = Math.min(progress / durationMs, 1);
                const currentMarginLeft = marginLeft + (targetMarginLeft - marginLeft) * percentage;
                
                ticker.style.marginLeft = currentMarginLeft + 'px';
                
                if (percentage < 1) {
                    tickerAnimation = requestAnimationFrame(step);
                } else {
                    ticker.style.marginLeft = '0';
                    animateTicker();
                }
            }
            
            tickerAnimation = requestAnimationFrame(step);
        }

        function initializeTicker() {
            setupViewport();
            animateTicker();

            // 鼠标悬停时暂停，离开时继续
            ticker.addEventListener('mouseenter', function () {
                if (tickerAnimation) {
                    cancelAnimationFrame(tickerAnimation);
                }
            });
            
            ticker.addEventListener('mouseout', function () {
                animateTicker();
            });

            // 使用节流函数处理窗口大小变化事件，避免频繁初始化
            window.addEventListener('resize', throttle(function(){
                // 停止当前动画
                if (tickerAnimation) {
                    cancelAnimationFrame(tickerAnimation);
                }
                // 重新计算宽度并开始动画
                setupViewport();
                animateTicker();
            }, 250));
        }

        initializeTicker();
    }

})();