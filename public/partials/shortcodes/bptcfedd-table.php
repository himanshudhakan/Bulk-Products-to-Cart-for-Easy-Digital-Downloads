<?php

/**
 * Provide a table view for the plugin
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
$table = new Bptcfedd_Product_Table($table_id);

?>
<div class="bptcfedd-table-wrap" id="bptcfedd_table_wrap_<?php esc_attr_e($table_id); ?>">
	<?php bptcfedd_get_template('shortcodes/all-add-to-cart.php', BPTCFEDD_PUBLIC_TEMPLATE_PATH); ?>
	<table class="bptcfedd-download-table">
		<thead>
			<tr>
				<?php $table->bptcfedd_display_header(); ?>
			</tr>
		</thead>
		<tbody>
			<?php $table->bptcfedd_display_body(); ?>
		</tbody>
	</table>
	<div class="bptcfedd-pagination">
		<?php 
		$table->bptcfedd_display_pagination();
		wp_reset_postdata();
		?>
	</div>
</div>