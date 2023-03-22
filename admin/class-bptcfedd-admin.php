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
	 * @since 	1.0.0
	 * @param   string    $plugin_name       The name of this plugin.
	 * @param   string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->allowed_screen_id = array(
			'bptcfedd_tables_page_bptcfedd_settings',
		);
		$this->allowed_post_types = array(
			'bptcfedd_tables',
		);

	}

	/**
	 * Add settings page to admin dashboard.
	 *
	 * @since 	1.0.0
	 */
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

	/**
	 * Add scripts for admin.
	 *
	 * @since 	1.0.0
	 * @param   string    $hook_suffix    The current page/screen id.
	 */
	public function bptcfedd_enqueue_scripts( $hook_suffix ){

		$post_type = get_post_type();
		wp_register_script('bptcfedd-select-script', BPTCFEDD_LIBS_DIR_URL . 'js/select2.min.js', array('jquery'), false, true );
		wp_register_script('bptcfedd-admin-script', BPTCFEDD_ADMIN_DIR_URL . 'js/admin.js', array('jquery'), false, true );

		if( in_array($hook_suffix, $this->allowed_screen_id) || in_array($post_type, $this->allowed_post_types) ){

			$bptcfedd_admin_obj = array( 
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
			);

			wp_enqueue_script('bptcfedd-select-script');
			wp_enqueue_script('bptcfedd-admin-script');
			wp_localize_script( 'bptcfedd-admin-script', 'bptcfedd_admin_obj', $bptcfedd_admin_obj);
		}

	}

	/**
	 * Add styles for admin.
	 *
	 * @since 	1.0.0
	 * @param   string    $hook_suffix    The current page/screen id.
	 */
	public function bptcfedd_enqueue_styles( $hook_suffix ){

		$post_type = get_post_type();
		wp_register_style('bptcfedd-select-style', BPTCFEDD_LIBS_DIR_URL . 'css/select2.min.css');
		wp_register_style('bptcfedd-admin-style', BPTCFEDD_ADMIN_DIR_URL . 'css/admin.css');

		if( in_array($hook_suffix, $this->allowed_screen_id) || in_array($post_type, $this->allowed_post_types) ){
			wp_enqueue_style('bptcfedd-select-style');
			wp_enqueue_style('bptcfedd-admin-style');
		}

	}

	/**
	 * Add settings page callback.
	 *
	 * @since 	1.0.0
	 */
	public function bptcfedd_add_admin_page_callback(){



	}

	/**
	 * Add meta boxes to bptcfedd_tables post type.
	 *
	 * @since 	1.0.0
	 * @param   string    $post_type    The current post type.
	 */
	public function bptcfedd_add_meta_boxes( $post_type ){

		if ( $post_type == 'bptcfedd_tables' ) {
			add_meta_box(
				'bptcfedd_table_columns',
				__( 'Columns', 'bptcfedd' ),
				array( $this, 'bptcfedd_columns_meta_box_content' ),
				$post_type,
				'advanced',
				'high'
			);
			add_meta_box(
				'bptcfedd_table_conditions',
				__( 'Conditions', 'bptcfedd' ),
				array( $this, 'bptcfedd_conditions_meta_box_content' ),
				$post_type,
				'advanced',
				'high'
			);
		}

	}

	/**
	 * Render columns meta box content.
	 *
	 * @since 	1.0.0
	 * @param   WP_Post    $post    The post object.
	 */
	public function bptcfedd_columns_meta_box_content( $post ){

		bptcfedd_get_template('metaboxes/bptcfedd-metabox-columns.php', BPTCFEDD_ADMIN_TEMPLATE_PATH);

	}

	/**
	 * Render conditions meta box content.
	 *
	 * @since 	1.0.0
	 * @param   WP_Post    $post    The post object.
	 */
	public function bptcfedd_conditions_meta_box_content( $post ){

		bptcfedd_get_template('metaboxes/bptcfedd-metabox-conditions.php', BPTCFEDD_ADMIN_TEMPLATE_PATH);

	}

	/**
	 * Search downloads by keyword.
	 *
	 * @since 	1.0.0
	 */
	public function bptcfedd_search_downloads_callback(){

		$respons = array();
		if ( isset( $_POST['search_text'] ) && !empty( $_POST['search_text'] ) ) {
			
			$search_text = sanitize_text_field($_POST['search_text']);
			$respons['data'] = bptcfedd_search_downloads('title', $search_text);
			
		}

		wp_send_json($respons);
	}

	public function add_hooks(){

		add_action( 'admin_menu', array($this, 'bptcfedd_add_admin_page') );
		add_action( 'admin_enqueue_scripts', array($this, 'bptcfedd_enqueue_scripts') );
		add_action( 'admin_enqueue_scripts', array($this, 'bptcfedd_enqueue_styles') );
		add_action( 'add_meta_boxes', array( $this, 'bptcfedd_add_meta_boxes' ) );
		add_action( 'wp_ajax_bptcfedd_search_downloads', array($this, 'bptcfedd_search_downloads_callback') );

	}

}
