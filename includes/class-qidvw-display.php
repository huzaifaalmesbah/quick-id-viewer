<?php
/**
 * Handles the display of the ID in the post and page row actions.
 *
 * This class adds the ID to the post and page row actions for selected post types.
 *
 * @since 1.0.0
 */
class QIDVW_Display {
    /**
     * Hook into the filters and actions required to add the ID to the post and page row actions.
     *
     * @since 1.0.0
     */
    public function __construct() {
        add_filter('post_row_actions', array($this, 'add_id_to_row_actions'), 10, 2);
        add_filter('page_row_actions', array($this, 'add_id_to_row_actions'), 10, 2);
        add_action('admin_enqueue_scripts', array($this, 'enqueue_assets'));
    }

    public function add_id_to_row_actions($actions, $post) {
        $selected_post_types = get_option('qidvw_selected_post_types', array());

        if (in_array($post->post_type, $selected_post_types)) {
            if (isset($actions['edit'])) {
                $post_id = $post->ID;
                $actions['edit'] = sprintf(
                    '<span class="qidvw-copy" data-id="%1$s">ID: %1$s</span> | %2$s',
                    esc_attr($post_id),
                    $actions['edit']
                );
            }
        }
        return $actions;
    }

    /**
     * Enqueue JavaScript and CSS assets for the plugin's admin pages.
     *
     * @param string $hook The current admin page hook.
     *
     * This function enqueues the admin script on post and page edit screens,
     * and both the admin script and style on the settings page.
     */
    public function enqueue_assets($hook) {
        if ('edit.php' === $hook) {
            wp_enqueue_script(
                'qidvw-admin-script',
                QIDVW_PLUGIN_URL . 'assets/js/qidvw-admin.js',
                array('jquery'),
                QIDVW_VERSION,
                true
            );
        }

        if ('edit.php' === $hook || 'settings_page_qidvw-settings' === $hook) {
            wp_enqueue_style(
            'qidvw-admin-style',
            QIDVW_PLUGIN_URL . 'assets/css/qidvw-admin.css',
            array(),
            QIDVW_VERSION
            );
        }
    }
}
