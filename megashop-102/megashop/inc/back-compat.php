<?php
/**
 * Megashop back compat functionality
 *
 * Prevents Megashop from running on WordPress versions prior to 4.4,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.4.
 *
 * @package WordPress
 * @subpackage megashop
 * @since megashop 1.0.2
 */

/**
 * Prevent switching to Megashop on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since megashop 1.0
 */
function megashop_switch_theme() {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );

	unset( $_GET['activated'] );

	add_action( 'admin_notices', 'megashop_upgrade_notice' );
}
add_action( 'after_switch_theme', 'megashop_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Megashop on WordPress versions prior to 4.4.
 *
 * @since megashop 1.0
 *
 * @global string $wp_version WordPress version.
 */
function megashop_upgrade_notice() {
	$message = sprintf( __( 'Megashop requires at least WordPress version 4.4. You are running version %s. Please upgrade and try again.', 'megashop' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.4.
 *
 * @since megashop 1.0
 *
 * @global string $wp_version WordPress version.
 */
function megashop_customize() {
	wp_die( sprintf( __( 'Megashop requires at least WordPress version 4.4. You are running version %s. Please upgrade and try again.', 'megashop' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'megashop_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.4.
 *
 * @since megashop 1.0
 *
 * @global string $wp_version WordPress version.
 */
function megashop_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'Megashop requires at least WordPress version 4.4. You are running version %s. Please upgrade and try again.', 'megashop' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'megashop_preview' );
