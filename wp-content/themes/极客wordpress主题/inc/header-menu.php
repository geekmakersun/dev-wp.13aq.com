<?php

/**
 * 头部菜单功能
 *
 * 处理主题的头部导航菜单相关功能
 * 提供菜单位置注册、自定义类添加和菜单渲染功能
 *
 * @package Geek_WP_Theme
 */

/**
 * 头部菜单类
 *
 * 采用面向对象方式管理菜单功能
 */
class Geek_Header_Menu {
	
	/**
	 * 菜单位置名称
	 *
	 * @var string
	 */
	protected $location = 'header-menu';
	
	/**
	 * 构造函数
	 */
	public function __construct() {
		// 注册钩子
		$this->register_hooks();
	}
	
	/**
	 * 注册钩子
	 */
	public function register_hooks() {
		// 注册菜单位置
		add_action('after_setup_theme', array($this, 'register_menu_locations'));
		
		// 菜单项自定义类
		add_filter('nav_menu_css_class', array($this, 'add_li_class'), 10, 4);
		
		// 子菜单自定义类
		add_filter('nav_menu_submenu_css_class', array($this, 'add_submenu_class'), 10, 3);
		
		// 菜单项链接类
		add_filter('nav_menu_link_attributes', array($this, 'update_link_attributes'), 10, 4);
		
		// 菜单项HTML输出过滤，添加vs-mean-expand元素
		add_filter('walker_nav_menu_start_el', array($this, 'add_vs_mean_expand'), 10, 4);
	}
	
	/**
	 * 注册菜单位置
	 */
	public function register_menu_locations() {
		register_nav_menus(array(
			$this->location => __('顶部菜单', 'geek-wp-theme'),
		));
	}
	
	/**
	 * 为菜单项添加自定义类
	 *
	 * @param array  $classes 菜单项当前类数组
	 * @param object $item    菜单项对象
	 * @param array  $args    菜单参数
	 * @param int    $depth   菜单深度
	 * @return array 更新后的菜单项类数组
	 */
	public function add_li_class($classes, $item, $args, $depth) {
		// 添加自定义li类
		if (isset($args->add_li_class)) {
			$classes[] = $args->add_li_class;
		}

		// 为有子菜单的项添加 dropdown 类
		if (in_array('menu-item-has-children', $item->classes)) {
			$classes[] = 'dropdown';
			// 为移动菜单添加 vs-item-has-children 类
			$classes[] = 'vs-item-has-children';
		}

		return $classes;
	}
	
	/**
	 * 为子菜单添加自定义类
	 *
	 * @param string $classes 子菜单当前类数组
	 * @param array  $args    菜单参数
	 * @param int    $depth   菜单深度
	 * @return string 更新后的子菜单类数组
	 */
	public function add_submenu_class($classes, $args, $depth) {
		// 检查是否为移动菜单（根据调用上下文判断）
		// 移动菜单在header.php中调用时，menu_class为空字符串
		$is_mobile_menu = ($args->menu_class === '');
		
		// 为所有菜单添加 vs-submenu 类，用于移动菜单样式
		$classes[] = 'vs-submenu';
		
		// 仅为非移动菜单添加 Bootstrap 5 的 dropdown-menu 类
		if (!$is_mobile_menu) {
			$classes[] = 'dropdown-menu';
			
			// 根据深度添加不同的类
			if ($depth === 0) {
				$classes[] = 'dropdown-menu-end';
			}
		}
		
		return $classes;
	}
	
	/**
	 * 更新菜单项链接属性
	 *
	 * @param array  $atts  链接属性数组
	 * @param object $item  菜单项对象
	 * @param array  $args  菜单参数
	 * @param int    $depth 菜单深度
	 * @return array 更新后的链接属性数组
	 */
	public function update_link_attributes($atts, $item, $args, $depth) {
		// 检查是否为移动菜单（根据调用上下文判断）
		// 移动菜单在header.php中调用时，menu_class为空字符串
		$is_mobile_menu = ($args->menu_class === '');
		
		// 如果是移动菜单，不应用桌面菜单的类
		if ($is_mobile_menu) {
			// 移除所有不必要的属性，只保留原始的class属性
			$atts = array_intersect_key($atts, array('href' => 1, 'title' => 1, 'target' => 1, 'rel' => 1));
			// 不添加额外的类，使用默认的nav-link
			if (!isset($atts['class'])) {
				$atts['class'] = '';
			}
			// 添加当前菜单项状态
			if (in_array('current-menu-item', $item->classes)) {
				$atts['class'] .= ' active';
				$atts['aria-current'] = 'page';
			}
		} else {
			// 重置类属性
			$atts['class'] = '';

			// 根据深度设置不同的类
			if ($depth === 0) {
				if (in_array('menu-item-has-children', $item->classes)) {
					$atts['class'] = 'nav-link dropdown-toggle';
					$atts['role'] = 'button';
					$atts['data-bs-toggle'] = 'dropdown';
					$atts['aria-expanded'] = 'false';
				} else {
					$atts['class'] = 'nav-link';
				}
			} else {
				$atts['class'] = 'dropdown-item';
			}
			
			// 添加当前菜单项状态
			if (in_array('current-menu-item', $item->classes)) {
				$atts['class'] .= ' active';
				$atts['aria-current'] = 'page';
			}
		}

		return $atts;
	}
	
	/**
	 * 为移动菜单添加图标和 vs-mean-expand 元素
	 *
	 * @param string $item_output 菜单项HTML输出
	 * @param object $item        菜单项对象
	 * @param int    $depth       菜单深度
	 * @param array  $args        菜单参数
	 * @return string 更新后的菜单项HTML输出
	 */
	public function add_vs_mean_expand($item_output, $item, $depth, $args) {
		// 检查是否为移动菜单（根据调用上下文判断）
		$is_mobile_menu = ($args->menu_class === '');
		
		if ($is_mobile_menu) {
			// 仅处理有子菜单的项
			if (in_array('menu-item-has-children', $item->classes)) {
				// 为有子菜单的项添加箭头图标和 vs-mean-expand 元素
				// 箭头图标使用span元素包裹，类似vs-mean-expand的实现方式
				$item_output = preg_replace('/(<a\b[^>]*>)(.*?)(<\/a>)/i', '$1<span class="vs-menu-arrow"><i class="bi bi-chevron-right"></i></span> $2<span class="vs-mean-expand"><i class="bi bi-plus"></i></span></a>', $item_output);
			} else {
				// 为无子菜单的项仅添加箭头图标
				$item_output = preg_replace('/(<a\b[^>]*>)(.*?)(<\/a>)/i', '$1<span class="vs-menu-arrow"><i class="bi bi-chevron-right"></i></span> $2</a>', $item_output);
			}
		}
		
		return $item_output;
	}
	
	/**
	 * 获取默认菜单参数
	 *
	 * @return array 默认菜单参数
	 */
	public function get_default_args() {
		return array(
			'theme_location' => $this->location,
			'depth'          => 2,
			'container'      => false,
			'menu_class'     => 'navbar-nav',
			'fallback_cb'    => '__return_false',
			'add_li_class'   => 'nav-item',
			'link_class'     => 'nav-link'
		);
	}
	
	/**
	 * 渲染菜单
	 *
	 * @param array $args 菜单参数
	 */
	public function render($args = array()) {
		// 合并用户参数和默认参数
		$merged_args = wp_parse_args($args, $this->get_default_args());

		// 输出菜单
		wp_nav_menu($merged_args);
	}
	
	/**
	 * 检查菜单是否存在
	 *
	 * @return bool 菜单是否存在
	 */
	public function menu_exists() {
		return has_nav_menu($this->location);
	}
}

/**
 * 获取头部菜单实例
 *
 * @return Geek_Header_Menu
 */
function geek_get_header_menu() {
	static $instance;
	
	if (null === $instance) {
		$instance = new Geek_Header_Menu();
	}
	
	return $instance;
}

/**
 * 渲染头部菜单的便捷函数
 *
 * @param array $args 菜单参数
 */
function geek_theme_output_header_menu($args = array()) {
	$menu = geek_get_header_menu();
	$menu->render($args);
}

// 初始化头部菜单
add_action('init', function() {
	geek_get_header_menu();
});

