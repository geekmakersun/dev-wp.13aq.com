<?php


/**
 * WordPress 配置文件
 *
 * 本文件包含网站运行所需的基本配置信息
 * 包括数据库设置、安全密钥、表前缀等核心配置
 *
 * @package WordPress
 * @link `https://developer.wordpress.org/advanced-administration/wordpress/wp-config/` 
 */

// =============================================================================
// 数据库配置
// =============================================================================
/** 数据库名称 */
define( 'DB_NAME', 'dev_wp_13aq' );

/** 数据库用户名 */
define( 'DB_USER', 'dev_wp_13aq' );

/** 数据库密码 */
define( 'DB_PASSWORD', 'ZQU[j*b6)@wKtD9B' );

/** 数据库主机 */
define( 'DB_HOST', 'localhost' );

/** 数据库字符集 */
define( 'DB_CHARSET', 'utf8mb4' );

/** 数据库排序规则 */
define( 'DB_COLLATE', '' );

// =============================================================================
// 认证密钥和盐 (安全配置)
// =============================================================================
/**
 * 使用 WordPress.org 密钥服务生成唯一密钥
 * @link `https://api.wordpress.org/secret-key/1.1/salt/` 
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ' =p()>R`c}P{J2P|4g%0ubZR[=|kv,-5y 9*<+A?SEwpmUdaK_PL%{F@g-$6j$~A' );
define( 'SECURE_AUTH_KEY',  '@L W{AYX0v].NP+{D]06x|C2NG5+SMt!jJKz%HoY6$;|VB$yW1Kx i>0W1la(&Dj' );
define( 'LOGGED_IN_KEY',    'ZBixV;Px8r91*;s`w/i:]Ll;Q [D5{.g9{?Q&Xmp,2R-N$l+.)IR{y)Cb[fjgkwm' );
define( 'NONCE_KEY',        'PQB;(>fX|YD#lAq7j|ii,ns15eOOX_ak^q!pVsn^((][4PlU!UGjq5HgBFB4eR]s' );
define( 'AUTH_SALT',        '1}Wk9JZa7z^y(~$lc-@9](b*jwEW:z[jf:-2I,LHVP*Cy3Tj.IACW_=s%T{a3_!h' );
define( 'SECURE_AUTH_SALT', '.^Te lk299t~~y^ZqS HVX B@i$(lK!>~7XJ=9oF@`bEGmA>xMA]CW;Ws0^ g^?n' );
define( 'LOGGED_IN_SALT',   '71M%$k`isYDE+l[X,ksyka0e;d@$MWS%i7-lMvtB7*_&*KDgD@3BWdF)?!Dzy5iK' );
define( 'NONCE_SALT',       'Sb`oT;HCM$}uYK5x_*c?7fzcwG3!)WeO[2HH&R=cc:>bvZc0+YL{Dy9z4](X,L<d' );

// =============================================================================
// WordPress 基础配置
// =============================================================================
/** 数据库表前缀 */
$table_prefix = 'wp_';

/** WordPress 本地化语言设置 (中文简体) */
define( 'WPLANG', 'zh_CN' );

/** 区域设置优化 - 中国时区 */
define( 'WP_TIMEZONE', 'Asia/Shanghai' );
define( 'GMT_OFFSET', 8 );

// =============================================================================
// 安全设置
// =============================================================================
/** 禁止在线编辑主题和插件文件 */
define( 'DISALLOW_FILE_EDIT', true );

// =============================================================================
// 调试设置 (生产环境建议设置为 false)
// =============================================================================
/**
 * 启用 WordPress 调试模式
 * 开发环境可设置为 true，生产环境建议设为 false
 */
define('WP_DEBUG', false);

// =============================================================================
// WordPress 核心文件路径 (请勿修改)
// =============================================================================
/** WordPress 目录绝对路径 */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

// 使用自定义数据库错误信息，不暴露详细错误
define( 'DIEONDBERROR', true );

// ==============================================================
// WordPress自动更新设置
// ==============================================================

// 自动更新小版本和安全更新
define( 'WP_AUTO_UPDATE_CORE', 'minor' );

// 启用自动更新器
define( 'AUTOMATIC_UPDATER_DISABLED', false );

// 允许在Git环境中进行核心更新
define( 'CORE_UPGRADE_SKIP_NEW_BUNDLED', false );

// 配置文件权限检查忽略Git目录
define( 'FS_METHOD', 'direct' );
define( 'FS_CHMOD_DIR', ( 0755 & ~ umask() ) );
define( 'FS_CHMOD_FILE', ( 0644 & ~ umask() ) );



// ==============================================================
// 性能优化设置
// ==============================================================

// 增加内存限制
define( 'WP_MEMORY_LIMIT', '256M' );
define( 'WP_MAX_MEMORY_LIMIT', '256M' );

// 限制修订版本数量
define( 'WP_POST_REVISIONS', 3 );

// 自动保存间隔 (秒)
define( 'AUTOSAVE_INTERVAL', 300 );

// 启用数据库查询缓存
define( 'WP_CACHE', true );

// 垃圾保留天数
define( 'EMPTY_TRASH_DAYS', 7 );

// 调试日志设置 (记录错误但不向用户显示)
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', false );
@ini_set( 'display_errors', 0 );
@ini_set( 'log_errors', 1 );


/** 加载 WordPress 核心文件 */
require_once ABSPATH . 'wp-settings.php';
