<?php
/**
 * Quick ID Viewer - Settings Class
 *
 * @package    QuickIDViewer
 * @subpackage Admin
 * @since      1.0.0
 */

namespace QuickIDViewer\Admin;

/**
 * Settings class.
 * Handles the plugin's settings page.
 *
 * @since 1.0.0
 */
class Settings {

	/**
	 * Class constructor.
	 *
	 * Adds an action to add a settings page and an action to register the plugin's settings.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'add_settings_page' ) );
		add_action( 'admin_init', array( $this, 'register_settings' ) );
	}

	/**
	 * Adds a settings page to the WordPress admin area.
	 *
	 * @since 1.0.0
	 */
	public function add_settings_page() {
		add_options_page(
			__( 'Quick ID Viewer Settings', 'quick-id-viewer' ),
			__( 'Quick ID Viewer', 'quick-id-viewer' ),
			'manage_options',
			'qidvw-settings',
			array( $this, 'render_settings_page' )
		);
	}

	/**
	 * Registers the plugin's settings with WordPress.
	 *
	 * @since 1.0.0
	 */
	public function register_settings() {
		register_setting(
			'qidvw_settings',
			'qidvw_selected_post_types',
			array(
				'type'              => 'array',
				'description'       => 'Selected post types for Quick ID Viewer.',
				'sanitize_callback' => array( $this, 'sanitize_post_types' ), // Sanitization function.
				'show_in_rest'      => false,
				'default'           => array( 'post', 'page' ),
			)
		);

		// Register taxonomy settings
		register_setting(
			'qidvw_settings',
			'qidvw_selected_taxonomies',
			array(
				'type'              => 'array',
				'description'       => 'Selected taxonomies for Quick ID Viewer.',
				'sanitize_callback' => array( $this, 'sanitize_taxonomies' ), // Sanitization function.
				'show_in_rest'      => false,
				'default'           => array( 'category', 'post_tag' ),
			)
		);
	}

	/**
	 * Sanitizes the post types array.
	 *
	 * @param mixed $input The value being saved.
	 * @return array Sanitized array of post types.
	 * @since 1.0.0
	 */
	public function sanitize_post_types( $input ) {
		// If input is not an array, make it one.
		if ( ! is_array( $input ) ) {
			$input = array();
		}

		$sanitized_input  = array();
		$valid_post_types = get_post_types( array( 'public' => true ), 'names' );

		foreach ( $input as $post_type ) {
			// Sanitize each value and ensure it's a valid post type.
			$post_type = sanitize_key( $post_type );
			if ( in_array( $post_type, $valid_post_types, true ) ) {
				$sanitized_input[] = $post_type;
			}
		}

		// If no valid post types are selected, return default values.
		if ( empty( $sanitized_input ) ) {
			return array( 'post', 'page' );
		}

		return $sanitized_input;
	}

	/**
	 * Sanitizes the taxonomies array.
	 *
	 * @param mixed $input The value being saved.
	 * @return array Sanitized array of taxonomies.
	 * @since 1.1.0
	 */
	public function sanitize_taxonomies( $input ) {
		// If input is not an array, make it one.
		if ( ! is_array( $input ) ) {
			$input = array();
		}

		$sanitized_input  = array();
		$valid_taxonomies = get_taxonomies( array( 'public' => true ), 'names' );

		foreach ( $input as $taxonomy ) {
			// Sanitize each value and ensure it's a valid taxonomy.
			$taxonomy = sanitize_key( $taxonomy );
			if ( in_array( $taxonomy, $valid_taxonomies, true ) ) {
				$sanitized_input[] = $taxonomy;
			}
		}

		// If no valid taxonomies are selected, return default values.
		if ( empty( $sanitized_input ) ) {
			return array( 'category', 'post_tag' );
		}

		return $sanitized_input;
	}

	/**
	 * Renders the plugin's settings page.
	 *
	 * This function is hooked into the admin_menu action and outputs the plugin's settings page.
	 *
	 * @since 1.0.0
	 */
	public function render_settings_page() {
		require_once QIDVW_PLUGIN_DIR . '/templates/settings-page.php';
	}
} 