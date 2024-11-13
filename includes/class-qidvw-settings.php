<?php
/**
 * Class QIDVW_Settings
 *  Handles the plugin's settings page.
 *
 * @since 1.0.0
 * @package QuickIDViewer
 */

/**
 * Class QIDVW_Settings
 *  Handles the plugin's settings page.
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
		register_setting( 'qidvw_settings', 'qidvw_selected_post_types' );
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
