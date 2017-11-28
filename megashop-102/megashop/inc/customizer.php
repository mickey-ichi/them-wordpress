<?php
/**
 * megashop Customizer functionality
 *
 * @package WordPress
 * @subpackage megashop
 * @since megashop 1.0.2
 */


/**
 * Adds postMessage support for site title and description for the Customizer.
 *
 * @since megashop 1.0
 *
 * @param WP_Customize_Manager $wp_customize The Customizer object.
 */
function megashop_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector' => '.site-title a',
			'container_inclusive' => false,
			'render_callback' => 'megashop_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector' => '.site-description',
			'container_inclusive' => false,
			'render_callback' => 'megashop_customize_partial_blogdescription',
		) );
	}
	
}
add_action( 'customize_register', 'megashop_customize_register', 11 );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since megashop 1.0
 * @see megashop_customize_register()
 *
 * @return void
 */
function megashop_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since megashop 1.0
 * @see megashop_customize_register()
 *
 * @return void
 */
function megashop_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 *
 * @since megashop 1.0
 */
function megashop_customize_preview_js() {
	wp_enqueue_script( 'megashop-customize-preview', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20160816', true );
}
add_action( 'customize_preview_init', 'megashop_customize_preview_js' );
