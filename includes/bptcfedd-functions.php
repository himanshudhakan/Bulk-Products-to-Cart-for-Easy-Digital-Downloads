<?php
/**
 * General core functions available on both the front-end and admin.
 *
 * @link       https://github.com/himanshudhakan
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