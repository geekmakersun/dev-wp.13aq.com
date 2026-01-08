
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

// 禁用下拉菜单的点击展开行为，只保留鼠标悬停展开
document.addEventListener('DOMContentLoaded', function() {
  // 获取所有下拉菜单触发器
  const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
  
  // 为每个触发器添加点击事件监听器，阻止默认行为
  dropdownToggles.forEach(toggle => {
    toggle.addEventListener('click', function(e) {
      // 阻止默认点击行为
      e.preventDefault();
      // 阻止事件冒泡
      e.stopPropagation();
    });
  });
});