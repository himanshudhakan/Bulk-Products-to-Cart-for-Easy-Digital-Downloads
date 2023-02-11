<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://github.com/himanshudhakan
 * @since      1.0.0
 *
 * @package    Bulk_Products_To_Cart_For_Edd
 * @subpackage Bulk_Products_To_Cart_For_Edd/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Bulk_Products_To_Cart_For_Edd
 * @subpackage Bulk_Products_To_Cart_For_Edd/includes
 * @author     Himanshu Dhakan <himanshudhakan9@gmail.com>
 */
class Bptcfedd_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'bptcfedd',
			false,
			BPTCFEDD_PLUGIN_DIR_PATH . '/languages/'
		);

	}



}
