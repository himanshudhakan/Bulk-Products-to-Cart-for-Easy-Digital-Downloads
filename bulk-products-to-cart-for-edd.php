<?php

/**
 * The plugin bootstrap file
 *
 * @link              https://github.com/himanshudhakan
 * @since             1.0.0
 * @package           Bulk_Products_To_Cart_For_Edd
 *
 * @wordpress-plugin
 * Plugin Name:       Bulk Products to Cart for Easy Digital Downloads
 * Plugin URI:        https://github.com/himanshudhakan/bulk-products-to-cart-for-edd
 * Description:       -
 * Version:           1.0.0
 * Author:            Himanshu Dhakan
 * Author URI:        https://github.com/himanshudhakan
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       bptcfedd
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 */
define( 'BPTCFEDD_VERSION', '1.0.0' );

/**
 * Plugin dir path.
 */
define( 'BPTCFEDD_PLUGIN_DIR_PATH', plugin_dir_path( __FILE__ ) );

/**
 * Plugin dir url.
 */
define( 'BPTCFEDD_PLUGIN_DIR_URL', plugin_dir_url( __FILE__ ) );

/**
 * Includes dir path.
 */
define( 'BPTCFEDD_INC_DIR_PATH', BPTCFEDD_PLUGIN_DIR_PATH . 'includes/' );

/**
 * Admin dir path.
 */
define( 'BPTCFEDD_ADMIN_DIR_PATH', BPTCFEDD_PLUGIN_DIR_PATH . 'admin/' );

/**
 * Admin dir url.
 */
define( 'BPTCFEDD_ADMIN_DIR_URL', BPTCFEDD_PLUGIN_DIR_URL . 'admin/' );

/**
 * Public dir path.
 */
define( 'BPTCFEDD_PUBLIC_DIR_PATH', BPTCFEDD_PLUGIN_DIR_PATH . 'public/' );

/**
 * Public dir url.
 */
define( 'BPTCFEDD_PUBLIC_DIR_URL', BPTCFEDD_PLUGIN_DIR_URL . 'public/' );



/**
 * The code that runs during plugin activation.
 */
function activate_bptcfedd() {
	require_once BPTCFEDD_INC_DIR_PATH . 'class-bptcfedd-activator.php';
	Bulk_Products_To_Cart_For_Edd_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 */
function deactivate_bptcfedd() {
	require_once BPTCFEDD_INC_DIR_PATH . 'class-bptcfedd-deactivator.php';
	Bulk_Products_To_Cart_For_Edd_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_bptcfedd' );
register_deactivation_hook( __FILE__, 'deactivate_bptcfedd' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require BPTCFEDD_INC_DIR_PATH . 'class-bptcfedd.php';

/**
 * Begins execution of the plugin.
 *
 * @since    1.0.0
 */
function run_bptcfedd() {

	$plugin = new Bulk_Products_To_Cart_For_Edd();
	$plugin->run();

}
run_bptcfedd();
