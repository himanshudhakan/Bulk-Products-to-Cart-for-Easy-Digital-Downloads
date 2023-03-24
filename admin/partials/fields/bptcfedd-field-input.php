<?php
/**
 * Provide a number field view for the plugin
 *
 * @link       https://profiles.wordpress.org/himanshud
 * @since      1.0.0
 *
 * @package    Bulk_Products_To_Cart_For_Edd
 * @subpackage Bulk_Products_To_Cart_For_Edd/admin/partials
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $field;
$description = $field['description'];
$attributes = $field['attributes'];
$option_value = $field['value'];

?>
<tr valign="top">
	<th scope="row" class="bptcfedd-field-heading">
		<label for="<?php esc_attr_e( $field['id'] ); ?>"><?php esc_html_e( $field['title'] ); ?></label>
	</th>
	<td class="bptcfedd-field bptcfedd-field-number">
		<input type="<?php esc_attr_e( $field['input_type'] ); ?>" name="<?php esc_attr_e( $field['name'] ); ?>" id="bptcfedd_<?php esc_attr_e( $field['id'] ); ?>" value="<?php esc_attr_e( $option_value ); ?>"<?php echo implode( ' ', $attributes ); ?> />
		<?php echo $description; ?>
	</td>
</tr>