<?php
/**
 * Uninstall script for the Quick ID Viewer plugin.
 *
 * This script is used to remove all plugin options and clear any cached data when the plugin is uninstalled.
 *
 * @since 1.0.0
 * @package QuickIDViewer
 */

// Prevent direct access.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

/**
 * Handles plugin uninstallation cleanup
 * 
 * @since 1.1.0
 */
class QIDVW_Uninstaller {
    
    /**
     * Run the uninstaller
     * 
     * @since 1.1.0
     */
    public static function uninstall() {
        // Remove plugin options
        self::delete_options();
        
        // Clear any cached data
        wp_cache_flush();
    }
    
    /**
     * Delete all plugin options
     * 
     * @since 1.1.0
     */
    private static function delete_options() {
        delete_option( 'qidvw_selected_post_types' );
        delete_option( 'qidvw_selected_taxonomies' );
    }
}

// Run the uninstaller
QIDVW_Uninstaller::uninstall();
