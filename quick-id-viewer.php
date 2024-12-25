<?php
/**
 * Plugin Name: Quick ID Viewer
 * Description: Adds an ID display to row actions for selected post types with a settings page to toggle the display.
 * Version: 1.0.0
 * Author: Huzaifa Al Mesbah
 * Author URI: https://linkedin.com/in/huzaifaalmesbah
 * Text Domain: quick-id-viewer
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @package QuickIDViewer
 */

// Prevent direct access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Define plugin constants.
define( 'QIDVW_VERSION', '1.0.0' );
define( 'QIDVW_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'QIDVW_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

// Load required files.
require_once QIDVW_PLUGIN_DIR . 'includes/class-qidvw-settings.php';
require_once QIDVW_PLUGIN_DIR . 'includes/class-qidvw-display.php';

/**
 * Initializes the Quick ID Viewer plugin.
 *
 * This function sets up the plugin's settings and display components
 * by instantiating the QIDVW_Settings and QIDVW_Display classes.
 *
 * @since 1.0.0
 */
function qidvw_init() {
	// Initialize settings.
	new QIDVW_Settings();
	// Initialize display.
	new QIDVW_Display();
}

add_action( 'plugins_loaded', 'qidvw_init' );

// Activation hook.
register_activation_hook( __FILE__, 'qidvw_activate' );

/**
 * Activation hook callback for the Quick ID Viewer plugin.
 *
 * Sets default options for selected post types if they don't already exist.
 * This ensures that the plugin has initial settings upon activation.
 *
 * @since 1.0.0
 */
function qidvw_activate() {
	// Set default options if they don't exist.
	if ( ! get_option( 'qidvw_selected_post_types' ) ) {
		update_option( 'qidvw_selected_post_types', array( 'post', 'page' ) );
	}
}
