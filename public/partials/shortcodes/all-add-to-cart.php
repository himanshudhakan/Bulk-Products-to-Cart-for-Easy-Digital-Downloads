<?php

/**
 * Provide a all add to cart button for the plugin
 *
 * @link       https://profiles.wordpress.org/himanshud
 * @since      1.0.0
 *
 * @package    Bulk_Products_To_Cart_For_Edd
 * @subpackage Bulk_Products_To_Cart_For_Edd/public/partials
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $bptcfedd_tatts,$table_id;

$button_lable = bptcfedd_get_value('all_to_cart', 'labels');

?>
<div class="bptcfedd-alladdtocart-wrap">
	<input type="checkbox" name="bptcfedd_alladdtocart" class="bptcfedd-alladdtocart-selectall" />
	<button class="bptcfedd-alladdtocart-btn button blue edd-submit">
		<span class="bptcfedd-alladdtocart"><?php esc_html_e($button_lable); ?></span>
		<span class="edd-loading" aria-label="<?php esc_html_e('Loading', 'bptcfedd'); ?>"></span>
	</button>
</div>