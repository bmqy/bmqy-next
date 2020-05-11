<?php
/**
 * Custom bmqy next template tags
 *
 * @package WordPress
 * @subpackage bmqy-next
 * @since bmqy next
 */

/**
 * Prevent switching to bmqy-next on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since bmqynext_ajax_search_post
 */
function bmqynext_switch_theme() {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );

	unset( $_GET['activated'] );

	add_action( 'admin_notices', 'bmqynext_upgrade_notice' );
}
add_action( 'after_switch_theme', 'bmqynext_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * bmqy-next on WordPress versions prior to 4.4.
 *
 * @since bmqynext_ajax_search_post
 *
 * @global string $wp_version WordPress version.
 */
function bmqynext_upgrade_notice() {
	$message = sprintf( __( 'bmqy-next requires at least WordPress version 4.4. You are running version %s. Please upgrade and try again.', 'bmqynext' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.4.
 *
 * @since bmqynext_ajax_search_post
 *
 * @global string $wp_version WordPress version.
 */
function bmqynext_customize() {
	wp_die( sprintf( __( 'bmqy-next requires at least WordPress version 4.4. You are running version %s. Please upgrade and try again.', 'bmqynext' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'bmqynext_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.4.
 *
 * @since bmqynext_ajax_search_post
 *
 * @global string $wp_version WordPress version.
 */
function bmqynext_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'bmqy-next requires at least WordPress version 4.4. You are running version %s. Please upgrade and try again.', 'bmqynext' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'bmqynext_preview' );
