<?php
/**
 * Provide a conditions metabox area view for the plugin
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

$downloads_categories = bptcfedd_get_terms('download_category', array(
	'fields' => 'id=>name',
));
$downloads_tags = bptcfedd_get_terms('download_tag', array(
	'fields' => 'id=>name',
));
?>
<div class="bptcfedd-metabox-wrap">
	<div class="bptcfedd-field">
		<label for="bptcfedd_checkbox"><?php esc_html_e('Downloads', 'bptcfedd'); ?></label>
		<select class="bptcfedd-select2" id="bptcfedd_select2_downloads" name="bptcfedd_conditions[downloads]" multiple="multiple">
		</select>
	</div>
	<div class="bptcfedd-field">
		<label for="bptcfedd_checkbox"><?php esc_html_e('Downloads By Categories', 'bptcfedd'); ?></label>
		<select class="bptcfedd-select2" name="bptcfedd_conditions[categories]" multiple="multiple">
			<?php if ( !empty( $downloads_categories ) ) { ?>
				<?php foreach ($downloads_categories as $cat_id => $category) { ?>
					<option value="<?php esc_attr_e($cat_id); ?>"><?php echo $category; ?></option>
				<?php } ?>
			<?php } ?>
		</select>
	</div>
	<div class="bptcfedd-field">
		<label for="bptcfedd_checkbox"><?php esc_html_e('Downloads By Tags', 'bptcfedd'); ?></label>
		<select class="bptcfedd-select2" name="bptcfedd_conditions[tags]" multiple="multiple">
			<?php if ( !empty( $downloads_tags ) ) { ?>
				<?php foreach ($downloads_tags as $tag_id => $tag) { ?>
					<option value="<?php esc_attr_e($tag_id); ?>"><?php echo $tag; ?></option>
				<?php } ?>
			<?php } ?>
		</select>
	</div>
</div>