<?php
/**
 * Settings page template.
 *
 * This template is used to display the plugin's settings page in the WordPress admin area.
 *
 * @package QuickIDViewer
 * @since 1.0.0
 */

// Prevent direct access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="wrap">
	<h1><?php echo esc_html__( 'Quick ID Viewer Settings', 'quick-id-viewer' ); ?></h1>
	<form method="post" action="options.php">
		<?php
		settings_fields( 'qidvw_settings' );
		$available_post_types = get_post_types( array( 'public' => true ), 'objects' );
		$selected_post_types  = get_option( 'qidvw_selected_post_types', array() );
		?>
		<div class="qidvw-grid">
			<?php foreach ( $available_post_types as $current_post_type ) : ?>
				<div class="qidvw-card">
					<div class="qidvw-card-content">
						<div class="qidvw-card-title">
							<label for="qidvw_post_type_<?php echo esc_attr( $current_post_type->name ); ?>">
								<?php echo esc_html( $current_post_type->label ); ?>
							</label>
							<span class="qidvw-card-type"><?php echo esc_html( $current_post_type->name ); ?></span>
						</div>
						<div class="qidvw-card-toggle">
							<label class="qidvw-switch">
								<input type="checkbox"
										name="qidvw_selected_post_types[]"
										value="<?php echo esc_attr( $current_post_type->name ); ?>"
										id="qidvw_post_type_<?php echo esc_attr( $current_post_type->name ); ?>"
										<?php checked( in_array( $current_post_type->name, $selected_post_types, true ) ); ?>>
								<span class="qidvw-slider"></span>
							</label>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	<div class="qidvw-submit-wrapper">
	<button type="submit" class="button button-primary qidvw-submit">
		<?php esc_html_e( 'Save Changes', 'quick-id-viewer' ); ?>
	</button>
	</div>
	</form>
</div>