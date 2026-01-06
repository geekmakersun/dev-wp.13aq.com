/**
 * 后台管理脚本
 *
 * 极客主题后台管理页面的自定义脚本
 *
 * @package 极客wordpress主题
 */

jQuery(document).ready(function($) {
    'use strict';
    
    /**
     * 颜色选择器联动
     * 将颜色选择器的值同步到文本输入框
     */
    function initColorPickers() {
        $('.color-picker-container input[type="color"]').on('input', function() {
            var colorValue = $(this).val();
            var hexInput = $(this).siblings('input[type="text"]');
            if (hexInput.length > 0) {
                hexInput.val(colorValue);
            }
        });
        
        // 文本输入框变化时同步到颜色选择器
        $('.color-picker-container input[type="text"]').on('input', function() {
            var hexValue = $(this).val();
            var colorInput = $(this).siblings('input[type="color"]');
            if (colorInput.length > 0 && /^#[0-9A-F]{6}$/i.test(hexValue)) {
                colorInput.val(hexValue);
            }
        });
    }
    
    /**
     * 表单验证
     * 在提交前验证必填字段
     */
    function initFormValidation() {
        $('form').on('submit', function(e) {
            var isValid = true;
            var requiredFields = $(this).find('[required]');
            
            requiredFields.each(function() {
                if ($(this).val() === '') {
                    isValid = false;
                    $(this).addClass('error');
                    $(this).next('.description').addClass('error-text');
                } else {
                    $(this).removeClass('error');
                    $(this).next('.description').removeClass('error-text');
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                alert('请填写所有必填字段。');
            }
        });
    }
    
    /**
     * 动态显示/隐藏字段
     * 根据某些字段的值显示或隐藏其他字段
     */
    function initDynamicFields() {
        // 示例：根据导航样式显示/隐藏特定选项
        $('#geek_nav_style').on('change', function() {
            var navStyle = $(this).val();
            
            // 根据不同的导航样式显示/隐藏特定设置
            if (navStyle === 'modern') {
                $('.modern-nav-options').show();
            } else {
                $('.modern-nav-options').hide();
            }
        });
        
        // 初始化时触发一次
        $('#geek_nav_style').trigger('change');
    }
    
    /**
     * 平滑滚动到锚点
     * 点击内部链接时平滑滚动
     */
    function initSmoothScroll() {
        $('.nav-tab-wrapper a').on('click', function(e) {
            var href = $(this).attr('href');
            if (href.startsWith('#')) {
                e.preventDefault();
                var target = $(href);
                if (target.length > 0) {
                    $('html, body').animate({
                        scrollTop: target.offset().top - 20
                    }, 300);
                }
            }
        });
    }
    
    /**
     * 初始化所有功能
     */
    function initAdminScripts() {
        initColorPickers();
        initFormValidation();
        initDynamicFields();
        initSmoothScroll();
    }
    
    // 页面加载完成后初始化
    initAdminScripts();
    
    // 添加自定义事件，便于后续扩展
    $(document).trigger('geek-admin-scripts-loaded');
});
