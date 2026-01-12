<?php
/**
 * Plugin Name: WooCommerce 分类排序
 * Plugin URI: 
 * Description: 为WooCommerce产品分类添加自定义排序功能
 * Version: 1.0.0
 * Author: 
 * Author URI: 
 * License: GPLv2 or later
 * Text Domain: woocommerce-category-sort
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class WC_Category_Sort {
    public function __construct() {
        add_action( 'init', array( $this, 'init' ) );
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );
        add_action( 'wp_ajax_wc_category_sort_update_order', array( $this, 'ajax_update_order' ) );
    }

    public function init() {
        // 为产品分类添加排序字段
        add_action( 'product_cat_add_form_fields', array( $this, 'add_sort_field' ) );
        add_action( 'product_cat_edit_form_fields', array( $this, 'edit_sort_field' ) );
        
        // 保存排序字段值
        add_action( 'created_product_cat', array( $this, 'save_sort_field' ) );
        add_action( 'edited_product_cat', array( $this, 'save_sort_field' ) );
        
        // 修改分类查询排序
        add_filter( 'terms_clauses', array( $this, 'order_terms_clauses' ), 10, 3 );
        
        // 添加排序列
        add_filter( 'manage_edit-product_cat_columns', array( $this, 'add_sort_column' ) );
        add_filter( 'manage_product_cat_custom_column', array( $this, 'display_sort_column' ), 10, 3 );
        
        // 使排序列可排序
        add_filter( 'manage_edit-product_cat_sortable_columns', array( $this, 'make_sort_column_sortable' ) );
    }
    
    // 加载后台JavaScript
    public function enqueue_admin_scripts( $hook_suffix ) {
        if ( 'edit-tags.php' === $hook_suffix && 'product_cat' === get_current_screen()->taxonomy ) {
            wp_enqueue_script( 'jquery-ui-sortable' );
            wp_enqueue_script( 'wc-category-sort-admin', plugin_dir_url( __FILE__ ) . 'admin.js', array( 'jquery', 'jquery-ui-sortable' ), '1.0.0', true );
            wp_localize_script( 'wc-category-sort-admin', 'wc_category_sort', array(
                'nonce' => wp_create_nonce( 'wc-category-sort-nonce' ),
                'success_message' => __( '分类排序已更新', 'woocommerce-category-sort' )
            ) );
        }
    }

    // 添加新分类时显示排序字段
    public function add_sort_field() {
        ?>
        <div class="form-field">
            <label for="cat_sort_order"><?php _e( '排序顺序', 'woocommerce-category-sort' ); ?></label>
            <input type="number" name="cat_sort_order" id="cat_sort_order" value="0" size="4" />
            <p class="description"><?php _e( '设置分类的显示顺序，数字越小越靠前', 'woocommerce-category-sort' ); ?></p>
        </div>
        <?php
    }

    // 编辑分类时显示排序字段
    public function edit_sort_field( $term ) {
        $sort_order = get_term_meta( $term->term_id, 'cat_sort_order', true );
        if ( empty( $sort_order ) ) {
            $sort_order = 0;
        }
        ?>
        <tr class="form-field">
            <th scope="row" valign="top"><label for="cat_sort_order"><?php _e( '排序顺序', 'woocommerce-category-sort' ); ?></label></th>
            <td>
                <input type="number" name="cat_sort_order" id="cat_sort_order" value="<?php echo esc_attr( $sort_order ); ?>" size="4" />
                <p class="description"><?php _e( '设置分类的显示顺序，数字越小越靠前', 'woocommerce-category-sort' ); ?></p>
            </td>
        </tr>
        <?php
    }

    // 保存排序字段值
    public function save_sort_field( $term_id ) {
        if ( isset( $_POST['cat_sort_order'] ) ) {
            $sort_order = intval( $_POST['cat_sort_order'] );
            update_term_meta( $term_id, 'cat_sort_order', $sort_order );
        }
    }

    // 修改分类查询排序
    public function order_terms_clauses( $clauses, $taxonomies, $args ) {
        if ( in_array( 'product_cat', $taxonomies ) && ( isset( $args['orderby'] ) && $args['orderby'] === 'menu_order' ) ) {
            global $wpdb;
            
            // 添加自定义排序字段到查询
            $clauses['join'] .= " LEFT JOIN {$wpdb->termmeta} AS term_meta ON {$wpdb->terms}.term_id = term_meta.term_id AND term_meta.meta_key = 'cat_sort_order'";
            $clauses['orderby'] = " CONVERT(term_meta.meta_value, UNSIGNED) ASC, {$wpdb->terms}.name ASC";
        }
        return $clauses;
    }
    
    // 添加排序列
    public function add_sort_column( $columns ) {
        $columns['sort_order'] = __( '排序顺序', 'woocommerce-category-sort' );
        return $columns;
    }
    
    // 显示排序值和拖拽手柄
    public function display_sort_column( $content, $column_name, $term_id ) {
        if ( 'sort_order' === $column_name ) {
            $sort_order = get_term_meta( $term_id, 'cat_sort_order', true );
            if ( empty( $sort_order ) ) {
                $sort_order = 0;
            }
            return '<span class="sort-handle" style="cursor: move; display: inline-block; margin-right: 8px;">☰</span>' . $sort_order;
        }
        return $content;
    }
    
    // 使排序列可排序
    public function make_sort_column_sortable( $sortable_columns ) {
        $sortable_columns['sort_order'] = 'cat_sort_order';
        return $sortable_columns;
    }
    
    // AJAX更新排序
    public function ajax_update_order() {
        check_ajax_referer( 'wc-category-sort-nonce', 'nonce' );
        
        if ( ! current_user_can( 'manage_product_terms' ) ) {
            wp_die( -1 );
        }
        
        if ( isset( $_POST['term_ids'] ) && is_array( $_POST['term_ids'] ) ) {
            $term_ids = array_map( 'intval', $_POST['term_ids'] );
            
            foreach ( $term_ids as $index => $term_id ) {
                update_term_meta( $term_id, 'cat_sort_order', $index );
            }
            
            wp_send_json_success();
        }
        
        wp_send_json_error();
    }
}

// 初始化插件
new WC_Category_Sort();
