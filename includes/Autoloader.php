<?php
/**
 * Autoloader class for Quick ID Viewer plugin
 *
 * @package QuickIDViewer
 * @since 1.1.0
 */

namespace QuickIDViewer;

/**
 * PSR-4 compliant autoloader
 *
 * @since 1.1.0
 */
class Autoloader {

    /**
     * Registers the autoloader with SPL
     *
     * @return void
     */
    public static function register() {
        spl_autoload_register([self::class, 'autoload']);
    }

    /**
     * Autoload classes based on namespace
     *
     * @param string $class The fully-qualified class name.
     * @return void
     */
    public static function autoload($class) {
        // Project-specific namespace prefix
        $prefix = 'QuickIDViewer\\';

        // Base directory for the namespace prefix
        $base_dir = QIDVW_PLUGIN_DIR . 'includes/';

        // Does the class use the namespace prefix?
        $len = strlen($prefix);
        if (strncmp($prefix, $class, $len) !== 0) {
            // No, move to the next registered autoloader
            return;
        }

        // Get the relative class name
        $relative_class = substr($class, $len);

        // Replace namespace separators with directory separators
        // and append .php
        $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

        // If the file exists, require it
        if (file_exists($file)) {
            require $file;
        }
    }
} 