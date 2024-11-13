<?php
/**
 * Uninstall script for the Quick ID Viewer plugin.
 *
 * This script is used to remove all plugin options and clear any cached data when the plugin is uninstalled.
 *
 * @since 1.0.0
 */

// Prevent direct access
if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit;
}

// Remove plugin options
delete_option('qidvw_selected_post_types');

// Clear any cached data
wp_cache_flush();
