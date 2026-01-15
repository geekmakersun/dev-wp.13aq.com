// 筛选功能
(function ($) {
    "use strict";

    // 筛选功能初始化
    $('.filter-active').imagesLoaded(function () {
        var $filter = '.filter-active',
            $filter2 = '.filter-active-style2',
            $filterItem = '.filter-item',
            $filterMenu = '.filter-menu-active';

        if ($($filter).length > 0) {
            var $grid = $($filter).isotope({
                itemSelector: $filterItem,
                filter: '*',
                masonry: {
                    // 使用grid-sizer的外部宽度作为列宽
                    columnWidth: $filterItem
                }
            });
        }

        if ($($filter2).length > 0 ) {
            var $grid = $($filter2).isotope({
                itemSelector: $filterItem,
                filter: '*',
                masonry: {
                    // 使用grid-sizer的外部宽度作为列宽
                    columnWidth: 1
                }
            });
        };

        // 点击按钮筛选项目
        $($filterMenu).on('click', 'button', function () {
            var filterValue = $(this).attr('data-filter');
            $grid.isotope({
                filter: filterValue
            });
        });

        // 菜单激活类
        $($filterMenu).on('click', 'button', function (event) {
            event.preventDefault();
            $(this).addClass('active');
            $(this).siblings('.active').removeClass('active');
        });

    });

})(jQuery);