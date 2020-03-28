<?php

// BEGIN iThemes Security - Do not modify or remove this line
// iThemes Security Config Details: 2
define( 'DISALLOW_FILE_EDIT', true ); // Disable File Editor - Security > Settings > WordPress Tweaks > File Editor
// END iThemes Security - Do not modify or remove this line

define('WP_CACHE', true); // Added by WP Rocket

/**
 * Cấu hình cơ bản cho WordPress
 *
 * Trong quá trình cài đặt, file "wp-config.php" sẽ được tạo dựa trên nội dung 
 * mẫu của file này. Bạn không bắt buộc phải sử dụng giao diện web để cài đặt, 
 * chỉ cần lưu file này lại với tên "wp-config.php" và điền các thông tin cần thiết.
 *
 * File này chứa các thiết lập sau:
 *
 * * Thiết lập MySQL
 * * Các khóa bí mật
 * * Tiền tố cho các bảng database
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Thiết lập MySQL - Bạn có thể lấy các thông tin này từ host/server ** //
/** Tên database MySQL */
define( 'DB_NAME', 'agneonws_vdsmart' );


/** Username của database */
define( 'DB_USER', 'agneonws_vdsmart' );


/** Mật khẩu của database */
define( 'DB_PASSWORD', 'h)p1rO(qZp+;' );


/** Hostname của database */
define( 'DB_HOST', 'localhost' );


/** Database charset sử dụng để tạo bảng database. */
define( 'DB_CHARSET', 'utf8mb4' );


/** Kiểu database collate. Đừng thay đổi nếu không hiểu rõ. */
define('DB_COLLATE', '');

/**#@+
 * Khóa xác thực và salt.
 *
 * Thay đổi các giá trị dưới đây thành các khóa không trùng nhau!
 * Bạn có thể tạo ra các khóa này bằng công cụ
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Bạn có thể thay đổi chúng bất cứ lúc nào để vô hiệu hóa tất cả
 * các cookie hiện có. Điều này sẽ buộc tất cả người dùng phải đăng nhập lại.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'x_F-76P+h`--.Oj.u%he4r$KBK=0w3+WbUPo8&UR@mZ~+wl.tPmFwC9 R+=U^C)~' );

define( 'SECURE_AUTH_KEY',  'g4>!E?@BuLck{DUA,wFzALFV0>nK12>v3fh8``m!0&nEk$Qt]6$aRp`Kah|lZmIY' );

define( 'LOGGED_IN_KEY',    'i0/W[.DF{;x$aH~+DC8pC^WAIf5<xEU%d%lGMHbS*[])BXlcp7r_l-jg #?L_B`4' );

define( 'NONCE_KEY',        '=,Uz:=5 |!t>^%4d98L<Gz,Z<10aW_PFXcj#N>h|orS~Svjs.[ja2W$A=-zs<qt/' );

define( 'AUTH_SALT',        'Y.,[j+aonnC*.v`d?6fO1_KaOQ/~lKa&.,rUPN$zx7{qa_$~R053NlL AqdD.RLb' );

define( 'SECURE_AUTH_SALT', '^I|67^oLPn]Es)Sy-oqh?:q7l3<PzJd=:gqu=%Z*;U~J61$a>#+#V/p|bx$eBdXP' );

define( 'LOGGED_IN_SALT',   '_Fj4-YeVpYvy^`]nqgbh&um+@c[(St&Glpt4^ba}8 Ov1Fq^GG-8gvZq}Dg`LJgF' );

define( 'NONCE_SALT',       'n?5[6JZsE|EG/-GL}9#b>PQ2Rl9U},MT~$m)JdkgQI51`2T3I)Va{<^zY+ 1z@8i' );


/**#@-*/

/**
 * Tiền tố cho bảng database.
 *
 * Đặt tiền tố cho bảng giúp bạn có thể cài nhiều site WordPress vào cùng một database.
 * Chỉ sử dụng số, ký tự và dấu gạch dưới!
 */
$table_prefix  = 'wp_';

/**
 * Dành cho developer: Chế độ debug.
 *
 * Thay đổi hằng số này thành true sẽ làm hiện lên các thông báo trong quá trình phát triển.
 * Chúng tôi khuyến cáo các developer sử dụng WP_DEBUG trong quá trình phát triển plugin và theme.
 *
 * Để có thông tin về các hằng số khác có thể sử dụng khi debug, hãy xem tại Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Đó là tất cả thiết lập, ngưng sửa từ phần này trở xuống. Chúc bạn viết blog vui vẻ. */

/** Đường dẫn tuyệt đối đến thư mục cài đặt WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Thiết lập biến và include file. */
require_once(ABSPATH . 'wp-settings.php');
