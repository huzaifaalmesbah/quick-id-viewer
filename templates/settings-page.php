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
		$selected_post_types  = get_option( 'qidvw_selected_post_types', array( 'post', 'page' ) );
		$available_taxonomies = get_taxonomies( array( 'public' => true ), 'objects' );
		$selected_taxonomies  = get_option( 'qidvw_selected_taxonomies', array( 'category', 'post_tag' ) );
		?>
		
		<h2><?php echo esc_html__( 'Post Types', 'quick-id-viewer' ); ?></h2>
		<p><?php echo esc_html__( 'Select post types for which you want to display IDs in the row actions.', 'quick-id-viewer' ); ?></p>
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
		
		<h2><?php echo esc_html__( 'Taxonomies', 'quick-id-viewer' ); ?></h2>
		<p><?php echo esc_html__( 'Select taxonomies for which you want to display term IDs in the row actions.', 'quick-id-viewer' ); ?></p>
		<div class="qidvw-grid">
			<?php foreach ( $available_taxonomies as $current_taxonomy ) : ?>
				<div class="qidvw-card">
					<div class="qidvw-card-content">
						<div class="qidvw-card-title">
							<label for="qidvw_taxonomy_<?php echo esc_attr( $current_taxonomy->name ); ?>">
								<?php echo esc_html( $current_taxonomy->label ); ?>
							</label>
							<span class="qidvw-card-type"><?php echo esc_html( $current_taxonomy->name ); ?></span>
						</div>
						<div class="qidvw-card-toggle">
							<label class="qidvw-switch">
								<input type="checkbox"
										name="qidvw_selected_taxonomies[]"
										value="<?php echo esc_attr( $current_taxonomy->name ); ?>"
										id="qidvw_taxonomy_<?php echo esc_attr( $current_taxonomy->name ); ?>"
										<?php checked( in_array( $current_taxonomy->name, $selected_taxonomies, true ) ); ?>>
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