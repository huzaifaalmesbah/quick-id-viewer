<?php
/**
 * Quick ID Viewer - Display Class
 *
 * Handles the display of IDs in the admin lists.
 *
 * @package    QuickIDViewer
 * @subpackage Core
 * @since      1.0.0
 */

namespace QuickIDViewer\Core;

/**
 * Display class.
 *
 * Handles the display of post/page/term IDs in the admin area row actions.
 *
 * @since 1.0.0
 */
class Display {

	/**
	 * Constructor for initializing the necessary filters and actions.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		add_filter( 'post_row_actions', array( $this, 'add_id_to_row_actions' ), 10, 2 );
		add_filter( 'page_row_actions', array( $this, 'add_id_to_row_actions' ), 10, 2 );
		
		// Add support for taxonomy terms
		add_filter( 'tag_row_actions', array( $this, 'add_id_to_taxonomy_row_actions' ), 10, 2 );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_assets' ) );
	}

	/**
	 * Adds the post ID to the row actions for the post and page lists.
	 *
	 * @param array  $actions The list of actions for the post/page.
	 * @param object $post The current post or page object.
	 *
	 * @return array The modified list of actions.
	 * @since 1.0.0
	 */
	public function add_id_to_row_actions( $actions, $post ) {
		$selected_post_types = get_option( 'qidvw_selected_post_types', array() );

		if ( in_array( $post->post_type, $selected_post_types, true ) ) {
			if ( isset( $actions['edit'] ) ) {
				$post_id         = $post->ID;
				$actions['edit'] = sprintf(
					'<span class="qidvw-copy" data-id="%1$s">ID: %1$s</span> | %2$s',
					esc_attr( $post_id ),
					$actions['edit']
				);
			}
		}
		return $actions;
	}

	/**
	 * Adds the term ID to the row actions for taxonomy terms.
	 *
	 * @param array  $actions The list of actions for the term.
	 * @param object $term The current term object.
	 *
	 * @return array The modified list of actions.
	 * @since 1.1.0
	 */
	public function add_id_to_taxonomy_row_actions( $actions, $term ) {
		$selected_taxonomies = get_option( 'qidvw_selected_taxonomies', array( 'category', 'post_tag' ) );

		if ( in_array( $term->taxonomy, $selected_taxonomies, true ) ) {
			if ( isset( $actions['edit'] ) ) {
				$term_id         = $term->term_id;
				$actions['edit'] = sprintf(
					'<span class="qidvw-copy" data-id="%1$s">ID: %1$s</span> | %2$s',
					esc_attr( $term_id ),
					$actions['edit']
				);
			}
		}
		return $actions;
	}

	/**
	 * Enqueues JavaScript and CSS assets for the plugin's admin pages.
	 *
	 * @param string $hook The current admin page hook.
	 *
	 * This function enqueues the admin script on post and page edit screens,
	 * and both the admin script and style on the settings page.
	 * 
	 * @since 1.0.0
	 */
	public function enqueue_assets( $hook ) {
		if ( 'edit.php' === $hook || 'edit-tags.php' === $hook || 'term.php' === $hook ) {
			wp_enqueue_script(
				'qidvw-admin-script',
				QIDVW_PLUGIN_URL . 'assets/js/qidvw-admin.js',
				array( 'jquery' ),
				QIDVW_VERSION,
				true
			);
		}

		if ( 'edit.php' === $hook || 'edit-tags.php' === $hook || 'term.php' === $hook || 'settings_page_qidvw-settings' === $hook ) {
			wp_enqueue_style(
				'qidvw-admin-style',
				QIDVW_PLUGIN_URL . 'assets/css/qidvw-admin.css',
				array(),
				QIDVW_VERSION
			);
		}
	}
} 