<?php
/**
 * Keep Calm Home Buyers Theme Customizer
 *
 * @package Keep_Calm_Home_Buyers
 * @since  1.0.0 [<init>]
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

	if ( isset( $wp_customize->selective_refresh ) ) :
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'keepcalm_homebuyers_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'keepcalm_homebuyers_customize_partial_blogdescription',
		) );

	endif;

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
	 * For Main Image on home page
	 * @since 1.0.0 [Adding in Main Image]
	 */
	$wp_customize->add_section( 'main_section', array(
		'capability'	=> 'edit_theme_options',
		'theme_support'	=> '',
		'priority'		=> 11,
		'title'			=> __( 'Main Section', 'keepcalm-homebuyers' ),
		'description'	=> __( 'Main Section Options', ' keepcalm-homebuyers' ),
		'panel'			=> 'ft_theme_options' 
		) );

	/**
	 * Headaing image setting
	 * @since 1.0.0 [Main Image setings]
	 */
	$wp_customize->add_setting( 'main_image', array(
		'defualt'	=> '',
		'transport'	=> 'refresh'
		) );

	/**
	 * Control for main iamge
	 * @since 1.0.0 [Control for main image]
	 */
	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize,
		'main_image', 
		array(
			'label' 		=> __( 'Main Image', 'keepcalm-homebuyers' ), 
			'section'		=> 'main_section', 
			'setting'		=> 'main_image', 
			'type'			=> 'image',
			'description'	=> __( 'Chose Main Image', 'keepcalm-homebuyers' )
		)
	) );

		/**
	 * For Testimonial background Image
	 * @since 1.0.0 [Adding in Testimonials Background Image]
	 */
	$wp_customize->add_section( 'testimonials_section', array(
		'capability'	=> 'edit_theme_options',
		'theme_support'	=> '',
		'priority'		=> 12,
		'title'			=> __( 'Testimonial Section', 'keepcalm-homebuyers' ),
		'description'	=> __( 'Testimonial Section Options', ' keepcalm-homebuyers' ),
		'panel'			=> 'ft_theme_options' 
		) );

	/**
	 * Testimonial background image setting
	 * @since 1.0.0 [Testimonial background Image setings]
	 */
	$wp_customize->add_setting( 'testimonial_image', array(
		'defualt'	=> '',
		'transport'	=> 'refresh'
		) );

	/**
	 * Controller for testimonial background image
	 * @since 1.0.0 [Control for testimonial background image]
	 */
	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize,
		'testimonial_image', 
		array(
			'label' 		=> __( 'Testimonial Background Image', 'keepcalm-homebuyers' ), 
			'section'		=> 'testimonials_section', 
			'setting'		=> 'testimonial_image', 
			'type'			=> 'image',
			'description'	=> __( 'Chose Background Image', 'keepcalm-homebuyers' )
		)
	) );

	/**
	 * Grid Section Images
	 * @since 1.0.0
	 */
	$wp_customize->add_section( 'grid_section', array(
		'capability'	=> 'edit_theme_options',
		'theme_support'	=> '',
		'priority'		=> 13,
		'title'			=> __( 'Grid Section', 'keepcalm-homebuyers' ),
		'description'	=> __( 'Grid Section Options', ' keepcalm-homebuyers' ),
		'panel'			=> 'ft_theme_options' 
		) );

	/**
	 * Loop for grid section images
	 * @since 1.0.0 [loop for grid images]
	 */
	for ($i = 1; $i < 7; $i++) :

		 /**
		 * Grid Section Image title settings
		 * @since 1.0.0 
		 */
		$wp_customize->add_setting( 'grid_image_title' . $i, array(
			'default'	=> '',
			'transport'	=> 'refresh'
		) );

		/**
		 * Grid Section Image title Controller
		 * @since 1.0.0
		 */
		$wp_customize->add_control( new WP_Customize_Control(
			$wp_customize,
			'grid_image_title' . $i, 
			array(
				'label' 		=> __( 'Grid Image '. $i, 'keepcalm-homebuyers' ), 
				'section'		=> 'grid_section', 
				'setting'		=> 'grid_image_title' . $i, 
				'type'			=> 'text',
				'description'	=> __( 'Chose Grid Image Title' . $i, 'keepcalm-homebuyers' )
			)
		) );

		 /**
		 * Grid Section Image settings
		 * @since 1.0.0 
		 */
		$wp_customize->add_setting( 'grid_image_' . $i, array(
			'default'	=> '',
			'transport'	=> 'refresh'
		) );

		/**
		 * Grid Section Image Controller
		 * @since 1.0.0
		 */
		$wp_customize->add_control( new WP_Customize_Image_Control(
			$wp_customize,
			'grid_image_' . $i, 
			array(
				'label' 		=> __( 'Grid Image '. $i, 'keepcalm-homebuyers' ), 
				'section'		=> 'grid_section', 
				'setting'		=> 'grid_image_' . $i, 
				'type'			=> 'image',
				'description'	=> __( 'Chose Grid Image ' . $i, 'keepcalm-homebuyers' )
			)
		) );

		 /**
		 * Grid Section Image Description settings
		 * @since 1.0.0 
		 */
		$wp_customize->add_setting( 'grid_image_description' . $i, array(
			'default'	=> '',
			'transport'	=> 'refresh'
		) );

		/**
		 * Grid Section Image Description Controller
		 * @since 1.0.0
		 */
		$wp_customize->add_control( new WP_Customize_Control(
			$wp_customize,
			'grid_image_description' . $i, 
			array(
				'label' 		=> __( 'Grid Image '. $i, 'keepcalm-homebuyers' ), 
				'section'		=> 'grid_section', 
				'setting'		=> 'grid_image_description' . $i, 
				'type'			=> 'textarea',
				'description'	=> __( 'Chose Grid Image Description' . $i, 'keepcalm-homebuyers' )
			)
		) );
	endfor;

	/**
	 * Contact Section
	 * @since 1.0.0 [Contact Section]
	 */
	$wp_customize->add_section( 'contact_section', array(
		'capability'	=> 'edit_theme_options',
		'theme_support'	=> '',
		'priority'		=> 14,
		'title'			=> __( 'Contact Section', 'keepcalm-homebuyers' ),
		'description'	=> __( 'Contact Section Options', ' keepcalm-homebuyers' ),
		'panel'			=> 'ft_theme_options' 
		) );

	/**
	 * Contact section background settings
	 * @since 1.0.0
	 */
	$wp_customize->add_setting( 'contact_bg', array(
		'default'	=> '',
		'transport'	=> 'refresh'
	) );

	/**
	 * Contact background image 
	 * @since 1.0.0 [Contact Form input]
	 */
	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize,
		'contact_bg',
		array(
		    'label' 		=> __( 'Contact Section Background Image', 'keepcalm-homebuyers' ), 
			'section'		=> 'contact_section', 
			'setting'		=> 'contact_bg', 
			'type'			=> 'image',
			'description'	=> __( 'Select Contact Section Background', 'keepcalm-homebuyers' )
		)
	) );

	/**
	 * Contact Form settings
	 * @since 1.0.0
	 */
	$wp_customize->add_setting( 'contact_form', array(
		'default'	=> '',
		'transport'	=> 'refresh'
	) );

	/**
	 * Contact form input 
	 * @since 1.0.0 [Contact input]
	 */
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'contact_form',
		array(
		  'label' 			=> __( 'Contact Form Shortcode', 'keepcalm-homebuyers' ), 
			'section'			=> 'contact_section', 
			'setting'			=> 'contact_form', 
			'type'				=> 'text',
			'description'	=> __( 'Add Contact Form Shortcode', 'keepcalm-homebuyers' )
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
	 * Footer Logo settings
	 * @since 1.0.0
	 */
	$wp_customize->add_setting( 'footer_logo', array(
		'default'	=> '',
		'transport'	=> 'refresh'
	) );

	/**
	 * Footer Logo Controller
	 * @since 1.0.0
	 */
	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize,
		'footer_logo',
		array(
		  'label' 		=> __( 'Footer Logo', 'keepcalm-homebuyers' ), 
			'section'		=> 'footer_section', 
			'setting'		=> 'footer_logo', 
			'image'			=> 'image',
			'description'	=> __( 'Select a Logo recommended size 300px x 150px ', 'keepcalm-homebuyers' )
		)
	) );

	/**
	 * Footer copyright settings
	 * @since 1.0.0
	 */
	$wp_customize->add_setting( 'copyright', array(
		'default'	=> '',
		'transport'	=> 'refresh'
	) );

	/**
	 * Footer copyright Controller
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

	 /**
	 * Footer design credits settings
	 * @since 1.0.0
	 */
	$wp_customize->add_setting( 'design_credits', array(
		'default'	=> '',
		'transport'	=> 'refresh'
	) );

	/**
	 * Footer design credits Controller
	 * @since 1.0.0
	 */
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'design_credits',
		array(
		    'label' 		=> __( 'Design credit', 'keepcalm-homebuyers' ), 
			'section'		=> 'footer_section', 
			'setting'		=> 'design_credits', 
			'type'			=> 'text',
			'description'	=> __( 'Input design credits text', 'keepcalm-homebuyers' )
		)
	) );

	/**
	 * Social Section
	 * @since  1.0.0 [adding social settings]
	 */
	$wp_customize->add_section( 'social_section', array(
		'capability'     => 'edit_theme_options',
		'theme_support'	 => '',
		'priority' 		 => 16,
		'title' 		 => __( 'Social Section', 'keepcalm-homebuyers'),
		'description' 	 => __( 'Input Social Links', 'keepcalm-homebuyers'),
		'panel'			 => 'ft_theme_options'
	) );

	/**
	 * Social Settings
	 * @since 1.0.0 [social settings]
	 */
	$wp_customize->add_setting( 'facebook', array(
		'default'	=> '',
		'refresh'	=> 'refresh'
	) );

	/**
	 * Social Control
	 * @since  1.0.0 [control for social links]
	 */
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'facebook',
		array(
		    'label' 		=> __( 'Facebook', 'keepcalm-homebuyers' ), 
			'section'		=> 'social_section', 
			'setting'		=> 'facebook', 
			'type'			=> 'text',
			'description'	=> __( 'Input Facebook Link', 'keepcalm-homebuyers' )
		)
	) );
	
	$wp_customize->add_setting( 'twitter', array(
		'default'	=> '',
		'refresh'	=> 'refresh'
	) );
	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'twitter',
		array(
		    'label' 		=> __( 'Twitter', 'keepcalm-homebuyers' ), 
			'section'		=> 'social_section', 
			'setting'		=> 'twitter', 
			'type'			=> 'text',
			'description'	=> __( 'Input Twitter Link', 'keepcalm-homebuyers' )
		)
	) );

	$wp_customize->add_setting( 'instagram', array(
		'default'	=> '',
		'refresh'	=> 'refresh'
	) );

	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'instagram',
		array(
		    'label' 		=> __( 'Instagram', 'keepcalm-homebuyers' ), 
			'section'		=> 'social_section', 
			'setting'		=> 'instagraml', 
			'type'			=> 'text',
			'description'	=> __( 'Input instagram Link', 'keepcalm-homebuyers' )
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