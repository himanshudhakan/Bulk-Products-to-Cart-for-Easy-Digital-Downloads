<?php

/**
 * The product table functionality of the plugin.
 *
 * @link       https://profiles.wordpress.org/himanshud
 * @since      1.0.0
 *
 * @package    Bulk_Products_To_Cart_For_Edd
 * @subpackage Bulk_Products_To_Cart_For_Edd/public
 */

/**
 * The product table functionality of the plugin.
 *
 *
 * @package    Bulk_Products_To_Cart_For_Edd
 * @subpackage Bulk_Products_To_Cart_For_Edd/public
 * @author     Himanshu Dhakan <himanshudhakan9@gmail.com>
 */
class Bptcfedd_Product_Table {

	/**
	 * The table id.
	 *
	 * @since    1.0.0
	 * @access   public
	 * @var      int    $table_id    The table id.
	 */
	public $table_id;

	/**
	 * The table configs.
	 *
	 * @since    1.0.0
	 * @access   public
	 * @var      array    $configs    The table configs.
	 */
	public $configs;

	/**
	 * The table columns.
	 *
	 * @since    1.0.0
	 * @access   public
	 * @var      array    $columns    The table columns.
	 */
	public $columns;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param    string    $plugin_name       The name of the plugin.
	 * @param    string    $version    The version of this plugin.
	 */
	public function __construct( $table_id ) {

		$this->table_id = $table_id;
		$this->configs = bptcfedd_get_table_configs($table_id);

	}

	/**
	 * Display product table header
	 * 
	 * @since    1.0.0
	 */
	public function bptcfedd_display_header(){

		$tb_columns = $this->configs['columns'];
		$columns = bptcfedd_get_table_columns($this->table_id, $tb_columns);
		$this->columns = $columns;

		?>
		<?php if ( ! empty( $columns ) ) { ?>
			<?php foreach ($columns as $ckey => $column) { ?>
				<th class="bptcfedd-head-col bptcfedd-<?php esc_attr_e($ckey); ?>"><?php echo $column; ?></th>
			<?php } ?>
		<?php }

	}

	/**
	 * Display product table body
	 * 
	 * @since    1.0.0
	 */
	public function bptcfedd_display_body(){

		$query = $this->bptcfedd_run_query();

		?>
		<?php if ( $query->have_posts() ) { ?>
			<?php while ( $query->have_posts() ) { ?>
				<tr>
					<?php $query->the_post(); ?>
					<?php if ( ! empty( $this->columns ) ) { ?>
						<?php foreach ($this->columns as $ckey => $column) { ?>
							<?php $method = sprintf('bptcfedd_display_col_%s', $ckey); ?>
							<td class="bptcfedd-col-val bptcfedd-col-val-<?php esc_attr_e($ckey); ?>"><?php $this->$method(); ?></td>
						<?php } ?>
					<?php } ?>
				</tr>
			<?php } ?>
		<?php }

	}

	public function bptcfedd_display_col_id(){

		echo get_the_title();

	}

	public function bptcfedd_run_query(){

		$conditions = $this->configs['conditions'];
		$tax_args = $this->bptcfedd_prepare_query_tax_args();
		$tax_query = new WP_Query($tax_args);

		$args = $this->bptcfedd_prepare_query_args();
		if ( ! empty( $tax_query->posts ) ) {
			$args['post__in'] = array_merge($args['post__in'], $tax_query->posts);
		}
		$final_query = new WP_Query($args);

		// if ( ! empty( $conditions['exclude_downloads'] ) ) {
		// 	$posts = array();
		// 	foreach ($final_query->posts as $key => $id) {
		// 		if ( ! in_array($id, $conditions['exclude_downloads']) ) {
		// 			$posts[] = $id;
		// 		}
		// 	}
		// 	$final_query->posts = $posts;
		// }

		return $final_query;
	}

	/**
	 * Get query args
	 * 
	 * @since     1.0.0
	 * @return    array   $args     The array of args
	 */
	public function bptcfedd_prepare_query_args(){

		$conditions = $this->configs['conditions'];
		$args = array(
			'post_type' => 'download',
			'fields' => 'ids',
		);		
		$tax_queryies = array();

		$args['posts_per_page'] = intval( $conditions['per_page'] );

		if ( ! empty( $conditions['downloads'] ) ) {
			$args['post__in'] = $conditions['downloads'];
		}

		$args['order'] = $conditions['order'];
		$args['orderby'] = $conditions['orderby'];

		return $args;

	}

	/**
	 * Get tax query args
	 * 
	 * @since     1.0.0
	 * @return    array   $args     The array of args
	 */
	public function bptcfedd_prepare_query_tax_args(){

		$conditions = $this->configs['conditions'];
		$args = array();		
		$tax_queryies = array();

		if ( !empty( $conditions['categories'] ) ) {
			$tax_queryies[] = array(
				'taxonomy' => 'download_category',
				'terms' => $conditions['categories'],
			);
		}

		if ( !empty( $conditions['tags'] ) ) {
			$tax_queryies[] = array(
				'taxonomy' => 'download_tag',
				'terms' => $conditions['tags'],
			);
		}

		if ( !empty( $conditions['exclude_categories'] ) ) {
			$tax_queryies[] = array(
				'taxonomy' => 'download_category',
				'terms' => $conditions['exclude_categories'],
				'operator' => 'NOT IN',
			);
		}

		if ( !empty( $conditions['exclude_tags'] ) ) {
			$tax_queryies[] = array(
				'taxonomy' => 'download_tag',
				'terms' => $conditions['exclude_tags'],
				'operator' => 'NOT IN',
			);
		}

		if ( ! empty( $tax_queryies ) ) {
			$tax_queryies['relation'] = 'AND';
			$args = array(
				'post_type' => 'download',
				'tax_query' => $tax_queryies,
				'posts_per_page' => -1,
			);
		}

		return $args;

	}

}
