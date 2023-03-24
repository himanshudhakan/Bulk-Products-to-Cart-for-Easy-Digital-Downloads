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
//$table_configs = bptcfedd_get_table_configs();

?>
<div class="bptcfedd-table-wrap" id="bptcfedd_table_wrap_<?php esc_attr_e($table_id); ?>">
	<table class="bptcfedd-download-table">
		<thead>
			<tr>
				
			</tr>
		</thead>
		<tbody></tbody>
	</table>
</div>