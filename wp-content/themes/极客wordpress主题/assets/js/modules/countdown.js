// 倒计时功能
(function () {
    "use strict";

    // 倒计时插件
    function initCountdown(element) {
        const countDownDate = new Date(element.dataset.offerDate).getTime();
        const exprireCls = 'expired';
        const messageEl = element.querySelector('.message');
        
        // 查找元素的辅助函数
        function findElement(selector) {
            return element.querySelector(selector);
        }
        
        // 获取或创建倒计时显示元素
        const dayEl = findElement('.day') || createCountdownElement(element, 'day');
        const hourEl = findElement('.hour') || createCountdownElement(element, 'hour');
        const minuteEl = findElement('.minute') || createCountdownElement(element, 'minute');
        const secondsEl = findElement('.seconds') || createCountdownElement(element, 'seconds');
        
        // 每秒更新倒计时
        const counter = setInterval(function () {
            // 获取当前日期和时间
            const now = new Date().getTime();

            // 计算当前时间与倒计时结束时间的差值
            const distance = countDownDate - now;

            // 时间计算：天、小时、分钟、秒
            let days = Math.floor(distance / (1000 * 60 * 60 * 24));
            let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            let seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // 如果值小于10，在数字前添加0
            days = days < 10 ? '0' + days : days.toString();
            hours = hours < 10 ? '0' + hours : hours.toString();
            minutes = minutes < 10 ? '0' + minutes : minutes.toString();
            seconds = seconds < 10 ? '0' + seconds : seconds.toString();

            // 如果倒计时结束，显示过期信息
            if (distance < 0) {
                clearInterval(counter);
                element.classList.add(exprireCls);
                if (messageEl) {
                    messageEl.style.display = 'block';
                }
            } else {
                // 将结果输出到元素中
                dayEl.textContent = days;
                hourEl.textContent = hours;
                minuteEl.textContent = minutes;
                secondsEl.textContent = seconds;
            }
        }, 1000);
    }
    
    // 创建倒计时显示元素
    function createCountdownElement(parent, type) {
        const element = document.createElement('div');
        element.className = type;
        element.textContent = '00';
        parent.appendChild(element);
        return element;
    }

    // 初始化优惠倒计时
    const offerCounters = document.querySelectorAll('.offer-counter');
    offerCounters.forEach(counter => {
        initCountdown(counter);
    });

    // 初始化通知倒计时
    const noticeCounters = document.querySelectorAll('.notice-counter');
    noticeCounters.forEach(counter => {
        initCountdown(counter);
    });

})();