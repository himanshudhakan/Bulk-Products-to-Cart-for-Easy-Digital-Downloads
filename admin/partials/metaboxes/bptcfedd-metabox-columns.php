<?php
/**
 * Provide a columns metabox area view for the plugin
 *
 * @link       https://github.com/himanshudhakan
 * @since      1.0.0
 *
 * @package    Bulk_Products_To_Cart_For_Edd
 * @subpackage Bulk_Products_To_Cart_For_Edd/admin/partials
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div class="bptcfedd-metabox-wrap">
	<div class="bptcfedd-field">
		<label for="bptcfedd_checkbox"><input type="checkbox" name="bptcfedd_columns[checkbox]" id="bptcfedd_checkbox" value="1"><?php esc_html_e('Checkbox', 'bptcfedd'); ?></label>
	</div>
	<div class="bptcfedd-field">
		<label for="bptcfedd_title"><input type="checkbox" name="bptcfedd_columns[title]" id="bptcfedd_title" value="1"><?php esc_html_e('Title', 'bptcfedd'); ?></label>
	</div>
	<div class="bptcfedd-field">
		<label for="bptcfedd_img"><input type="checkbox" name="bptcfedd_columns[img]" id="bptcfedd_img" value="1"><?php esc_html_e('Product Image', 'bptcfedd'); ?></label>
	</div>
	<div class="bptcfedd-field">
		<label for="bptcfedd_price"><input type="checkbox" name="bptcfedd_columns[price]" id="bptcfedd_price" value="1"><?php esc_html_e('Price', 'bptcfedd'); ?></label>
	</div>
	<div class="bptcfedd-field">
		<label for="bptcfedd_excerpt"><input type="checkbox" name="bptcfedd_columns[excerpt]" id="bptcfedd_excerpt" value="1"><?php esc_html_e('Excerpt', 'bptcfedd'); ?></label>
	</div>
	<div class="bptcfedd-field">
		<label for="bptcfedd_addtocart"><input type="checkbox" name="bptcfedd_columns[addtocart]" id="bptcfedd_addtocart" value="1"><?php esc_html_e('Add to cart button', 'bptcfedd'); ?></label>
	</div>
	<div class="bptcfedd-field">
		<label for="bptcfedd_cats"><input type="checkbox" name="bptcfedd_columns[cats]" id="bptcfedd_cats" value="1"><?php esc_html_e('Category', 'bptcfedd'); ?></label>
	</div>
	<div class="bptcfedd-field">
		<label for="bptcfedd_tags"><input type="checkbox" name="bptcfedd_columns[tags]" id="bptcfedd_tags" value="1"><?php esc_html_e('Tags', 'bptcfedd'); ?></label>
	</div>
	<div class="bptcfedd-field">
		<label for="bptcfedd_date"><input type="checkbox" name="bptcfedd_columns[date]" id="bptcfedd_date" value="1"><?php esc_html_e('Date', 'bptcfedd'); ?></label>
	</div>
</div>