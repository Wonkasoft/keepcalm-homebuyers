<?php
/**
 * Keep Calm Home Buyers Theme Customizer
 *
 * @package Keep_Calm_Home_Buyers
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function keepcalm_homebuyers_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'keepcalm_homebuyers_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'keepcalm_homebuyers_customize_partial_blogdescription',
		) );
	}
	/**
	 * Theme options 
	 * @since 1.0.0 [Theme options for the homepage]
	 */
	$wp_customize->add_panel( 'ft_theme_options', array(
		'priority'		=> 1,
		'capability' 	=> 'edit_theme_options',
		'theme_support' => '',
		'title' 		=> __( 'Theme Options', 'keepcalm-homebuyers' ),
		'description'	=> __( 'Theme Settings', 'keepcalm-homebuyers' )
		 ) );
	/**
	 * Putting in header image
	 * @since 1.0.0 [Adding in header image]
	 */
	$wp_customize->add_section( 'header_section', array(
		'capability'	=> 'edit_theme_options',
		'theme_support'	=> '',
		'priority'		=> 11,
		'title'			=> __( 'Header Section', 'keepcalm-homebuyers' ),
		'description'	=> __( 'Header Section Options', ' keepcalm-homebuyers' ),
		'panel'			=> 'ft_theme_options' 
		) );
	/**
	 * Headaing image setting
	 * @since 1.0.0 [Header image setings]
	 */
	$wp_customize->add_setting( 'header_image', array(
		'defualt'	=> '',
		'transport'	=> 'refresh'
		) );
	/**
	 * Controller
	 * @since 1.0.0 [add control]
	 */
	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize,
		'header_image', 
		array(
			'label' 		=> __( 'Main Header Image', 'keepcalm-homebuyers' ), 
			'section'		=> 'header_section', 
			'setting'		=> 'header_image', 
			'type'			=> 'image',
			'description'	=> __( 'Chose Header Image', 'keepcalm-homebuyers' )
		)
	) );
	/**
	 * Footer Section
	 * @since 1.0.0 [adding footer section]
	 */
	$wp_customize->add_section( 'footer_section', array(
		'capability' 	=> 'edit_theme_options',
		'theme_support'	=> '',
		'priority'		=> 15,
		'title' 		=> __( 'Footer Section' , 'keepcalm-homebuyers'),
		'description'	=> __( 'Footer Section Options', 'keepcalm-homebuyers' ),
		'panel'			=> 'ft_theme_options'
	) );
	/**
	 * Footer settings
	 * @since 1.0.0
	 */
	$wp_customize->add_setting( 'copyright', array(
		'default'	=> '',
		'transport'	=> 'refresh'
	) );
	/**
	 * Footer Controller
	 * @since 1.0.0
	 */
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'copyright',
		array(
		    'label' 		=> __( 'Copyright Text', 'keepcalm-homebuyers' ), 
			'section'		=> 'footer_section', 
			'setting'		=> 'copyright', 
			'type'			=> 'text',
			'description'	=> __( 'Input Copyright Information', 'keepcalm-homebuyers' )
		)
	) );

}
add_action( 'customize_register', 'keepcalm_homebuyers_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function keepcalm_homebuyers_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function keepcalm_homebuyers_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function keepcalm_homebuyers_customize_preview_js() {
	wp_enqueue_script( 'keepcalm-homebuyers-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'keepcalm_homebuyers_customize_preview_js' );
