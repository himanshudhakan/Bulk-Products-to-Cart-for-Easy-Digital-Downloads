<?php
/**
 * General core functions available on both the front-end and admin.
 *
 * @link       https://profiles.wordpress.org/himanshud
 * @since      1.0.0
 *
 * @package    Bulk_Products_To_Cart_For_Edd
 * @subpackage Bulk_Products_To_Cart_For_Edd/includes
 */

/**
 * Include template file.
 *
 * @since 	1.0.0
 * @param   string    $template_name    The name of templage.
 * @param   string    $template_path    The path of templage.
 */
function bptcfedd_get_template( $template_name, $template_path = '' ){

	if ( empty( $template_name ) || empty( $template_path ) ) {
		return;
	}

	$path = $template_path . $template_name;
	if ( file_exists($path) ) {
		include $path;
	}	

}

/**
 * Get the array of terms.
 *
 * @since 	1.0.0
 * @param   string    $taxonomy    The name of taxonomy.
 * @param   array     $args        The args.
 * @return  array     $terms       The array of terms.
 */
function bptcfedd_get_terms( $taxonomy, $args = array()){

	$theArgs = wp_parse_args( $args, array(
	    'taxonomy' => $taxonomy,
	    'hide_empty' => false,
	));
	$terms = get_terms($theArgs);
	return $terms;
}

/**
 * Get the array of terms.
 *
 * @since 	1.0.0
 * @param   string    $taxonomy    The name of taxonomy.
 * @param   array     $args        The args.
 * @return  array     $terms       The array of terms.
 */
function bptcfedd_search_downloads( $by = 'title', $value = '' ){

	$response = array();

	if( $by == 'title' ){

		$args = array(
			'post_type' 		=> 'download',
			's' 				=> $value,
			'fields'			=> 'id=>post_title',
			'posts_per_page'	=> -1,
		);
		$downloads = new WP_Query($args);

		if( !empty( $downloads->posts ) ){
			$response = wp_list_pluck( $downloads->posts, 'post_title', 'ID' );
		}

	}

	return $response;

}

/**
 * Get the array of types of columns.
 *
 * @since 	1.0.0
 * @return  array     $columns    The array of columns.
 */
function bptcfedd_get_def_columns(){

	$columns = array(
		'checkbox' 		=> esc_html__('Checkbox', 'bptcfedd'),
		'id' 		    => esc_html__('ID', 'bptcfedd'),
		'title' 		=> esc_html__('Title', 'bptcfedd'),
		'img' 			=> esc_html__('Product Image', 'bptcfedd'),
		'price' 		=> esc_html__('Price', 'bptcfedd'),
		'excerpt' 		=> esc_html__('Excerpt', 'bptcfedd'),
		'addtocart' 	=> esc_html__('Add to cart', 'bptcfedd'),
		'cats' 			=> esc_html__('Category', 'bptcfedd'),
		'tags' 			=> esc_html__('Tags', 'bptcfedd'),
		'date' 			=> esc_html__('Date', 'bptcfedd'),
		'alltocart'     => esc_html__('All to cart', 'bptcfedd'),
	);

	return $columns;

}

/**
 * Get the array of types of orders.
 *
 * @since 	1.0.0
 * @return  array     $orders    The array of orders.
 */
function bptcfedd_get_def_orders(){

	$orders = array(
		'asc' 	=> esc_html__('Ascending', 'bptcfedd'),
		'desc' 	=> esc_html__('Descending', 'bptcfedd')
	);

	return $orders;

}

/**
 * Get the array of order bys.
 *
 * @since 	1.0.0
 * @return  array     $order_bys    The array of order bys.
 */
function bptcfedd_get_def_order_bys(){

	$order_bys = array(
		'title' 	=> esc_html__('Title', 'bptcfedd'),
		'date' 		=> esc_html__('Date', 'bptcfedd'),
		'id' 		=> esc_html__('ID', 'bptcfedd'),
		'modified' 	=> esc_html__('Modified', 'bptcfedd'),
		'rand' 		=> esc_html__('Random', 'bptcfedd'),
	);

	return $order_bys;

}

/**
 * Get the array of types of borders.
 *
 * @since 	1.0.0
 * @return  array     $borders    The array of borders.
 */
function bptcfedd_get_def_borders(){

	$borders = array(
		'solid' 	=> esc_html__('Solid', 'bptcfedd'),
		'dotted' 	=> esc_html__('Dotted', 'bptcfedd'),
		'dashed' 	=> esc_html__('Dashed', 'bptcfedd'),
		'double' 	=> esc_html__('Double', 'bptcfedd'),
		'ridge' 	=> esc_html__('Ridge', 'bptcfedd'),
		'groove' 	=> esc_html__('Groove', 'bptcfedd')
	);

	return $borders;

}

/**
 * Get the array of types of text_align.
 *
 * @since 	1.0.0
 * @return  array     $text_align    The array of text_align.
 */
function bptcfedd_get_def_text_align(){

	$text_align = array(
		'left' 		=> esc_html__('Left', 'bptcfedd'),
		'right' 	=> esc_html__('Right', 'bptcfedd'),
		'center' 	=> esc_html__('Center', 'bptcfedd'),
		'justify' 	=> esc_html__('Justify', 'bptcfedd'),
	);

	return $text_align;

}

/**
 * Get sanitized value.
 *
 * @since 	1.0.0
 * @param   mixed    $value    The value to sanitize.
 * @return  mixed    $value    The sanitized value.
 */
function bptcfedd_sanitize_text_field($value){

	if ( empty( $value ) ) {
		return false;
	}

	if ( is_array( $value ) ) {

		$sanitize_arr = array();
		foreach ($value as $skey => $svalue) {
			$sanitize_arr[$skey] = bptcfedd_sanitize_text_field( $svalue );
		}
		$value = $sanitize_arr;

	}else{
		$value = sanitize_text_field($value);	
	}

	return $value;
}

/**
 * Get default settings values.
 *
 * @since 	  1.0.0
 * @return    array     $default      The default settings values.
 */
function bptcfedd_get_default_values(){

	$def_column_lables = bptcfedd_get_def_columns();

	$default_values = array(
		'lables' => $def_column_lables,
		'appearence' => array(
			'table_header' => array(
				'background_color' => '#ffffff',
			),
		),
	);

	return $default_values;
}

/**
 * Get setting value.
 *
 * @since 	  1.0.0
 * @param     string     $id         The id of setting.
 * @param     string     $tab        The id of tab.
 * @param     string     $default    The default value.
 * @return    mixed      $value      The setting value.
 */
function bptcfedd_get_value( $id = '', $tab = '', $default = '' ){

	$settings = get_option('bptcfedd_settings');
	$default_values = bptcfedd_get_default_values();

	if ( empty( $id ) && empty( $tab ) && empty( $settings ) ) {
		return $default_values;
	}

	if ( empty( $settings ) ) {
		return $default;
	}

	if ( is_array( $id ) ) {
		$depth = $settings[$tab];
		foreach ($id as $idkey => $index) {
			if ( isset( $depth[$index] ) ) {
				$depth = $depth[$index];
			}else{
				return $default;
			}
		}
		$value = ! empty( $depth ) ? $depth : $default;
	}else if ( ! empty( $id ) ) {
		$value = isset( $settings[$tab][$id] ) ? $settings[$tab][$id] : $default;
	}else if ( ! empty( $tab ) ) {
		$value = isset( $settings[$tab] ) ? $settings[$tab] : $default;
	}else{
		$value = $default;
	}

	return $value;
}

/**
 * Get all configs of table
 * 
 * @since 	  1.0.0
 * @param     int     $table_id    The table id 
 * @return    array   $configs     The array of configs
 */
function bptcfedd_get_table_configs( $table_id ){

	$bptcfedd_columns = get_post_meta($table_id, 'bptcfedd_columns', true);
	$bptcfedd_conditions = get_post_meta($table_id, 'bptcfedd_conditions', true);

	$configs['columns'] = $bptcfedd_columns;
	$configs['conditions'] = $bptcfedd_conditions;

	return $configs;
}

/**
 * Get all columns of table
 * 
 * @since 	  1.0.0
 * @param     int     $table_id    The table id 
 * @return    array   $columns     The array of columns
 */
function bptcfedd_get_table_columns( $table_id, $tb_columns = array() ){

	$columns = array();

	if ( empty( $tb_columns ) ) {
		$tb_columns = get_post_meta($table_id, 'bptcfedd_columns', true);
	}
	
	if ( empty( $tb_columns ) ) {
		return $columns;
	}

	$all_def_columns = bptcfedd_get_def_columns();
	$saved_col = bptcfedd_get_value('', 'labels');

	foreach ($tb_columns as $colkey => $value) {
		$columns[$colkey] = ! empty( $saved_col[$colkey] ) ? 
			$saved_col[$colkey] :
				$all_def_columns[$colkey];
	}

	return $columns;
}