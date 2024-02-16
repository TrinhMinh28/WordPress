<?php
// khai báo plugin
/*
 * Plugin Name:       DemoPlugin-ecommerce
 * Plugin URI:        #
 * Description:       Plugin Phục vụ học lập trình Wordpress
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Trịnh Minh
 * Author URI:        #
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        #
 * Text Domain:       wp2023-ecommerce
 * Domain Path:       /languages
 */
// định nghĩa hàm số của plugin
define('WP2023_PART', plugin_dir_path(__FILE__));
// đường dẫn code web
define('WP2023_URI', plugin_dir_url(__FILE__));
// echo tải file ngôn ngữ

add_action( 'init', 'wp2023_load_textdomain' );

function wp2023_load_textdomain() {
	load_plugin_textdomain( 'wp2023-ecommerce', false, WP2023_PART . '/languages' ); 
}

//load_textdomain_mofile.
function wp2023_load_my_own_textdomain( $mofile, $domain ) {
	if ( 'wp2023-ecommerce' === $domain && false !== strpos( $mofile, WP_LANG_DIR . '/plugins/' ) ) {
		$locale = apply_filters( 'plugin_locale', determine_locale(), $domain ); // lấy đuôi $locale trong cài đăht ngon ngữ của wp với đường dẫn wp-content/languages
		$mofile = WP2023_PART. '/languages/' . $domain . '-' . $locale . '.mo';
	}
	return $mofile;
}
add_filter( 'load_textdomain_mofile', 'wp2023_load_my_own_textdomain', 10, 2 );
// định nghĩa khi hàm plugin dc khíc hoact
register_activation_hook(
    __FILE__,
    'wp2023_ecommerce_activation'
);
function wp2023_ecommerce_activation()
{
    //Tạo CSDL
    include_once WP2023_PART.'includes/db/migration.php';
    
    // Tạo DL mẫu
    include_once WP2023_PART.'includes/db/seeder.php';
     // Tạo options
     update_option('wp2023_settings_options',[]);
}

// ĐỊnh nghĩa hành đông khi plugin dc tắt đi
register_deactivation_hook(
	__FILE__,
	'wp2023_ecommerce_deactivation'
);
function wp2023_ecommerce_deactivation()
{
    //Xóa CSDL
    include_once WP2023_PART.'includes/db/migration_destroy.php';

    // Xóa options
    delete_option('wp2023_settings_options');
}
 include_once WP2023_PART.'includes/includes.php';
