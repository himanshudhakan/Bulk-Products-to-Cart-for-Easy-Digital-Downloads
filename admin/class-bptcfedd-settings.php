<?php

/**
 * The admin settings functionality of the plugin.
 *
 * @link       https://profiles.wordpress.org/himanshud
 * @since      1.0.0
 *
 * @package    Bulk_Products_To_Cart_For_Edd
 * @subpackage Bulk_Products_To_Cart_For_Edd/admin
 */

/**
 * The admin settings functionality of the plugin.
 *
 *
 * @package    Bulk_Products_To_Cart_For_Edd
 * @subpackage Bulk_Products_To_Cart_For_Edd/admin
 * @author     Himanshu Dhakan <himanshudhakan9@gmail.com>
 */
class Bptcfedd_Admin_Settings {


	public function bptcfedd_get_tabs() {
		
		$tabs = array(
			array(
				'id' => 'lables',
				'title' => esc_html__('Lables', 'bptcfedd'),
				'fields' => $this->bptcfedd_get_lables_tab_fields()
			),
			array(
				'id' => 'appearence',
				'title' => esc_html__('Appearence', 'bptcfedd'),
				'fields' => $this->bptcfedd_get_appearence_tab_fields()
			)
		);

		return $tabs;
	}

	public function bptcfedd_get_lables_tab_fields(){

		$tab = 'lables';

		$fields = array(
			array(
				'id' => 'table_headers',
				'type' => 'heading',
				'title' => __( 'Table headers', 'bptcfedd'),
			)
		);

		$columns = bptcfedd_get_def_columns();

		foreach ($columns as $cid => $column) {
			
			$fields[] = array(
				'id' => $cid,
				'type' => 'input',
				'input_type' => 'text',
				'title' => $column,
				'attributes' => array(
					'placeholder="'.$column.'"',
				),
				'value' => $this->bptcfedd_get_value($cid, $tab),
			);

		}

		return $fields;

	}

	public function bptcfedd_get_appearence_tab_fields(){

		$tab = 'appearence';
		
		$fields = array(
		);

		return $fields;

	}

	public function bptcfedd_default_field_args(){

		$default = array(
			'id' => '',
			'type' => '',
			'input_type' => '',
			'description' => '',
			'attributes' => array(),
			'value' => '',
		);

		return $default;
	}

	public function bptcfedd_save_setting() {
		
		if ( ! isset( $_POST['bptcfedd_settings_nonce'] ) || ! wp_verify_nonce( $_POST['bptcfedd_settings_nonce'], 'bptcfedd_settings_non' ) ) {
			return;
		}

		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}
		
		$settings = isset( $_POST['bptcfedd_settings'] ) ? $_POST['bptcfedd_settings'] : array();
		$sani_bptcfedd_settings = bptcfedd_sanitize_text_field($settings);
		update_option('bptcfedd_settings', $sani_bptcfedd_settings);

	}

	public function bptcfedd_get_value( $id, $tab = '' ){

		$settings = get_option('bptcfedd_settings');

		if ( empty( $settings ) ) {
			return '';
		}

		$value = isset( $settings[$tab][$id] ) ? $settings[$tab][$id] : '';

		return $value;
	}

	public function add_hooks(){

		add_action( 'admin_init', array($this, 'bptcfedd_save_setting') );
		
	} 


}
