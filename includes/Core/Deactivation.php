<?php
/**
 * Quick ID Viewer - Deactivation Class
 *
 * Handles plugin deactivation tasks.
 *
 * @package    QuickIDViewer
 * @subpackage Core
 * @since      1.1.0
 */

namespace QuickIDViewer\Core;

/**
 * Deactivation class.
 *
 * Handles the plugin deactivation processes.
 *
 * @since 1.1.0
 */
class Deactivation {

    /**
     * Run deactivation tasks
     *
     * Handles any clean-up needed when deactivating the plugin.
     * Currently we don't remove settings to preserve user preferences
     * in case they reactivate the plugin later.
     *
     * @return void
     * @since 1.1.0
     */
    public static function deactivate() {
        // Currently we don't remove settings on deactivation
        // This allows users to retain their settings if they reactivate
        // Any future clean-up actions would go here
    }
} 