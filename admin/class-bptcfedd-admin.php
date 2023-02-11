<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/himanshudhakan
 * @since      1.0.0
 *
 * @package    Bulk_Products_To_Cart_For_Edd
 * @subpackage Bulk_Products_To_Cart_For_Edd/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 *
 * @package    Bulk_Products_To_Cart_For_Edd
 * @subpackage Bulk_Products_To_Cart_For_Edd/admin
 * @author     Himanshu Dhakan <himanshudhakan9@gmail.com>
 */
class Bptcfedd_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since      1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	public function bptcfedd_add_admin_page(){

		add_submenu_page(
	    	'edit.php?post_type=bptcfedd_tables',
            __( 'Settings', 'bptcfedd' ),
			__( 'Settings', 'bptcfedd' ),
			'manage_options',
			'bptcfedd_settings',
			array($this, 'bptcfedd_add_admin_page_callback')
        );

	}

	public function bptcfedd_add_admin_page_callback(){



	}

	public function add_hooks(){

		add_action( 'admin_menu', array($this, 'bptcfedd_add_admin_page') );

	}

}
