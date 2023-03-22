<?php
/**
 * Provide a columns metabox area view for the plugin
 *
 * @link       https://profiles.wordpress.org/himanshud
 * @since      1.0.0
 *
 * @package    Bulk_Products_To_Cart_For_Edd
 * @subpackage Bulk_Products_To_Cart_For_Edd/admin/partials
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$download_id = get_the_ID();
$bptcfedd_columns = get_post_meta($download_id, 'bptcfedd_columns', true);

$checkbox = isset( $bptcfedd_columns['checkbox'] ) ? 
	$bptcfedd_columns['checkbox'] : 
	'';
$title = isset( $bptcfedd_columns['title'] ) ? 
	$bptcfedd_columns['title'] : 
	'';
$img = isset( $bptcfedd_columns['img'] ) ? 
	$bptcfedd_columns['img'] : 
	'';
$price = isset( $bptcfedd_columns['price'] ) ? 
	$bptcfedd_columns['price'] : 
	'';
$excerpt = isset( $bptcfedd_columns['excerpt'] ) ? 
	$bptcfedd_columns['excerpt'] : 
	'';
$addtocart = isset( $bptcfedd_columns['addtocart'] ) ? 
	$bptcfedd_columns['addtocart'] : 
	'';
$cats = isset( $bptcfedd_columns['cats'] ) ? 
	$bptcfedd_columns['cats'] : 
	'';
$tags = isset( $bptcfedd_columns['tags'] ) ? 
	$bptcfedd_columns['tags'] : 
	'';
$date = isset( $bptcfedd_columns['date'] ) ? 
	$bptcfedd_columns['date'] : 
	'';

?>
<div class="bptcfedd-metabox-wrap">
	<div class="bptcfedd-field">
		<label for="bptcfedd_checkbox"><input type="checkbox" name="bptcfedd_columns[checkbox]" id="bptcfedd_checkbox" value="1" <?php checked( $checkbox, '1' ); ?> /><?php esc_html_e('Checkbox', 'bptcfedd'); ?></label>
	</div>
	<div class="bptcfedd-field">
		<label for="bptcfedd_title"><input type="checkbox" name="bptcfedd_columns[title]" id="bptcfedd_title" value="1" <?php checked( $title, '1' ); ?> /><?php esc_html_e('Title', 'bptcfedd'); ?></label>
	</div>
	<div class="bptcfedd-field">
		<label for="bptcfedd_img"><input type="checkbox" name="bptcfedd_columns[img]" id="bptcfedd_img" value="1" <?php checked( $img, '1' ); ?> /><?php esc_html_e('Product Image', 'bptcfedd'); ?></label>
	</div>
	<div class="bptcfedd-field">
		<label for="bptcfedd_price"><input type="checkbox" name="bptcfedd_columns[price]" id="bptcfedd_price" value="1" <?php checked( $price, '1' ); ?> /><?php esc_html_e('Price', 'bptcfedd'); ?></label>
	</div>
	<div class="bptcfedd-field">
		<label for="bptcfedd_excerpt"><input type="checkbox" name="bptcfedd_columns[excerpt]" id="bptcfedd_excerpt" value="1" <?php checked( $excerpt, '1' ); ?> /><?php esc_html_e('Excerpt', 'bptcfedd'); ?></label>
	</div>
	<div class="bptcfedd-field">
		<label for="bptcfedd_addtocart"><input type="checkbox" name="bptcfedd_columns[addtocart]" id="bptcfedd_addtocart" value="1" <?php checked( $addtocart, '1' ); ?> /><?php esc_html_e('Add to cart button', 'bptcfedd'); ?></label>
	</div>
	<div class="bptcfedd-field">
		<label for="bptcfedd_cats"><input type="checkbox" name="bptcfedd_columns[cats]" id="bptcfedd_cats" value="1" <?php checked( $cats, '1' ); ?> /><?php esc_html_e('Category', 'bptcfedd'); ?></label>
	</div>
	<div class="bptcfedd-field">
		<label for="bptcfedd_tags"><input type="checkbox" name="bptcfedd_columns[tags]" id="bptcfedd_tags" value="1" <?php checked( $tags, '1' ); ?> /><?php esc_html_e('Tags', 'bptcfedd'); ?></label>
	</div>
	<div class="bptcfedd-field">
		<label for="bptcfedd_date"><input type="checkbox" name="bptcfedd_columns[date]" id="bptcfedd_date" value="1" <?php checked( $date, '1' ); ?> /><?php esc_html_e('Date', 'bptcfedd'); ?></label>
	</div>
</div>