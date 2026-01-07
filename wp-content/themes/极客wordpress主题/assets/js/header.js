
// 防抖函数（避免滚动事件频繁触发）
function debounce(func, wait = 10) {
  let timeout;
  return function() {
    clearTimeout(timeout);
    timeout = setTimeout(() => func.apply(this, arguments), wait);
  };
}

// 用防抖包裹滚动逻辑
window.addEventListener('scroll', debounce(function() {
  const mainHeader = document.getElementById('mainHeader');
  if (window.scrollY > 100) {
    mainHeader.classList.add('fixed-mainHeader');
  } else {
    mainHeader.classList.remove('fixed-mainHeader');
  }
}));