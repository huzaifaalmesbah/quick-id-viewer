<?php
/**
 * Quick ID Viewer - Settings Class
 *
 * @package    QuickIDViewer
 *
 * This file handles the plugin's settings page and related functionality.
 */

/**
 * Class QIDVW_Settings
 * Handles the plugin's settings page.
 *
 * @since 1.0.0
 * @package QuickIDViewer
 */
class QIDVW_Settings {

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
	}

	/**
	 * Sanitizes the post types array.
	 *
	 * @param mixed $input The value being saved.
	 * @return array Sanitized array of post types.
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
