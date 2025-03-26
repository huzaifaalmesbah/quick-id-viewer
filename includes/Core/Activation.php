<?php
/**
 * Quick ID Viewer - Activation Class
 *
 * Handles plugin activation tasks.
 *
 * @package    QuickIDViewer
 * @subpackage Core
 * @since      1.1.0
 */

namespace QuickIDViewer\Core;

/**
 * Activation class.
 *
 * Handles the plugin activation processes including setting default options.
 *
 * @since 1.1.0
 */
class Activation {

    /**
     * Run activation tasks
     *
     * Sets default options if they don't already exist.
     *
     * @return void
     * @since 1.1.0
     */
    public static function activate() {
        // Set default post types if they don't exist.
        if ( ! get_option( 'qidvw_selected_post_types' ) ) {
            update_option( 'qidvw_selected_post_types', array( 'post', 'page' ) );
        }
        
        // Set default taxonomies if they don't exist.
        if ( ! get_option( 'qidvw_selected_taxonomies' ) ) {
            update_option( 'qidvw_selected_taxonomies', array( 'category', 'post_tag' ) );
        }
    }
} 