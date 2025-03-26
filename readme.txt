=== Quick ID Viewer ===
Contributors: huzaifaalmesbah
Tags: post id, page id, show id, admin-tools, utility
Stable tag: 1.1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Quickly view and copy post, page, custom post type, and taxonomy term IDs directly from the WordPress admin list view with a single click.

== Description ==

**Quick ID Viewer** is an essential WordPress utility that adds a convenient way to view and copy post, page, and taxonomy term IDs directly from your WordPress admin panel. Designed specifically for developers, site builders, and content managers who frequently need to reference content IDs for templates, shortcodes, or custom development.

This lightweight plugin displays IDs directly in your admin lists with a one-click copy feature to streamline your workflow. Stop wasting time searching for IDs in the database or opening post edit screens - now you can access any content ID instantly.

= How to Use =

**For Post/Page IDs:**
1. After activation and configuration, navigate to Posts, Pages, or any enabled custom post type in your admin panel
2. You'll see IDs displayed at the beginning of each row in the list view
3. Simply click on any ID to instantly copy it to your clipboard
4. Use the copied ID in your templates, shortcodes, or wherever needed

**For Taxonomy Term IDs:**
1. Navigate to any taxonomy list (like Categories, Tags, or custom taxonomies)
2. Term IDs will be prominently displayed for each term
3. Click on any term ID to copy it with a single click
4. Use the term ID for development or content management tasks

= Key Features =

* **Instant ID Display** - View post, page, and custom post type IDs directly in admin list views
* **Taxonomy Term ID Support** - View category, tag, and custom taxonomy term IDs in taxonomy list views
* **One-Click Copy** - Copy any ID to clipboard with a single click (no selecting or right-clicking)
* **Comprehensive Support** - Works with all post types including custom post types
* **Complete Taxonomy Coverage** - Supports all taxonomies including custom taxonomies
* **Fully Customizable** - Enable/disable for specific post types and taxonomies
* **Modern UI** - Clean, intuitive card-based settings interface
* **Performance Optimized** - Lightweight with minimal impact on admin loading times
* **Developer-Friendly** - Perfect tool for WordPress developers and site builders
* **No Public Impact** - Only affects admin area with no frontend changes
* **Zero Configuration** - Works immediately after activation (with default settings)

= Use Cases =

* **Theme Development** - Quickly reference post and term IDs when building custom templates
* **Plugin Configuration** - Easily find and use IDs when setting up plugins that require specific content IDs
* **Content Management** - Reference IDs when organizing or managing large amounts of content
* **Shortcode Implementation** - Find IDs to use in shortcodes without digging through the database
* **Custom Queries** - Grab specific post or term IDs for WP_Query or get_terms() functions
* **Debugging** - Quickly identify content by ID when troubleshooting
* **Client Instructions** - Easily provide clients with exact content IDs for specific operations
* **API Integration** - Reference correct content IDs when building custom API endpoints

= Pro Tip =

Enable Quick ID Viewer only for the post types and taxonomies you regularly work with to keep your admin interface clean and efficient. The plugin settings page makes it easy to customize exactly where IDs appear.

== Installation ==

= Via WordPress Repository (Recommended): =
1. Log in to your WordPress Dashboard
2. Navigate to Plugins > Add New
3. Search for "Quick ID Viewer"
4. Click "Install Now" and wait for the installation to complete
5. Click "Activate" to enable the plugin
6. Go to Settings > Quick ID Viewer to configure which post types and taxonomies should display IDs

= Manual Installation: =
1. Download the plugin zip file from WordPress.org
2. Log in to your WordPress Dashboard
3. Navigate to Plugins > Add New > Upload Plugin
4. Choose the downloaded zip file and click "Install Now"
5. After installation, click "Activate"
6. Go to Settings > Quick ID Viewer to configure which post types and taxonomies should display IDs


== Check out our other Plugins ==

Enhance your WordPress site with our other powerful plugins:

- **[Smart Password Protect](https://wordpress.org/plugins/smart-password-protect/)** - Secure your WordPress site with password protection and IP whitelisting.
- **[Redirect After Logout](https://wordpress.org/plugins/redirect-after-logout/)** - Redirect users to a custom page after logging out for enhanced user experience.
- **[Access Defender](https://wordpress.org/plugins/access-defender/)** - Advanced security plugin to protect your WordPress site from unauthorized access and malicious attacks.
- **[Contributors Gallery](https://wordpress.org/plugins/contributors-gallery/)** - Showcase your WordPress contributors in a beautiful and customizable gallery layout.
- **[Product Spotlight Badge](https://wordpress.org/plugins/product-spotlight-badge/)** - Highlight your WooCommerce products with eye-catching badges to boost sales.

== Frequently Asked Questions ==

= Where do I see the post and term IDs? =

After activation, post IDs will appear at the beginning of each row in your post list views for enabled post types. Similarly, term IDs will appear at the beginning of each row in your taxonomy term list views for enabled taxonomies.

= Can I enable/disable this for specific post types and taxonomies? =

Yes! Go to Settings > Quick ID Viewer to choose which post types and taxonomies should display IDs. This allows you to customize the plugin to show IDs only where you need them.

= Does this work with custom post types and custom taxonomies? =

Yes, Quick ID Viewer works with all registered public post types and taxonomies in your WordPress installation, including WooCommerce products, custom post types from other plugins, and any custom taxonomies you've created.

= Will this slow down my admin panel? =

No, Quick ID Viewer is extremely lightweight and only loads its resources on the specific admin pages where it's needed. The plugin has been optimized for performance with minimal impact on admin page loading times.

= Can I use this on a multisite installation? =

Yes, Quick ID Viewer is compatible with WordPress multisite installations. You can activate it network-wide or on individual sites as needed.

= Does this modify my database or content in any way? =

No, Quick ID Viewer only displays information that already exists in your database. It doesn't modify any content, create new database tables, or alter your existing data structure.

= Will visitors to my site see the IDs? =

No, Quick ID Viewer only works in the WordPress admin area. It doesn't make any changes to your public-facing website, so visitors will never see the IDs.

= Is this compatible with page builders? =

Yes, Quick ID Viewer is compatible with all major page builders. It only affects the WordPress admin list views and doesn't interfere with page builder functionality.

= Can I copy multiple IDs at once? =

The current version supports copying one ID at a time with a single click. We're considering adding bulk copy functionality in a future update.

= Does this work with Gutenberg? =

Yes, Quick ID Viewer is fully compatible with the WordPress block editor (Gutenberg). It focuses on the admin list views rather than the editor itself.

== Screenshots ==

1. Post list view showing ID display and copy functionality
2. Taxonomy term list view showing ID display and copy functionality
3. Settings page with card-based post type and taxonomy selection
4. One-click copy action demonstration

== Changelog ==

= 1.1.0 =
* Added support for taxonomy terms
* Added settings to control which taxonomies display term IDs
* Updated settings page with taxonomy selection cards
* Improved JavaScript for handling term ID copying
* Enhanced admin styling for taxonomy term list views
* Code architecture improvements with PSR-4 autoloading
* Implemented namespaces for better organization and modern coding standards
* Added autoloader for more efficient class loading
* Added dedicated Activation and Deactivation classes for better lifecycle management
* Improved uninstaller to properly clean up all plugin options
* Improved code maintainability and extensibility

= 1.0.0 =
* Initial release
* Post ID display and copy functionality
* Settings page with post type selection
* Support for all public post types

== Upgrade Notice ==

= 1.1.0 =
This update adds taxonomy term ID support and modernizes the plugin code with namespaces and PSR-4 autoloading for better performance and maintainability.

= 1.0.0 =
Initial release of Quick ID Viewer

== Support ==

For support queries, feature requests, and bug reports, please use the [WordPress.org support forums](https://wordpress.org/support/plugin/quick-id-viewer/).

For priority support and custom development inquiries, please contact us through our website.

== Privacy Policy ==

Quick ID Viewer does not collect, store, or share any personal data. It operates entirely within your WordPress admin panel.