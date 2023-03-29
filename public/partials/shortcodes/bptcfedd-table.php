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

global $bptcfedd_tatts,$table_id,$bptcfedd_table;

$ap_tab = 'appearence';

?>
<style type="text/css">
th.bptcfedd-head-col {
    background: <?php echo bptcfedd_get_value(array(
		'table_header',
		'background_color'
	), 
	$ap_tab); ?>;
    color: <?php echo bptcfedd_get_value(array(
		'table_header',
		'text_color'
	), 
	$ap_tab); ?>;
    padding: <?php echo bptcfedd_get_value(array(
		'table_header',
		'padding'
	), 
	$ap_tab); ?>;
    border-style: <?php echo bptcfedd_get_value(array(
		'table_header',
		'boder_style'
	), 
	$ap_tab); ?>;
    border-width: <?php echo bptcfedd_get_value(array(
		'table_header',
		'boder_width'
	), 
	$ap_tab); ?>;
    border-color: <?php echo bptcfedd_get_value(array(
		'table_header',
		'border_color'
	), 
	$ap_tab); ?>;
	font-size: <?php echo bptcfedd_get_value(array(
		'table_header',
		'font_size'
	), 
	$ap_tab); ?>;
	text-align: <?php echo bptcfedd_get_value(array(
		'table_header',
		'text_align'
	), 
	$ap_tab); ?>;
}
td.bptcfedd-col-val {
    background: <?php echo bptcfedd_get_value(array(
		'table_body',
		'background_color'
	), 
	$ap_tab); ?>;
    color: <?php echo bptcfedd_get_value(array(
		'table_body',
		'text_color'
	), 
	$ap_tab); ?>;
    padding: <?php echo bptcfedd_get_value(array(
		'table_body',
		'padding'
	), 
	$ap_tab); ?>;
    border-style: <?php echo bptcfedd_get_value(array(
		'table_body',
		'boder_style'
	), 
	$ap_tab); ?>;
    border-width: <?php echo bptcfedd_get_value(array(
		'table_body',
		'boder_width'
	), 
	$ap_tab); ?>;
    border-color: <?php echo bptcfedd_get_value(array(
		'table_body',
		'border_color'
	), 
	$ap_tab); ?>;
	font-size: <?php echo bptcfedd_get_value(array(
		'table_body',
		'font_size'
	), 
	$ap_tab); ?>;
	text-align: <?php echo bptcfedd_get_value(array(
		'table_body',
		'text_align'
	), 
	$ap_tab); ?>;
}
.bptcfedd-table-wrap .page-numbers,
.bptcfedd-table-wrap a.page-numbers{
    background: <?php echo bptcfedd_get_value(array(
		'pagination',
		'background_color'
	), 
	$ap_tab); ?>;
    color: <?php echo bptcfedd_get_value(array(
		'pagination',
		'text_color'
	), 
	$ap_tab); ?>;
    padding: <?php echo bptcfedd_get_value(array(
		'pagination',
		'padding'
	), 
	$ap_tab); ?>;
    border-style: <?php echo bptcfedd_get_value(array(
		'pagination',
		'boder_style'
	), 
	$ap_tab); ?>;
    border-width: <?php echo bptcfedd_get_value(array(
		'pagination',
		'boder_width'
	), 
	$ap_tab); ?>;
    border-color: <?php echo bptcfedd_get_value(array(
		'pagination',
		'border_color'
	), 
	$ap_tab); ?>;
	font-size: <?php echo bptcfedd_get_value(array(
		'pagination',
		'font_size'
	), 
	$ap_tab); ?>;
    text-decoration: none;
}
.bptcfedd-table-wrap .page-numbers.current {
    background: <?php echo bptcfedd_get_value(array(
		'pagination',
		'active_background_color'
	), 
	$ap_tab); ?>;
    color: <?php echo bptcfedd_get_value(array(
		'pagination',
		'active_text_color'
	), 
	$ap_tab); ?>;
}
</style>
<div class="bptcfedd-table-wrap" id="bptcfedd_table_wrap_<?php esc_attr_e($table_id); ?>">
	<?php bptcfedd_get_template('shortcodes/all-add-to-cart.php', BPTCFEDD_PUBLIC_TEMPLATE_PATH); ?>
	<div class="bptcfedd-table-parent">
		<table class="bptcfedd-download-table">
			<thead>
				<tr>
					<?php $bptcfedd_table->bptcfedd_display_header(); ?>
				</tr>
			</thead>
			<tbody>
				<?php $bptcfedd_table->bptcfedd_display_body(); ?>
			</tbody>
		</table>
	</div>
	<div class="bptcfedd-pagination">
		<?php 
		$bptcfedd_table->bptcfedd_display_pagination();
		wp_reset_postdata();
		?>
	</div>
</div>