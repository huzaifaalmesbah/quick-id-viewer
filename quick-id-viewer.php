<?php
/**
 * Plugin Name: Quick ID Viewer
 * Description: Adds an ID display to row actions for selected post types and taxonomies with a settings page to toggle the display.
 * Version: 1.1.0
 * Author: Huzaifa Al Mesbah
 * Author URI: https://linkedin.com/in/huzaifaalmesbah
 * Text Domain: quick-id-viewer
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Requires at least: 5.0
 * Requires PHP: 7.4
 *
 * @package QuickIDViewer
 */

// Prevent direct access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Define plugin constants.
define( 'QIDVW_VERSION', '1.1.0' );
define( 'QIDVW_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'QIDVW_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

// Load autoloader.
require_once QIDVW_PLUGIN_DIR . 'includes/Autoloader.php';
\QuickIDViewer\Autoloader::register();

/**
 * Initializes the Quick ID Viewer plugin.
 *
 * This function sets up the plugin's settings and display components
 * by instantiating the Settings and Display classes.
 *
 * @since 1.0.0
 */
function qidvw_init() {
	// Initialize settings.
	new \QuickIDViewer\Admin\Settings();
	// Initialize display.
	new \QuickIDViewer\Core\Display();
}

add_action( 'plugins_loaded', 'qidvw_init' );

// Register activation hook.
register_activation_hook( __FILE__, array( '\QuickIDViewer\Core\Activation', 'activate' ) );

// Register deactivation hook.
register_deactivation_hook( __FILE__, array( '\QuickIDViewer\Core\Deactivation', 'deactivate' ) );
